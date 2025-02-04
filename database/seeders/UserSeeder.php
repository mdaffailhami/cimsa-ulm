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
        DB::table('users')->truncate();

        $superadmin = User::factory()->count(1)->role('super-administrator')->state([
            'username' => 'superadmin',
            'full_name' => 'Super Administrator',
            'visible_password' => 'superadmincimsa',
            'password' => Hash::make('superadmincimsa')
        ])->create();

        $test_admin = User::factory()->count(1)->role('administrator')->state([
            'username' => 'admintest',
            'full_name' => 'Administrator',
        ])->create();

        $test_member = User::factory()->count(1)->role('member')->state([
            'username' => 'membertest',
            'full_name' => 'Member Test',
        ])->create();

        $members = User::factory()->count(20)->role('member')->create();
    }
}
