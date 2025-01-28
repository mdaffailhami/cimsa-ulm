<?php

namespace App\Http\Controllers;

use App\Http\Resources\Committe\CommitteDetailResource;
use App\Http\Resources\Committe\CommitteResource;
use App\Models\Committe;
use App\Models\PageContact;
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
        $committe = Committe::with('contact')->where('name', $name)->first();

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
        $committe = Committe::with(['activities', 'focuses', 'testimonies', 'contact', 'galleries'])->where('name', $id)->first();

        return view('admin.pages.committe-detail', compact('committe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { // Determine which method to call based on the form_category
        switch ($request->form_category) {
            case 'profile':
                return $this->updateProfile($request, $id);

            case 'testimonies':
                return $this->updateTestimonies($request, $id);

            case 'contact':
                return $this->updateContact($request, $id);

            default:
                // Handle unexpected form_category
                return back()->withErrors(['error' => 'Invalid form category.']);
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

    // Private Method
    private function updateProfile($request, $id)
    {
        if ($request->form_category !== 'profile') {
            return;
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'required|string',
            'mission' => 'required|string',
            'focuses' => 'required',
            'activities' => 'required',
            'galleries' => 'required'
        ], [
            'name.required' => 'Nama Halaman tidak boleh kosong.',
            'name.string' => 'Nama Halaman harus sebuah string.',
            'name.max' => 'Nama Halaman tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama Halaman sudah digunakan.',

            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.string' => 'Deskripsi harus berupa teks.',

            'long_description.required' => 'Deskripsi panjang tidak boleh kosong.',
            'long_description.string' => 'Deskripsi panjang harus berupa teks.',

            'mission.required' => 'Misi tidak boleh kosong.',
            'mission.string' => 'Misi harus berupa teks.',

            'focuses.required' => 'Fokus area tidak boleh kosong.',

            'activities.required' => 'Aktivitas tidak boleh kosong.',

            'galleries.required' => 'Galeri tidak boleh kosong.',
        ]);

        try {
            $committe = Committe::findOrFail($id);

            $committe->name = $validated['name'];
            $committe->description = $validated['description'];
            $committe->long_description = $validated['long_description'];
            $committe->mission_statement = $validated['mission'];

            $committe->save();

            if ($request->focuses) {
                $committe->syncFocuses($request->focuses);
            }

            if ($request->activities) {
                $committe->syncActivities($request->activities);
            }

            if ($request->galleries) {
                $committe->syncGalleries($request->galleries);
            }

            DB::commit();


            // Redirect to the last committe of committees
            return back()
                ->with('success', 'Berhasil mengubah komite.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing committe: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    private function updateTestimonies($request, $id)
    {
        if ($request->form_category !== 'testimony') {
            return;
        }
    }

    private function updateContact($request, $id)
    {
        if ($request->form_category !== 'contact') {
            return;
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:13',
            'contact_ocupation' => 'required|string|max:255',
            'contact_year' => 'required|string|max:4'
        ], [
            'name.required' => 'Nama narahubung tidak boleh kosong.',
            'name.string' => 'Nama narahubung harus sebuah string.',
            'name.max' => 'Nama narahubung tidak boleh melebihi 255 karakter.',

            'email.required' => 'Email narahubung tidak boleh kosong.',
            'email.email' => 'Masukkan format email dengan benar',

            'phone.required' => 'Nomor HP tidak boleh kosong',
            'phone.string' => 'Nomor HP harus sebuah string.',
            'phone.max' => 'Nomor HP tidak boleh melebihi 13 karakter.',

            'ocupation.required' => 'Jabatan tidak boleh kosong.',
            'ocupation.string' => 'Jabatan harus sebuah string.',
            'ocupation.max' => 'Jabatan tidak boleh melebihi 255 karakter.',

            'year.required' => 'Tahun angkatan tidak boleh kosong.',
            'year.string' => 'Tahun angkatan harus sebuah string.',
            'year.max' => 'Tahun angkatan tidak boleh melebihi 4 karakter.',
        ]);

        try {
            // Check if there is contact id
            if ($request->page_contact_id) {
                $contact = PageContact::findOrFail($request->page_contact_id);
            } else {
                $contact = new PageContact();
            }

            $contact->page_id = $id;
            $contact->type = 'committe';

            $contact->name = $request->contact_name;
            $contact->email = $request->contact_email;
            $contact->phone = $request->contact_phone;
            $contact->ocupation = $request->contact_ocupation;
            $contact->year = $request->contact_year;

            if ($request->avatar && str_starts_with($request->avatar, 'tmp/')) {
                $path_name = "avatar/page-contact";
                $image_name = uploadFile($path_name, $request->avatar);

                $contact->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            $contact->save();
            DB::commit();

            // Redirect to the last committe of committees
            return back()
                ->with('success', 'Berhasil menyimpan profil kontak komite.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing committe: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']) & exit();
        }
    }
}
