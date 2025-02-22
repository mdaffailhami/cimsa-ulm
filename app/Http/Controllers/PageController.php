<?php

namespace App\Http\Controllers;

use App\Http\Resources\Page\PageResource;
use App\Models\Page;
use App\Models\PageContact;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function api($uri)
    {
        $page = Page::whereUri($uri)->first();
        $data = new PageResource($page);

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page-management'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk halaman tersebut']);
        }

        $pages = Page::latest();

        if ($request->search) {
            $pages = $pages->where('name', 'LIKE', "%$request->search%");
        }

        $pages = $pages->paginate(5);

        return view('pages.admin.page', compact('pages'));
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
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page.*', 'page.create'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

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
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page-content-management'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk halaman tersebut']);
        }

        $page = Page::with('contents.galleries', 'contact')->whereUri($id)->first();
        return view('pages.admin.page-content', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        switch ($request->form_category) {
            case 'profile':
                return $this->updateProfile($request, $id);

            case 'content':
                return $this->updateContents($request, $id);

            case 'contact':
                return $this->updateContact($request, $id);

            default:
                // Handle unexpected form_category
                return back()->with(['error' => 'Invalid form category.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page.*', 'page.delete'])) {
            return back()->with(['error' => 'Akses ditolak']);
        }

        try {
            Page::find($id)->forceDelete();
            DB::commit();

            // Redirect to the last page of Pages
            return redirect()->route('page.index')
                ->with('success', 'Berhasil menghapus halaman.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing page: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    private function updateProfile($request, $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page.*', 'page.update'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:pages,name,' . $id . ',uuid',
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

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    private function updateContents($request, $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page-content.*', 'page-content.update'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        try {
            if ($request->data) {
                foreach ($request->data as $content) {
                    $content_model = PageContent::findOrFail($content['id']);

                    if ($content_model->type === 'text') {
                        $content_model->text_content = $content['value'];
                    } else if ($content_model->type === 'long-text') {
                        $content_model->long_text_content = $content['value'];
                    } else if ($content_model->type === 'multiple-value') {
                        $content_model->multiple_value_content = json_encode($content['values']);
                    } else if ($content_model->type === 'image') {
                        $galleries = [$content['value']]; // turn value into array so it can be processed with syncGalleries method
                        $content_model->syncGalleries($galleries);
                    } else {
                        $content_model->syncGalleries($content['values']);
                    }

                    $content_model->save();
                }
            }
            DB::commit();
            // Redirect to the last page of pages
            return back()->with('success', 'Berhasil memperbarui konten.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing page: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    private function updateContact($request, $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'page-content.*', 'page-content.update'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:13',
            'contact_occupation' => 'required|string|max:255',
            'contact_year' => 'required|string|max:4',
            'avatar' => 'required',
        ], [
            'contact_name.required' => 'Nama narahubung tidak boleh kosong.',
            'contact_name.string' => 'Nama narahubung harus sebuah string.',
            'contact_name.max' => 'Nama narahubung tidak boleh melebihi 255 karakter.',

            'contact_email.required' => 'Email narahubung tidak boleh kosong.',
            'contact_email.email' => 'Masukkan format email dengan benar',

            'contact_phone.required' => 'Nomor HP tidak boleh kosong',
            'contact_phone.string' => 'Nomor HP harus sebuah string.',
            'contact_phone.max' => 'Nomor HP tidak boleh melebihi 13 karakter.',

            'contact_occupation.required' => 'Jabatan tidak boleh kosong.',
            'contact_occupation.string' => 'Jabatan harus sebuah string.',
            'contact_occupation.max' => 'Jabatan tidak boleh melebihi 255 karakter.',

            'contact_year.required' => 'Tahun angkatan tidak boleh kosong.',
            'contact_year.string' => 'Tahun angkatan harus sebuah string.',
            'contact_year.max' => 'Tahun angkatan tidak boleh melebihi 4 karakter.',

            'avatar.required' => 'Foto narahubung tidak boleh kosong.',
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
            $contact->occupation = $request->contact_occupation;
            $contact->year = $request->contact_year;

            if ($request->avatar && str_starts_with($request->avatar, 'tmp/')) {
                $path_name = "avatar/page-contact";
                $image_name = uploadFile($path_name, $request->avatar);

                $contact->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            $contact->save();
            DB::commit();

            return back()
                ->with('success', 'Berhasil menyimpan kontak.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing contact: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']) & exit();
        }
    }
}
