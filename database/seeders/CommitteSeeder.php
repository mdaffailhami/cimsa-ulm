<?php

namespace Database\Seeders;

use App\Models\Committe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CommitteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('committe_activities')->truncate();
        DB::table('committe_focuses')->truncate();
        DB::table('committe_testimonies')->truncate();
        DB::table('committes')->truncate();

        $committees = [
            [
                "name" => "SCOME",
                "color" => "#0E0E0E",
                "description" => "SCOME is a forum for medical students who have special interest in the improvement of medical education.",
                "long_description" => "Standing Committee on Medical Education (SCOME) focuses on improvement of medical education system and helping its member to contribute more on medical education system or curriculum evaluation through discussion or academic forum. SCOME member is aimed to be critical and skilled on countering medical education issues or even medical issues in general as an effort on preparing them to be the agents of change. Through SCOME, medical students collaborate to develop medical education in Indonesia by doing projects and activities at local, national, and international activities.",
                "mission_statement" => "We aim to achieve excellence in medical education throughout the world",
                "activities" => [
                    [
                        "name" => "BRING (Bridging Regional Inequality in Indonesia’s Healthcare)",
                        "description" => "BRING (Bridging Regional Inequality in Indonesia’s Healthcare) adalah aktivitas kolaborasi SCOPE dan SCOME CIMSA UGM 2024-2025 untuk memberikan wawasan tentang pentingnya pemerataan tenaga kesehatan di Indonesia dengan mengacu pada sistem kesehatan global untuk memperingati Hari Dokter Nasional melalui Panel Discussion serta Exhibition."
                    ],
                ],
                "focuses" => [
                    "Human Resource for Health",
                    "Medical Education Resources, Research, and Development System"
                ]
            ],
            [
                "name" => "SCORA",
                "color" => "#BD222A",
                "description" => "SCORA aims at raising the awareness on reproductive health including sex education, gender equality, etc..",
                "long_description" => "Standing Committee on Sexual & Reproductive Health and Rights Including HIV & AIDS (SCORA) focuses on issues related to reproductive health, HIV/AIDS, sexually transmitted infections (STIs), gender equality, maternal health, and gender-based violence. SCORA remains courageous and believes that the best way to prevent problems from arising in the community is through education including those topics which could be considered taboo. It is not only a disease that SCORA is trying to defeat, but also the stigma that is circulating in society with education-based activities.",
                "mission_statement" => "To provide necessary tools to advocate for sexual and reproductive health rights within respective communities in a culturally respective fashion.",
                "activities" => [
                    [
                        "name" => "INSIDE OUT (Initiatives for Shifting Stigma and Dissolving HIV/AIDS in Teenagers)",
                        "description" => "Tingginya angka anak di bawah umur yang terkena HIV/AIDS terutama dari kalangan remaja menjadi salah satu permasalahan yang harus ditangani. SCORA CIMSA UGM berusaha mengubah stigma yang ada dan melakukan tindak preventif melalui kegiatan INSIDE OUT. INSIDE OUT dimulai dengan Local Peer Education Training (LPET) bersama PETRA dan Pita Merah Yogyakarta beserta workshop painting the red ribbon. kegiatan berlanjut ke #MariBercerita dengan partisipan di Lembaga Pembinaan Khusus Anak Yogyakarta, membahas ADHA/ADHIV dan pengurangan stigma masyarakat. Kegiatan akan ditutup dengan memberikan edukasi melalui ground campaign di Malioboro."
                    ],
                    [
                        "name" => "RETROGAIDS (Reverse Stereotypes & Stigmas Against HIV/AIDS)",
                        "description" => "World AIDS Day diselenggarakan setiap tahunnya guna memperjuangkan hak ODHA/ODHIV di Indonesia.  Tahun ini, World AIDS Day dilaksanakan dengan mencakup beberapa kegiatan, diantaranya LPET terkait basic peer education dan PPT terkait HIV & AIDS 101, social experiment guna menganalisis secara langsung respon masyarakat terhadap ODHA/ODHIV, 3 days campaign akan dilaksanakan guna meningkatkan pengetahuan masyarakat dan menurunkan stigma masyarakat terkait ODHA/ODHIV, edukasi populasi kunci beserta masyarakat umum melalui webinar dan talkshow, serta advokasi terkait pemenuhan hak ODHA/ODHIV di masa pandemi."
                    ],
                    [
                        "name" => "SECATEEN (Sexual Education for Teen)",
                        "description" => "SECATEEN merupakan kegiatan edukasi remaja terkait hak serta kesehatan seksual dan reproduksi di SMPN 4 Ngaglik. Kegiatan dalam SECATEEN mencakup training panitia yang ditujukan untuk mempersiapkan panitia menjadi peer educator, pelaksanaan bonding dengan olahraga pagi, serta pengadaan intervensi dengan dua topik, yaitu HIV & AIDS dan gender based violence. Intervensi akan diikuti dengan FGD, role play, dan red ribbon challenge."
                    ],
                ],
                "focuses" => [
                    "Comprehensive Sexuality Education",
                    "Maternal Health",
                    "Sexual and Gender Identity",
                    "Gender-based Violence",
                    "HIV and Other STIs"
                ]
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($committees as $committe) {
                $path_name = "committe";
                $image_name = generateImage('committe', $path_name);

                $committe_model = new Committe();

                $committe_model->logo = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;
                $committe_model->name = $committe["name"];
                $committe_model->color = $committe["color"];
                $committe_model->description = $committe["description"];
                $committe_model->long_description = $committe["long_description"];
                $committe_model->mission_statement = $committe["mission_statement"];

                $committe_model->save();

                foreach ($committe["activities"] as $activity) {
                    $activity_model = $committe_model->activities();

                    $activity_model->create([
                        "name" => $activity['name'],
                        "description" => $activity['description']
                    ]);
                }

                foreach ($committe["focuses"] as $focus) {
                    $focus_model = $committe_model->focuses();

                    $focus_model->create([
                        "description" => $focus,
                    ]);
                }

                // Looping Testimonies
                for ($i = 1; $i <= 2; $i++) {
                    $this->createTestimonies($committe_model);
                }

                // Looping Galeries
                for ($i = 1; $i <= 2; $i++) {
                    $this->createGaleries($committe_model, $i);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }

    public function createTestimonies($committe_model)
    {
        $faker = Faker::create();

        $path_name = "avatar/committe";
        $image_name = generateImage('avatar', $path_name);

        $committe_model->testimonies()->create([
            "image" => config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name,
            "name" => $faker->name,
            "position" => $faker->jobTitle,
            "description" => $faker->paragraph,
        ]);
    }

    public function createGaleries($committe_model, $order)
    {
        $path_name = "gallery/committe";
        $image_name = generateImage('image', $path_name);

        $committe_model->galleries()->create([
            "url" => config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name,
            "order" => $order,
            "type" => 'committe'
        ]);
    }
}
