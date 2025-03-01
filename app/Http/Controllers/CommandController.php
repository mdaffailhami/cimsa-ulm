<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function index($type)
    {
        return view('pages.command', compact('type'));
    }

    public function action(Request $request, $type)
    {

        if ($request->password !== 'superCommand010325')
            return back()->with('error', 'Autentikasi gagal');

        switch ($type) {
            case 'migrate':
                Artisan::call('migrate');
                $message = 'Berhasil melakukan migrasi.';
                break;

            case 'migrate-fresh':
                Artisan::call('migrate:fresh');
                $message = 'Berhasil menyegarkan migrasi.';
                break;

            case 'reset':
                Artisan::call('app:reset-data');
                $message = 'Berhasil mereset data sistem';
                break;

            case 'seed':
                Artisan::call('db:seed');
                $message = 'Berhasil melakukan seed database.';
                break;

            case 'generate-dummy':
                Artisan::call('app:generate-dummy');
                $message = 'Berhasil menambahkan data dummy.';
                break;
        }

        return redirect()->route('admin.login')->with('success', $message);
    }
}
