<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_medias')->truncate();

        $social_medias = [
            [
                "platform" => 'instagram',
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "platform" => 'facebook',
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "platform" => 'twitter',
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ],
            [
                "platform" => 'youtube',
                "url" => "https://cimsa.fk.ugm.ac.id/"
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($social_medias as $social_media) {
                $social_media_model = new SocialMedia();

                $social_media_model->platform = $social_media['platform'];
                $social_media_model->url = $social_media['url'];

                $social_media_model->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
