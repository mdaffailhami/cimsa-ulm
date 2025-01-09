<?php

namespace Database\Seeders;

use App\Models\CimsaProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                "column" => 'Nama Organisasi',
                'type' => 'text',
                'text_content' => 'CIMSA'
            ],
            [
                "column" => 'Universitas',
                'type' => 'text',
                'text_content' => 'Universitas Gadjah Mada'
            ],
            [
                "column" => 'Deskripsi',
                'type' => 'text',
                'text_content' => 'CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit, and non-governmental organization, that centers on the Sustainable Development Goals.'
            ],
            [
                "column" => 'Nomor Telepon',
                'type' => 'text',
                'text_content' => '082226926058'
            ],
            [
                "column" => 'Email',
                'type' => 'text',
                'text_content' => 'vlecimsaugm@gmail.com'
            ],
            [
                "column" => 'Alamat',
                'type' => 'text',
                'text_content' => 'Universitas Gadjah Mada, Fakultas Kedokteran Universitas Gadjah Mada, Jl.Farmako Sekip Utara, Sendowo, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia'
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($profiles as $profile) {
                $profile_model = new CimsaProfile();
                $profile_model->column = $profile['column'];
                $profile_model->type = $profile['type'];

                if ($profile['type'] === 'image') {
                    $path_name = "profile";
                    $image_name = generateImage('image', $path_name);
                    $image_url = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;

                    $profile_model->image_content = $image_url;
                }

                $profile_model->text_content = isset($profile['text_content']) ? $profile["text_content"] : null;

                $profile_model->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
