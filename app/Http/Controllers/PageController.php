<?php

namespace App\Http\Controllers;

use App\Http\Resources\Page\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function api($uri)
    {
        $page = Page::whereUri($uri);
        $data = new PageResource($page);

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(5);
        return view('admin.pages.page', compact('pages'));
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
            'name' => 'required|string|max:255|unique:pages',
        ], [
            'name.required' => 'Nama Halaman tidak boleh kosong.',
            'name.string' => 'Nama Halaman harus sebuah string.',
            'name.max' => 'Nama Halaman tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama Halaman sudah digunakan.',
        ]);

        try {
            DB::commit();

            $page = new Page();
            $page->name = $validated['name'];
            $page->uri = Str::slug($validated['name']);

            $page->save();


            // Redirect to the last page of pages
            return redirect()->route('page.index')
                ->with('success', 'Berhasil menambahkan halaman.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing page: ' . $th->getMessage());

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
            'name' => 'required|string|max:255|unique:pages,name,' . $id,
        ], [
            'name.required' => 'Nama Halaman tidak boleh kosong.',
            'name.string' => 'Nama Halaman harus sebuah string.',
            'name.max' => 'Nama Halaman tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama Halaman sudah digunakan.',
        ]);

        try {
            DB::commit();

            $page = Page::findOrFail($id);
            $page->name = $validated['name'];
            $page->uri = Str::slug($validated['name']);

            $page->save();


            // Redirect to the last page of pages
            return redirect()->route('page.index')
                ->with('success', 'Berhasil mengubah halaman.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing page: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Page::find($id)->delete();
            DB::commit();


            // Redirect to the last page of Pages
            return redirect()->route('page.index')
                ->with('success', 'Berhasil menghapus halaman.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing page: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
