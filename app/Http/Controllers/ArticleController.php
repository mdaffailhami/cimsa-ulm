<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['author', 'categories'])->latest()->paginate(5);
        $categories = Category::all();
        return view('admin.pages.article', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlight' => 'required',
            'content' => 'required',
            'image' => 'required',
            'categories' => 'required',
        ], [
            'title.required' => 'Judul tidak boleh kosong.',
            'title.string' => 'Judul harus sebuah string.',
            'title.max' => 'Judul tidak boleh melebihi 255 karakter.',
            'title.unique' => 'Judul sudah digunakan.',

            'highlight.required' => 'Ringkasan tidak boleh kosong',

            'content.required' => 'Konten tidak boleh kosong',

            'image.required' => 'Sampul artikel tidak boleh kosong',

            'categories.required' => 'Kategori tidak boleh kosong',
        ]);

        try {
            DB::commit();

            $article = new Post();

            $date = Carbon::now();
            $path_name = "post/{$date->year}";
            $image_name = uploadFile($path_name, $request->image);

            $article->author_id = Auth::user()->uuid;
            $article->title = $validated['title'];
            $article->slug = Str::slug($validated['title']);
            $article->highlight = $validated['highlight'];
            $article->content = $validated['content'];
            $article->cover = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;

            $article->save();

            $article->categories()->sync($validated['categories']);



            // Redirect to the last page of articles
            return redirect()->route('article.index')
                ->with('success', 'Berhasil menambahkan artikel.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing article: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlight' => 'required',
            'content' => 'required',
            'image' => 'required',
            'categories' => 'required',
        ], [
            'title.required' => 'Judul tidak boleh kosong.',
            'title.string' => 'Judul harus sebuah string.',
            'title.max' => 'Judul tidak boleh melebihi 255 karakter.',
            'title.unique' => 'Judul sudah digunakan.',

            'highlight.required' => 'Ringkasan tidak boleh kosong',

            'content.required' => 'Konten tidak boleh kosong',

            'image.required' => 'Sampul artikel tidak boleh kosong',

            'categories.required' => 'Kategori tidak boleh kosong',
        ]);

        try {
            DB::commit();

            $article = Post::find($id);

            if ($request->image && str_starts_with($request->image, 'tmp/')) {
                $date = Carbon::now();
                $path_name = "post/{$date->year}";
                $image_name = uploadFile($path_name, $request->image);

                $article->cover = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            $article->author_id = Auth::user()->uuid;
            $article->title = $validated['title'];
            $article->slug = Str::slug($validated['title']);
            $article->highlight = $validated['highlight'];
            $article->content = $validated['content'];

            $article->save();

            $article->categories()->sync($validated['categories']);

            // Redirect to the last page of articles
            return redirect()->route('article.index')
                ->with('success', 'Berhasil mengubah artikel.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing article: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Post::find($id)->delete();
            DB::commit();


            // Redirect to the last page of Posts
            return redirect()->route('article.index')
                ->with('success', 'Berhasil menghapus artikel.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing article: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
