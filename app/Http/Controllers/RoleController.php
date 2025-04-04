<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'role-management'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk halaman tersebut']);
        }

        $roles = Role::with('permissions')->whereNot('name', 'super-administrator');

        if ($request->search) {
            $roles = $roles->where('name', 'LIKE', "%$request->search%");
        }

        $roles = $roles->latest()->paginate(5);

        $permissions = Permission::whereNot('name', 'sudo')->get();
        return view('pages.admin.role', compact('roles', 'permissions'));
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
        if (!$this->auth_user->hasAnyPermission(['sudo', 'role.*', 'role.create'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'required',
        ], [
            'name.required' => 'Nama role tidak boleh kosong.',
            'name.string' => 'Nama role harus sebuah string.',
            'name.max' => 'Nama role tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama role sudah digunakan.',

            'permissions.required' => 'Hak akses tidak boleh kosong',
        ]);

        try {
            $role = new Role();

            $role->name = $validated['name'];

            $role->save();

            $role->syncPermissions($validated['permissions']);

            DB::commit();

            $perPage = 5;
            $totalData = Role::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of roles
            return redirect()->route('role.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menambahkan role.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing Role: ' . $th->getMessage());

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
        if (!$this->auth_user->hasAnyPermission(['sudo', 'role.*', 'role.update'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'required',
        ], [
            'name.required' => 'Nama role tidak boleh kosong.',
            'name.string' => 'Nama role harus sebuah string.',
            'name.max' => 'Nama role tidak boleh melebihi 255 karakter.',
            'name.unique' => 'Nama role sudah digunakan.',

            'permissions.required' => 'Hak akses tidak boleh kosong',
        ]);

        try {
            $role = Role::find($id);

            $role->name = $validated['name'];

            $role->save();

            $role->syncPermissions($validated['permissions']);
            DB::commit();

            $perPage = 5;
            $totalData = Role::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of roles
            return redirect()->route('role.index', ['page' => $lastPage])
                ->with('success', 'Berhasil mengubah role.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing Role: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Reject request if user doesnt have any of required permissions
        if (!$this->auth_user->hasAnyPermission(['sudo', 'role.*', 'role.delete'])) {
            return back()->with(['error' => 'Anda tidak memiliki hak akses untuk melakukan aksi tersebut']);
        }

        DB::beginTransaction();
        try {
            Role::find($id)->delete();
            DB::commit();

            $perPage = 5;
            $totalData = Role::count();
            $lastPage = ceil($totalData / $perPage);

            // Redirect to the last page of Roles
            return redirect()->route('role.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menghapus role.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing role: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }
}
