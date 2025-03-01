<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                "name" => "ACTIVITIES",
                "description" => "Our bread and butter. CIMSA delivers its impacts through executing activities tailored to our goals and visions.",
            ],
            [
                "name" => "Advocacy",
                "description" => "We understand that reaching our goals would require a multifaceted effort. We identify our stakeholders and we advocate.",
            ],
            [
                "name" => "Research",
                "description" => "We act on based on what’s happening and evaluate by data.Research shapes our decisions and makes sure that what we do are held accountable.",
            ],
            [
                "name" => "Capacity Building",
                "description" => "With an established system of trainings supported by an ecosystem of active trainers, we continuously empower our members and facilitate the development of their potentials.",
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($programs as $program) {
                $program_model = new Program();

                $program_model->name = $program['name'];
                $program_model->description = $program["description"];

                $program_model->save();

                // Looping Galeries
                for ($i = 1; $i <= 2; $i++) {
                    $this->createGaleries($program_model, $i);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }

    public function createGaleries($program_model, $order)
    {
        $path_name = "gallery/program";
        $image_name = generateImage('image', $path_name);

        $program_model->galleries()->create([
            "url" => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
            "order" => $order,
            "type" => "program"
        ]);
    }
}
