<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\OfficialDivisionMember;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DivisionMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($year, $id)
    {
        $official = Official::where('year', $year)->first();
        $division = $official->divisions()->findOrFail($id);
        $members = $division->members()->latest()->paginate(5);

        return view('admin.pages.official-division-member', compact('official', 'division', 'members'));
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
            'image' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'position' => 'required|string',
        ], [
            'image.required' => 'Gambar tidak boleh kosong.',

            'name.required' => 'Nama anggota tidak boleh kosong.',
            'name.string' => 'Nama anggota harus sebuah string.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan format email dengan benar',

            'position.required' => 'Posisi tidak boleh kosong',
            'position.string' => 'Posisi harus sebuah string.',
        ]);

        try {
            $member = new OfficialDivisionMember();

            $member->official_division_id = $request->division_id;

            $path_name = "avatar/official-member";
            $image_name = uploadFile($path_name, $request->image);

            $member->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            $member->name = $validated['name'];
            $member->email = $validated['email'];
            $member->position = $validated['position'];
            $member->save();

            DB::commit();
            return back()
                ->with('success', 'Berhasil menambahkan anggota divisi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing member: ' . $th->getMessage());

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
            'image' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'position' => 'required|string',
        ], [
            'image.required' => 'Gambar tidak boleh kosong.',

            'name.required' => 'Nama anggota tidak boleh kosong.',
            'name.string' => 'Nama anggota harus sebuah string.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan format email dengan benar',

            'position.required' => 'Posisi tidak boleh kosong',
            'position.string' => 'Posisi harus sebuah string.',
        ]);

        try {

            $member = OfficialDivisionMember::findOrFail($id);
            if ($request->image && str_starts_with($request->image, 'tmp/')) {
                $path_name = "avatar/official-member";
                $image_name = uploadFile($path_name, $request->image);

                $member->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            $member->name = $validated['name'];
            $member->email = $validated['email'];
            $member->position = $validated['position'];

            $member->save();

            DB::commit();

            return back()
                ->with('success', 'Berhasil mengubah anggota divisi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing member: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            OfficialDivisionMember::findOrFail($id)->delete();
            DB::commit();

            // Redirect to the last official of officials
            return back()
                ->with('success', 'Berhasil menghapus anggota divisi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error destroying division member: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
