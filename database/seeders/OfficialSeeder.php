<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officials = [
            [
                'poster' => null,
                'start_year' => '2024',
                'end_year' => '2025',
                'divisions' => [
                    'name' => '',
                    'members' => [
                        'image' => null,
                        'name' => '',
                        'email' => '',
                        'position' => ''
                    ]
                ]
            ]
        ];

        foreach ($officials as $official) {
            $official_model = new Official();

            $official_model->poster = $official['poster'];
            $official_model->start_year = $official['start_year'];
            $official_model->end_year = $official['end_year'];

            $official_model->save();

            foreach ($official['divisions'] as $division) {
                $division_model = $official_model->divisions()->create([
                    'name' => $division['name']
                ]);

                foreach ($division['members'] as $member) {
                    $division_model->members()->create([
                        'image' => $member['image'],
                        'name' => $member['name'],
                        'email' => $member['email'],
                        'position' => $member['position'],
                    ]);
                }
            }
        }
    }
}
