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
        $trainings = [
            [
                "name" => "CIMSA TRAINERS",
                "description" => "CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.",
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "name" => "Medical Education Trainers",
                "description" => "Medical Education Trainers are ....",
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "name" => "Peer Educator Trainers",
                "description" => "Peer Educator Trainers are ....",
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "name" => "Human Rights Education Facilitators",
                "description" => "Human Rights Education Facilitators are ....",
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "name" => "Public Health Leaders",
                "description" => "Public Health Leaders are ....",
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($trainings as $training) {
                $path_name = "training";
                $image_name = generateImage('image', $path_name);

                $training_model = Training::where('name', $training['name'])->first();

                if (!$training_model) {
                    $training_model = new Training();
                }

                $training_model->image = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
                $training_model->name = $training['name'];
                $training_model->description = $training['description'];
                $training_model->url = $training['url'];

                $training_model->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
