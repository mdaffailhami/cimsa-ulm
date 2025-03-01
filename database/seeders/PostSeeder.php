<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "articles",
            "activities",
        ];

        DB::beginTransaction();

        try {
            foreach ($categories as $category) {
                $category_model = Category::where('name', $category)->first();

                if (!$category_model) {
                    $category_model = new Category();
                    $category_model->name = $category;

                    $category_model->save();
                }
            }

            for ($i = 1; $i <= 25; $i++) {
                $categories = Category::all()->random(rand(1, 2))->pluck('id')->toArray();

                $posts = Post::factory()->count(1)->categories($categories)->create();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
