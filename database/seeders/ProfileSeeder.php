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
                'image_content' => null,
                'text_content' => 'CIMSA'
            ],
            [
                "column" => 'Universitas',
                'type' => 'text',
                'image_content' => null,
                'text_content' => 'Universitas Gadjah Mada'
            ],
            [
                "column" => 'Deskripsi',
                'type' => 'text',
                'image_content' => null,
                'text_content' => 'CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit, and non-governmental organization, that centers on the Sustainable Development Goals.'
            ],
            [
                "column" => 'Nomor Telepon',
                'type' => 'text',
                'image_content' => null,
                'text_content' => '082226926058'
            ],
            [
                "column" => 'Email',
                'type' => 'text',
                'image_content' => null,
                'text_content' => 'vlecimsaugm@gmail.com'
            ],
            [
                "column" => 'Alamat',
                'type' => 'text',
                'image_content' => null,
                'text_content' => 'Universitas Gadjah Mada, Fakultas Kedokteran Universitas Gadjah Mada, Jl.Farmako Sekip Utara, Sendowo, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia'
            ],
        ];

        foreach ($profiles as $profile) {
            $profile_model = new CimsaProfile();
            $profile_model->column = $profile['column'];
            $profile_model->type = $profile['type'];
            $profile_model->image_content = $profile['image_content'];
            $profile_model->text_content = $profile['text_content'];

            $profile_model->save();
        }
    }
}
