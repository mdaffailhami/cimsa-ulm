<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officials = [
            [
                'year' => '2024',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'year' => '2023',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'year' => '2022',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'year' => '2021',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'year' => '2020',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
        ];

        $positions = [
            "Position 1",
            "Position 2",
            "Position 3"
        ];

        Db::beginTransaction();

        try {
            foreach ($officials as $official) {
                $official_model = Official::where('year', $official['year'])->first();

                if (!$official_model) {
                    $official_model = new Official();
                }

                $path_name = "official";
                $image_name = generateImage('official', $path_name);

                // $official_model->poster = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
                $official_model->year = $official['year'];

                $official_model->save();

                foreach ($official['divisions'] as $division) {
                    $division_model = $official_model->divisions()->create([
                        'name' => $division
                    ]);

                    foreach ($positions as $position) {
                        $this->createMember($division_model, $position);
                    }
                }

                // Looping Posters
                for ($i = 1; $i <= 2; $i++) {
                    $this->createPosters($official_model, $i);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }

    public function createMember($division_model, $position)
    {
        $faker = Faker::create();

        $path_name = "avatar/official-member";
        $image_name = generateImage('avatar', $path_name);

        $division_model->members()->create([
            'image' => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'position' => $position,
        ]);
    }
    public function createPosters($official_model, $order)
    {
        $path_name = "gallery/official-poster";
        $image_name = generateImage('official', $path_name);

        $official_model->posters()->create([
            "url" => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
            "order" => $order,
            "type" => 'official-poster'
        ]);
    }
}
