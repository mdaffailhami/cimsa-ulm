<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [
            [
                "image" => null,
                "name" => "",
                "description" => ""
            ]
        ];

        foreach ($trainings as $training) {
            $training_model = new Training();
            $training_model->name = $training['name'];
            $training_model->description = $training['description'];

            $training_model->save();
        }
    }
}
