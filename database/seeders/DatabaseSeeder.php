<?php

namespace Database\Seeders;

use App\Models\Official;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('galleries')->truncate();

        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            OfficialSeeder::class,
            CommitteSeeder::class,
            ProgramSeeder::class,
            TrainingSeeder::class,
            PageSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
