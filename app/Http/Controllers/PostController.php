<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostDetailResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function api(Request $request)
    {

        $pagination_limit = $request->limit ? (int)$request->limit : 3;

        if ($request->category) {
            $posts = Post::with('categories')->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->category);
            })->paginate($pagination_limit);
        } else {
            $posts = Post::paginate($pagination_limit);
        }

        return response()->json([
            "data" => PostResource::collection($posts),
            "pagination" => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'next_page_url' => $posts->nextPageUrl(),
                'prev_page_url' => $posts->previousPageUrl(),
            ]
        ]);
    }

    public function apiDetail($slug)
    {
        $post = Post::with(['author', 'categories'])->where('slug', $slug)->first();

        return response()->json([
            "data" => new PostDetailResource($post)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::with(['author', 'categories'])->latest();

        if ($request->search) {
            $posts = $posts->where('title', 'LIKE', "%$request->search%")
                ->orWhereHas('author', fn($q) => $q->where('full_name', 'LIKE', "%$request->search%"))->orWhereHas('editor', fn($q) => $q->where('full_name', 'LIKE', "%$request->search%"));
        }

        $posts = $posts->paginate(5);

        $categories = Category::all();
        return view('pages.admin.article', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.article-form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'article.*', 'article.create'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlight' => 'required',
            'content' => 'required',
            'cover' => 'required',
            'categories' => 'required',
        ], [
            'title.required' => 'Judul tidak boleh kosong.',
            'title.string' => 'Judul harus sebuah string.',
            'title.max' => 'Judul tidak boleh melebihi 255 karakter.',
            'title.unique' => 'Judul sudah digunakan.',

            'highlight.required' => 'Ringkasan tidak boleh kosong',

            'content.required' => 'Konten tidak boleh kosong',

            'cover.required' => 'Sampul artikel tidak boleh kosong',

            'categories.required' => 'Kategori tidak boleh kosong',
        ]);

        try {
            $article = new Post();
            $categories = Category::whereIn('name', $request->categories)->pluck('id')->toArray(); // Get Category id

            $date = Carbon::now();
            $path_name = "post/{$date->year}";
            $image_name = uploadFile($path_name, $request->cover);
            $user = Auth::user();

            $article->author_id = $user->uuid;
            $article->editor_id = $user->uuid;
            $article->title = $validated['title'];
            $article->slug = Str::slug($validated['title']);
            $article->highlight = $validated['highlight'];
            $article->content = $validated['content'];
            $article->cover = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;

            $article->save();

            $article->categories()->sync($categories);

            DB::commit();

            // Redirect to the last page of articles
            return redirect()->route('article.index')
                ->with('success', 'Berhasil menambahkan artikel.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing article: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('categories')->where('slug', $id)->first();
        $categories = Category::all();
        return view('pages.admin.article-form', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'article.*', 'article.update'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlight' => 'required',
            'content' => 'required',
            'cover' => 'required',
            'categories' => 'required',
        ], [
            'title.required' => 'Judul tidak boleh kosong.',
            'title.string' => 'Judul harus sebuah string.',
            'title.max' => 'Judul tidak boleh melebihi 255 karakter.',
            'title.unique' => 'Judul sudah digunakan.',

            'highlight.required' => 'Ringkasan tidak boleh kosong',

            'content.required' => 'Konten tidak boleh kosong',

            'cover.required' => 'Sampul artikel tidak boleh kosong',

            'categories.required' => 'Kategori tidak boleh kosong',
        ]);

        try {
            $article = Post::find($id);
            $categories = Category::whereIn('name', $request->categories)->pluck('id')->toArray(); // Get Category id

            if ($request->cover && str_starts_with($request->cover, 'tmp/')) {
                $date = Carbon::now();
                $path_name = "post/{$date->year}";
                $image_name = uploadFile($path_name, $request->cover);

                $article->cover = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            $article->editor_id = Auth::user()->uuid;
            $article->title = $validated['title'];
            $article->slug = Str::slug($validated['title']);
            $article->highlight = $validated['highlight'];
            $article->content = $validated['content'];

            $article->save();

            $article->categories()->sync($categories);

            DB::commit();

            // Redirect to the last page of articles
            return redirect()->route('article.index')
                ->with('success', 'Berhasil mengubah artikel.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing article: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'article.*', 'article.delete'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        try {
            Post::find($id)->forceforceDelete();
            DB::commit();


            // Redirect to the last page of Posts
            return redirect()->route('article.index')
                ->with('success', 'Berhasil menghapus artikel.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing article: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }
}
