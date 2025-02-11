<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CleanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('official_division_members')->truncate();
        DB::table('official_divisions')->truncate();
        DB::table('officials')->truncate();

        DB::table('committe_activities')->truncate();
        DB::table('committe_focuses')->truncate();
        DB::table('committe_testimonies')->truncate();
        DB::table('committes')->truncate();

        DB::table('programs')->truncate();

        DB::table('trainings')->truncate();

        DB::table('categories')->truncate();
        DB::table('posts')->truncate();

        $this->call([
            PageSeeder::class,
            ProfileSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
