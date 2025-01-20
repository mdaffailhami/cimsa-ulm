<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::oldest()->paginate(5);

        return view('admin.pages.category', compact('categories'));
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
            'name' => 'required|string|max:255|unique:categories',
        ], [
            'name.required' => 'Nama kategori tidak boleh kosong.',
            'name.string' => 'Nama kategori harus sebuah string.',
            'name.max' => 'Nama kategori tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama kategori sudah digunakan.',
        ]);

        try {
            $category = new Category();

            $category->name = $validated['name'];

            $category->save();

            DB::commit();

            $perPage = 5;
            $totalData = Category::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of categories
            return redirect()->route('category.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menambahkan kategori.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing category: ' . $th->getMessage());

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
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ], [
            'name.required' => 'Nama kategori tidak boleh kosong.',
            'name.string' => 'Nama kategori harus sebuah string.',
            'name.max' => 'Nama kategori tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama kategori sudah digunakan.',
        ]);

        try {
            $category = Category::find($id);

            $category->name = $validated['name'];

            $category->save();

            DB::commit();

            $perPage = 5;
            $totalData = Category::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of categories
            return redirect()->route('category.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menambahkan kategori.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing category: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            Category::find($id)->delete();
            DB::commit();

            $perPage = 5;
            $totalData = Category::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of categories
            return redirect()->route('category.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menghapus kategori.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing category: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
