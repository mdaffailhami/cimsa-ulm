<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function show($path)
    {
        $filePath = public_path("storage/{$path}");
        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            abort(404); // Return a 404 response if the file doesn't exist
        }
    }

    public function uploadTextEditor(Request $request)
    {


        try {
            // Validate file
            $request->validate([
                'upload' => 'required|image|max:1024' // Max 1MB
            ]);

            $file = $request->file('upload');

            if (!$file) {
                return response()->json(['error' => 'No valid file provided'], 400);
            }

            // Generate unique file name
            $file_name = Carbon::now()->timestamp . "-" . $file->getClientOriginalName();

            $tmp_path = storage_path("/app/public/ckeditor");

            // Check if path exists
            if (!File::exists($tmp_path)) {
                // if path dont exist create new directory
                File::makeDirectory($tmp_path, 0777, true, true);
            }

            // Store file into temporary path
            $file->move($tmp_path, $file_name);

            $url = config('global')["backend_url"] . "/api/image/ckeditor/" . $file_name;

            return response()->json([
                "url" => $url
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function upload(Request $request)
    {

        try {
            // Validate the incoming file
            $request->validate([
                'image' => 'image|max:1024', // max 1MB,
                'logo' => 'image|max:1024', // max 1MB,
                'cover' => 'image|max:1024', // max 1MB,
                'poster' => 'image|max:1024', // max 1MB,
                'avatar' => 'image|max:1024', // max 1MB,
                'background' => 'image|max:1024', // max 1MB,
                'galleries.*' => 'image|max:1024', // max 1MB
            ]);

            if ($request->file('testimonies')) {
                foreach ($request->file('testimonies') as $image) {
                    $file = $image['avatar'];
                }
            } else if ($request->file('data')) {
                foreach ($request->file('data') as $image) {
                    $file = $image['value'] ?? $image['values'];
                }
            } else {
                $file = $request->file('image')
                    ?? $request->file('logo')
                    ?? $request->file('cover')
                    ?? $request->file('poster')
                    ?? $request->file('avatar')
                    ?? $request->file('background')
                    ?? $request->file('galleries')[0];
            }

            if (!$file) {
                return response()->json(['error' => 'No valid file provided'], 400);
            }

            $file_name = Carbon::now()->timestamp . "-" . explode('.', $file->getClientOriginalName())[0] . '.' . $file->getClientOriginalExtension(); // file name = <timestamp>-<file_name>.<file_extension>

            $tmp_path = storage_path("/tmp");

            // Check if path exists
            if (!File::exists($tmp_path)) {
                // if path dont exist create new directory
                File::makeDirectory($tmp_path, 0777, true, true);
            }

            // Store file into temporary path
            $file->move($tmp_path, $file_name);

            return response()->json("tmp/{$file_name}");

            // return $file_tmp_path;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function revert(Request $request)
    {

        try {
            Storage::disk('public')->delete($request->getContent());

            return response()->json("berhasil menghapus file");
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function load($path)
    {
        dd($path);
        return redirect()->route('api.image.show');
    }
}
