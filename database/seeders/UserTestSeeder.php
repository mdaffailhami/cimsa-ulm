<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::factory()->count(1)->role('super-administrator')->state([
            'username' => 'superadmin',
            'full_name' => 'Super Administrator',
            'visible_password' => 'superadmincimsa',
            'password' => Hash::make('superadmincimsa')
        ])->create();

        $test_admin = User::factory()->count(1)->role('administrator')->state([
            'username' => 'admintest',
            'full_name' => 'Administrator',
            'visible_password' => 'admintestcimsa',
            'password' => Hash::make('admintestcimsa')
        ])->create();

        $test_member = User::factory()->count(1)->role('member')->state([
            'username' => 'membertest',
            'full_name' => 'Member Test',
            'visible_password' => 'membertestcimsa',
            'password' => Hash::make('membertestcimsa')
        ])->create();
    }
}
