<?php

namespace App\Http\Controllers;

use App\Http\Resources\Training\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class TrainingController extends Controller
{
    public function api()
    {
        $programs = Training::all();

        return response()->json([
            'data' => TrainingResource::collection($programs)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::oldest()->paginate(5);
        return view('pages.admin.training', compact('trainings'));
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
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'training.*', 'training.create'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:trainings',
            'url' => 'required',
            'description' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Nama pelatihan tidak boleh kosong.',
            'name.string' => 'Nama pelatihan harus sebuah string.',
            'name.max' => 'Nama pelatihan tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama pelatihan sudah digunakan.',

            'url.required' => 'Link url tidak boleh kosong',

            'description.required' => 'Deskripsi pelatihan tidak boleh kosong',

            'image.required' => 'Gambar Pelatihan tidak boleh kosong',
        ]);

        try {
            $training = new Training();
            $path_name = "training";
            $image_name = uploadFile($path_name, $request->image);

            $training->name = $request->name;
            $training->url = $request->url;
            $training->description = $request->description;
            $training->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;

            $training->save();

            DB::commit();

            $perPage = 5;
            $totalData = Training::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of trainings
            return redirect()->route('training.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menambahkan pelatihan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing training: ' . $th->getMessage());

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'training.*', 'training.update'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:trainings,name,' . $id,
            'url' => 'required',
            'description' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Nama pelatihan tidak boleh kosong.',
            'name.string' => 'Nama pelatihan harus sebuah string.',
            'name.max' => 'Nama pelatihan tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama pelatihan sudah digunakan.',

            'url.required' => 'Link url tidak boleh kosong',

            'description.required' => 'Deskripsi pelatihan tidak boleh kosong',

            'image.required' => 'Gambar Pelatihan tidak boleh kosong',
        ]);

        try {
            $training = Training::findOrFail($id);

            if ($request->image && str_starts_with($request->image, 'tmp/')) {
                $path_name = "training";
                $image_name = uploadFile($path_name, $request->image);
                $training->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }


            $training->name = $request->name;
            $training->url = $request->url;
            $training->description = $request->description;

            $training->save();

            DB::commit();

            $perPage = 5;
            $totalData = Training::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of trainings
            return redirect()->route('training.index', ['page' => $lastPage])
                ->with('success', 'Berhasil mengubah  pelatihan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing training: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'training.*', 'training.delete'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();
        try {
            Training::find($id)->forceDelete();
            DB::commit();

            $perPage = 5;
            $totalData = Training::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of Trainings
            return redirect()->route('training.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menghapus pelatihan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing training: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }
}
