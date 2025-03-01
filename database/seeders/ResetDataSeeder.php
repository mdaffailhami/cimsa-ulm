<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // Delete all division related data
        DB::table('official_division_members')->truncate();
        DB::table('official_divisions')->truncate();
        DB::table('officials')->truncate();

        // Delete all committe related data
        DB::table('committe_activities')->truncate();
        DB::table('committe_focuses')->truncate();
        DB::table('committe_testimonies')->truncate();
        DB::table('committes')->truncate();

        // Delete programs related data
        DB::table('programs')->truncate();

        // Delete all trainings related data
        DB::table('trainings')->truncate();

        //  Delete all posts and categories related data
        DB::table('posts')->truncate();
        DB::table('categories')->truncate();

        Schema::enableForeignKeyConstraints();
    }
}
