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

        DB::table('official_division_members')->truncate();
        DB::table('official_divisions')->truncate();
        DB::table('officials')->truncate();

        $officials = [
            [
                'start_year' => '2024',
                'end_year' => '2025',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'start_year' => '2023',
                'end_year' => '2024',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'start_year' => '2022',
                'end_year' => '2023',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'start_year' => '2021',
                'end_year' => '2022',
                'divisions' => [
                    'Excecutive Board',
                    'Suporting Division Coordinator',
                    'Local Officer',
                ]
            ],
            [
                'start_year' => '2020',
                'end_year' => '2021',
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
                $official_model = new Official();

                $path_name = "official";
                $image_name = generateImage('official', $path_name);

                $official_model->poster = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
                $official_model->start_year = $official['start_year'];
                $official_model->end_year = $official['end_year'];

                $official_model->save();

                foreach ($official['divisions'] as $division) {
                    $division_model = $official_model->divisions()->create([
                        'name' => $division
                    ]);

                    foreach ($positions as $position) {
                        $this->createMember($division_model, $position);
                    }
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
}
