<?php

namespace Database\Seeders;

use App\Models\CimsaProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cimsa_profiles')->truncate();

        $profiles = [
            [
                "label" => 'Logo Organisasi',
                'type' => 'image',
                'content' => null
            ],
            [
                "label" => 'Nama Organisasi',
                'type' => 'text',
                'content' => 'CIMSA'
            ],
            [
                "label" => 'Universitas',
                'type' => 'text',
                'content' => 'Universitas Gadjah Mada'
            ],
            [
                "label" => 'Deskripsi',
                'type' => 'long-text',
                'content' => 'CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit, and non-governmental organization, that centers on the Sustainable Development Goals.'
            ],
            [
                "label" => 'Nomor Telepon',
                'type' => 'text',
                'content' => '082226926058'
            ],
            [
                "label" => 'Email',
                'type' => 'text',
                'content' => 'vlecimsaugm@gmail.com'
            ],
            [
                "label" => 'Alamat',
                'type' => 'text',
                'content' => 'Universitas Gadjah Mada, Fakultas Kedokteran Universitas Gadjah Mada, Jl.Farmako Sekip Utara, Sendowo, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia'
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($profiles as $profile) {
                $profile_model = new CimsaProfile();
                $profile_model->column = Str::slug($profile['label']);
                $profile_model->label = $profile['label'];
                $profile_model->type = $profile['type'];

                if ($profile['type'] === 'text') {
                    $profile_model->text_content = $profile['content'];
                } else if ($profile['type'] === 'long-text') {
                    $profile_model->long_text_content = $profile['content'];
                } else if ($profile['type'] === 'image') {
                    $path_name = "profile";
                    $image_name = generateImage('image', $path_name);
                    $profile_model->galleries()->create([
                        "url" => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
                        "order" => 0,
                        "type" => "profile"
                    ]);
                } else if ($profile['type'] === 'multiple-image') {
                    for ($i = 1; $i <= 3; $i++) {
                        $path_name = "profile";
                        $image_name = generateImage('image', $path_name);
                        $profile_model->galleries()->create([
                            "url" => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
                            "order" => 0,
                            "type" => "profile"
                        ]);
                    }
                }

                $profile_model->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
