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
            'username' => 'admincimsa',
            'full_name' => 'Administrator Cimsa',
            'email' => 'cimsa.ulm@gmail.com',
            'visible_password' => 'admincimsa030305',
            'password' => Hash::make('admincimsa030305')
        ])->create();

        // $test_member = User::factory()->count(1)->role('member')->state([
        //     'username' => 'membertest',
        //     'full_name' => 'Member Test',
        //     'visible_password' => 'membertestcimsa',
        //     'password' => Hash::make('membertestcimsa')
        // ])->create();
    }
}
