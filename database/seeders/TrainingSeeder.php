<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trainings')->truncate();

        $trainings = [
            [
                "name" => "CIMSA TRAINERS",
                "description" => "CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally."
            ],
            [
                "name" => "Medical Education Trainers",
                "description" => "Medical Education Trainers are ...."
            ],
            [
                "name" => "Peer Educator Trainers",
                "description" => "Peer Educator Trainers are ...."
            ],
            [
                "name" => "Huma Rights Education Facilitators",
                "description" => "Huma Rights Education Facilitators are ...."
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($trainings as $training) {
                $path_name = "training";
                $image_name = generateImage('image', $path_name);


                $training_model = new Training();
                $training_model->image = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;
                $training_model->name = $training['name'];
                $training_model->description = $training['description'];

                $training_model->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
