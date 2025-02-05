<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('roles', fn($q) => $q->whereNot('name',  'super-administrator'))->oldest()->paginate(5);
        $roles = Role::whereNot('name', 'super-administrator')->get();

        return view('pages.admin.user', compact('users', 'roles'));
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
            'username' => 'required|string|max:255|unique:users',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:13',
            'role' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'username.string' => 'Username harus sebuah string.',
            'username.max' => 'Username tidak boleh melebihi 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',

            'full_name.required' => 'Nama lengkap tidak boleh kosong.',
            'full_name.string' => 'Nama lengkap harus sebuah string.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan format email dengan benar',
            'email.unique' => 'Email sudah digunakan',

            'phone.required' => 'Nomor HP tidak boleh kosong',
            'phone.string' => 'Nomor HP harus sebuah string.',
            'phone.max' => 'Nomor HP tidak boleh melebihi 13 karakter.',

            'role.required' => 'Role tidak boleh kosong',
        ]);

        try {
            $user = new User();

            $password = generatePassword();

            $user->username = $validated['username'];
            $user->full_name = $validated['full_name'];
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];
            $user->visible_password = $password;
            $user->password = Hash::make($password);

            $user->save();

            $user->assignRole($validated['role']);

            DB::commit();

            $perPage = 5;
            $totalUsers = User::count();
            $lastPage = ceil($totalUsers / $perPage);

            // Redirect to the last page of users
            return redirect()->route('user.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menambahkan user.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing user: ' . $th->getMessage());

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

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',uuid',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id . ',uuid',
            'phone' => 'required|string|max:13|unique:users,phone,' . $id . ',uuid',
            'role' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'username.string' => 'Username harus sebuah string.',
            'username.max' => 'Username tidak boleh melebihi 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',

            'full_name.required' => 'Nama lengkap tidak boleh kosong.',
            'full_name.string' => 'Nama lengkap harus sebuah string.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan format email dengan benar',
            'email.unique' => 'Email sudah digunakan',

            'phone.required' => 'Nomor HP tidak boleh kosong',
            'phone.string' => 'Nomor HP harus sebuah string.',
            'phone.max' => 'Nomor HP tidak boleh melebihi 13 karakter.',
            'phone.unique' => 'Nomor HP sudah digunakan',

            'role.required' => 'Role tidak boleh kosong',
        ]);

        try {
            $user = User::find($id);

            $user->username = $validated['username'];
            $user->full_name = $validated['full_name'];
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];

            $user->save();

            $user->syncRoles([$validated['role']]);

            DB::commit();

            $perPage = 5;
            $totalUsers = User::count();
            $lastPage = ceil($totalUsers / $perPage);

            // Redirect to the last page of users
            return redirect()->route('user.index', ['page' => $lastPage])
                ->with('success', 'Berhasil mengubah user.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing user: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::find($id)->delete();
            DB::commit();

            $perPage = 5;
            $totalUsers = User::count();
            $lastPage = ceil($totalUsers / $perPage);

            // Redirect to the last page of users
            return redirect()->route('user.index', ['page' => $lastPage])
                ->with('success', 'Berhasil menghapus user.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error storing user: ' . $th->getMessage());

            return back()->withErrors(['error' => 'Server Internal Error.']);
        }
    }
}
