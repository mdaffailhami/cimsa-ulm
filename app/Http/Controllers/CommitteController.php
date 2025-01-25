<?php

namespace App\Http\Controllers;

use App\Http\Resources\Committe\CommitteDetailResource;
use App\Http\Resources\Committe\CommitteResource;
use App\Models\Committe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommitteController extends Controller
{
    public function api()
    {
        $committes = Committe::all();

        return response()->json([
            "data" => CommitteResource::collection($committes)
        ]);
    }

    public function apiDetail($name)
    {
        $committe = Committe::where('name', $name)->first();

        return response()->json([
            "data" => new CommitteDetailResource($committe)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $committees = Committe::latest()->paginate(5);
        return view('admin.pages.committe', compact('committees'));
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
            'logo' => 'required',
            'name' => 'required|string|max:255|unique:committes',
            'description' => 'required',
        ], [
            'logo.required' => 'Logo tidak boleh kosong.',

            'name.required' => 'Nama Komite tidak boleh kosong.',
            'name.string' => 'Nama Komite harus sebuah string.',
            'name.max' => 'Nama Komite tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama Komite sudah digunakan.',

            'description.required' => 'Deskripsi singkat tidak boleh kosong.',
        ]);

        try {
            DB::commit();

            $committe = new Committe();

            $path_name = "committe";
            $image_name = uploadFile($path_name, $request->logo);

            $committe->logo = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            $committe->name = $validated['name'];
            $committe->description = $validated['description'];

            $committe->save();

            // Redirect to the last committe of committees
            return redirect()->route('committe.index')
                ->with('success', 'Berhasil menambahkan komite.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing committe: ' . $th->getMessage());

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
            'name' => 'required|string|max:255|unique:committees,name,' . $id,
        ], [
            'name.required' => 'Nama Halaman tidak boleh kosong.',
            'name.string' => 'Nama Halaman harus sebuah string.',
            'name.max' => 'Nama Halaman tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama Halaman sudah digunakan.',
        ]);

        try {
            DB::commit();

            $committe = Committe::findOrFail($id);
            $committe->name = $validated['name'];

            $committe->save();


            // Redirect to the last committe of committees
            return redirect()->route('committe.index')
                ->with('success', 'Berhasil mengubah komite.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing committe: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Committe::find($id)->delete();
            DB::commit();


            // Redirect to the last committe of committees
            return redirect()->route('committe.index')
                ->with('success', 'Berhasil menghapus halaman.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing committe: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
