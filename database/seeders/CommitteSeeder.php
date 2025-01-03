<?php

namespace Database\Seeders;

use App\Models\Committe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $committees = [
            [
                "logo" => "",
                "name" => "",
                "color" => "",
                "description" => "",
                "long_description" => "",
                "mission_statement" => "",
                "activities" => [
                    [
                        "name" => "",
                        "description" => ""
                    ],
                ],
                "testimonies" => [
                    [
                        "image" => null,
                        "name" => "",
                        "position" => "",
                        "description" => ""
                    ]
                ],
                "focuses" => [
                    ""
                ]
            ]
        ];

        foreach ($committees as $committe) {
            $committe_model = new Committe();

            $committe_model->logo = $committe["logo"];
            $committe_model->name = $committe["name"];
            $committe_model->color = $committe["color"];
            $committe_model->description = $committe["description"];
            $committe_model->long_description = $committe["long_description"];
            $committe_model->mission = $committe["mission"];

            $committe_model->save();

            foreach ($committe["activities"] as $activity) {
                $activity_model = $committe_model->activities();

                $activity_model->create([
                    "title" => $activity['title'],
                    "description" => $activity['description']
                ]);
            }

            foreach ($committe["testimonies"] as $testimony) {
                $testimony_model = $committe_model->testimonies();

                $testimony_model->create([
                    "title" => $testimony['title'],
                    "description" => $testimony['description']
                ]);
            }
        }
    }
}
