<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\OfficialDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OfficialDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($year)
    {
        $official = Official::with('divisions')->where('start_year', $year)->first();
        $divisions = $official->divisions()->paginate(5);
        return view('admin.pages.official-division', compact('divisions', 'official'));
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
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama Divisi tidak boleh kosong.',
            'name.string' => 'Nama Divisi harus sebuah string.',
        ]);

        try {

            $division = new OfficialDivision();

            $division->official_id = $request->official_id;
            $division->name = $validated['name'];
            $division->save();

            DB::commit();

            // Redirect to the last official of officials
            return back()
                ->with('success', 'Berhasil menambahkan divisi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing official division: ' . $th->getMessage());

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
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama Divisi tidak boleh kosong.',
            'name.string' => 'Nama Divisi harus sebuah string.',
        ]);
        try {

            $division = OfficialDivision::findOrFail($id);

            $division->name = $validated['name'];
            $division->save();

            DB::commit();
            // Redirect to the last official of officials
            return back()
                ->with('success', 'Berhasil mengubah divisi.');
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
            OfficialDivision::findOrFail($id)->delete();
            DB::commit();

            // Redirect to the last official of officials
            return back()
                ->with('success', 'Berhasil menghapus divisi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing official: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
