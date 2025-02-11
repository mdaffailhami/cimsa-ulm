<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('model_has_permissions')->truncate();
        DB::table('users')->truncate();

        $admins = User::factory()->count(4)->role('administrator')->create();
        $members = User::factory()->count(29)->role('member')->create();
    }
}
