<?php

namespace App\Http\Controllers;

use App\Http\Resources\Official\OfficialResource;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OfficialController extends Controller
{
    public function api()
    {
        $officials = Official::with('divisions')->orderBy('year', 'desc')->get();

        return response()->json([
            'data' => OfficialResource::collection($officials)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officials = Official::orderBy('year', 'desc')->paginate(5);
        return view('admin.pages.official', compact('officials'));
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
            'poster' => 'required',
            'year' => 'required|unique:officials,year',
        ], [
            'poster.required' => 'Poster tidak boleh kosong.',

            'year.required' => 'Tahun tidak boleh kosong.',
            'year.unique' => 'Tahun sudah digunakan.',
        ]);

        try {
            $official = new Official();

            $path_name = "official";
            $image_name = uploadFile($path_name, $request->poster);

            $official->poster = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            $official->year = $validated['year'];

            DB::commit();
            $official->save();

            // Redirect to the last official of officials
            return redirect()->route('official.index')
                ->with('success', 'Berhasil menambahkan struktur organisasi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing official: ' . $th->getMessage());

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
            'poster' => 'required',
            'year' => 'required|unique:officials,year',
        ], [
            'poster.required' => 'Poster tidak boleh kosong.',

            'year.required' => 'Tahun tidak boleh kosong.',
            'year.unique' => 'Tahun sudah digunakan.',
        ]);

        try {
            $official = Official::findOrFail($id);

            if ($request->poster && str_starts_with($request->poster, 'tmp/')) {
                $date = Carbon::now();
                $path_name = "post/{$date->year}";
                $image_name = uploadFile($path_name, $request->cover);

                $official->poster = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            $official->year = $validated['year'];

            DB::commit();
            $official->save();

            // Redirect to the last official of officials
            return redirect()->route('official.index')
                ->with('success', 'Berhasil mengubah struktur organisasi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing official: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Official::findOrFail($id)->delete();
            DB::commit();

            // Redirect to the last official of officials
            return redirect()->route('official.index')
                ->with('success', 'Berhasil menghapus struktur organisasi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing official: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
