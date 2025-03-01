<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Schema::disableForeignKeyConstraints();

        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            UserTestSeeder::class,
            ProfileSeeder::class,
            PageSeeder::class,
            ResetDataSeeder::class,
            OfficialSeeder::class,
            CommitteSeeder::class,
            ProgramSeeder::class,
            TrainingSeeder::class,
            SocialMediaSeeder::class,
            PostSeeder::class,
        ]);



        Schema::enableForeignKeyConstraints();
    }
}
