<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('generatePassword')) {
    function generatePassword()
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $number = '0123456789';

        $uppercase_chosen = [];
        $lowercase_chosen = [];
        $number_chosen = [];

        // Select 3 random uppercase letters
        for ($i = 0; $i < 3; $i++) {
            $uppercase_chosen[] = $uppercase[random_int(0, strlen($uppercase) - 1)];
        }

        // Select 6 random lowercase letters
        for ($i = 0; $i < 6; $i++) {
            $lowercase_chosen[] = $lowercase[random_int(0, strlen($lowercase) - 1)];
        }

        // Select 3 random numbers
        for ($i = 0; $i < 3; $i++) {
            $number_chosen[] = $number[random_int(0, strlen($number) - 1)];
        }

        // Merge the selected characters into one array
        $password = array_merge($uppercase_chosen, $lowercase_chosen, $number_chosen);

        // Shuffle the array to randomize the order
        shuffle($password);

        // Convert the array into a string
        return implode('', $password);
    }
}

if (! function_exists('uploadFile')) {
    function uploadFile($path_name, $temp_file)
    {
        $temp_source = storage_path($temp_file);
        $storage_path = storage_path("/app/public/{$path_name}");

        if (!File::exists($temp_source)) {
            Log::info('Temporary file not found');
            throw new \Exception("Temporary file not found at {$temp_source}");
        }

        // Check if path exists
        if (!File::exists($storage_path)) {
            // if path dont exist create new directory
            File::makeDirectory($storage_path, 0777, true, true);
        }

        $file_name = pathinfo($temp_source, PATHINFO_FILENAME) . "." . pathinfo($temp_source, PATHINFO_EXTENSION);

        File::move($temp_source, "{$storage_path}/{$file_name}");

        if (File::exists($temp_source)) {
            File::delete(storage_path($temp_file));
        }

        return $file_name;
    }
}

if (! function_exists('deleteFile')) {
    function deleteFile()
    {
        if (File::exists()) {
            File::delete(storage_path());
        }
    }
}

if (! function_exists('cleanPublicStorage')) {
    function cleanPublicStorage()
    {
        $storagePath = storage_path('app/public');

        if (File::exists($storagePath)) {
            // File::deleteDirectories($storagePath);

            // Get all directories inside the storage path
            $directories = File::directories($storagePath);

            // Define the directories you want to exclude
            $excludedDirs = [
                storage_path('app/public\pages'),
                storage_path('app/public\profile'),
            ];

            // Delete only the directories that are not in the excluded list
            foreach ($directories as $directory) {
                echo $directory . "\n";

                if (!in_array($directory, $excludedDirs)) {
                    File::deleteDirectory($directory);
                } else {
                    echo "direktori tidak dihapus";
                }
            }

            echo "\nStorage have been cleaned\n";
        } else {
            echo "\nDirectory 'app/public/' does not exist.\n";
        }
    }
}

if (! function_exists('generateImage')) {
    function generateImage($category, $path_name)
    {
        $images = [
            "dummy1.jpg",
            "dummy2.jpg",
            "dummy3.jpg",
            "dummy4.png",
            "dummy5.jpg"
        ];

        $avatars = [
            "A1.png",
            "A2.png",
            "A3.png",
            "A4.png",
            "A5.png"
        ];

        $officials = [
            "2024.png",
            "2023.png",
            "2022.png",
        ];

        $committes = [
            "scome.png",
            "scora.png",
        ];


        if ($category === 'image') {
            $dummy_file = $images[rand(0, count($images) - 1)];
        } else if ($category === 'avatar') {
            $dummy_file = $avatars[rand(0, count($avatars) - 1)];
        } else if ($category === 'official') {
            $dummy_file = $officials[rand(0, count($officials) - 1)];
        } else if ($category === 'committe') {
            $dummy_file = $committes[rand(0, count($committes) - 1)];
        }



        $dummy_source = public_path("/dummies/{$category}/{$dummy_file}");
        $storage_path = storage_path("/app/public/{$path_name}/");

        $file_name = Carbon::now()->timestamp . "-" . Str::slug(pathinfo($dummy_source, PATHINFO_FILENAME)) . "." . pathinfo($dummy_source, PATHINFO_EXTENSION);

        // Check if path exists
        if (!File::exists($storage_path)) {
            // if path dont exist create new directory
            File::makeDirectory($storage_path, 0777, true, true);
        }

        File::copy($dummy_source, "{$storage_path}/{$file_name}");

        return $file_name;
    }
}
