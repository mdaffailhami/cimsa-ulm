<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageContact;
use App\Models\PageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_contents')->truncate();
        DB::table('pages')->truncate();

        $pages = [
            [
                "name" => 'Landing',
                'contents' => [
                    [
                        "label" => 'Banner Title',
                        "type" => 'text',
                        'section' => 'banner',
                        'content' => "CENTER FOR INDONESIAN MEDICAL STUDENTS' ACTIVITIES",
                    ],
                    [
                        "label" => 'Banner Image',
                        "type" => 'image',
                        'section' => 'banner',
                        'content' => null,
                    ],
                    [
                        "label" => 'Vision',
                        "type" => 'long-text',
                        'section' => 'vision-mission',
                        'content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                    ],
                    [
                        "label" => 'Vision Image',
                        "type" => 'image',
                        'section' => 'vision-mission',
                        'content' => null
                    ],
                    [
                        "label" => "Mission",
                        "type" => 'long-text',
                        'section' => "vision-mission",
                        'content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                    ],
                    [
                        "label" => 'Mission Image',
                        "type" => "image",
                        'section' => "vision-mission",
                        'content' => null,
                    ],
                    [
                        "label" => 'Statistic',
                        "type" => 'long-text',
                        'section' => "statistics",
                        'content' => '
                            [
                                {
                                    "name": "Established Year",
                                    "count": "2001"
                                },
                                {
                                    "name": "Active Members",
                                    "count": "+500"
                                },
                                {
                                    "name": "Successful Projects",
                                    "count": "+120"
                                },
                                {
                                    "name": "Community Developments",
                                    "count": "5"
                                }
                            ]
                        ',
                    ],
                    [
                        "label" => 'About Us Bg Image',
                        "type" => 'image',
                        'section' => "about-us",
                        'content' => null,
                    ],
                    [
                        "label" => 'About Us',
                        "type" => 'long-text',
                        'section' => 'about-us',
                        'content' => "CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit and non-governmental organization, that centers on the Sustainable Development Goals. Through its vision, “Empowering Medical Students, Improving Nation’s Health”, CIMSA provides chances and experiences for medical students to express their opinions and idealisms through their social actions that will bring out tangible results for the development of this nation, especially in the medical field.",
                    ],
                    [
                        "label" => 'Quote',
                        "type" => 'text',
                        'section' => 'quotes',
                        'content' => "Lack of activity destroys the good condition of every human being",
                    ],
                    [
                        "label" => 'Quote Image',
                        "type" => 'image',
                        'section' => 'quotes',
                        'content' => null,
                    ],
                    [
                        "label" => 'Quote Author',
                        "type" => 'text',
                        'section' => 'quotes',
                        'content' => "Plato",
                    ],
                ],
                'contact' => null,
            ],
            [
                "name" => 'About IFMSA',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => "<b>International Federation of Medical Students’ Association (IFMSA)</b> adalah organisasi non-profit, non-pemerintah dan non-partisipan yang mewakili asosiasi mahasiswa kedokteran internasional. IFMSA didirikan pada tahun 1951 dan merupakan salah satu organisasi pelajar dan organisasi pelajar kedokteran tertua di dunia. IFMSA terbagi menjadi lima region: Asia-Pacific tempat kita berada, America, Eastern-Mediterranean, Africa, dan Europe. Menghubungkan mahasiswa kedokteran dari 141 organisasi di 130 negara di seluruh dunia, IFMSA memiliki tujuan yang terbagi dalam enam area: kesehatan masyarakat, kesehatan reproduksi seksual, pendidikan kedokteran, hak asasi manusia dan perdamaian, pertukaran pelajar profesional, dan pertukaran pelajar penelitian.",
                    ],
                    [
                        "label" => 'IFMSA Image',
                        "type" => 'image',
                        'section' => null,
                        'content' => null,
                    ],
                    [
                        "label" => 'IFMSA Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => "Setiap tahun, <b>IFMSA</b> menyelenggarakan lebih dari 13.000 program pertukaran penelitian dan klinis bagi mahasiswanya untuk mengeksplorasi inovasi dalam bidang kedokteran, dan sistem kesehatan dalam lingkungan yang berbeda. IFMSA juga secara resmi diakui oleh Perserikatan Bangsa-Bangsa sebagai suara mahasiswa kedokteran internasional, dan memiliki hubungan resmi dengan badan-badan PBB utama, seperti Organisasi Kesehatan Dunia, UNESCO, UNAIDS, UNHCR dan UNFPA, serta pendukung utama seperti World Medical Association (WMA). Ini memastikan bahwa IFMSA dianggap sebagai mitra utama dalam hal masalah kesehatan global, internasional dan lokal. Selain itu, federasi ini memiliki kemitraan resmi dengan beberapa organisasi dan institusi kesehatan dan pembangunan internasional lainnya. Anggota organisasi di IFMSA dinamakan National Member Organization (NMO) dan Indonesia diwakili oleh satu representatif mahasiswa kedokteran Indonesia yaitu NMO CIMSA Indonesia.",
                    ],
                    [
                        "label" => 'IFMSA URL',
                        "type" => 'text',
                        'section' => null,
                        'content' => "https://ifmsa.org",
                    ],
                ],

                'contact' => null
            ],
            [
                "name" => 'About Us',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => 'header',
                        'content' => "<b>Center for Indonesian Medical Students’ Activities</b> is a non-profit, non-government, and non-politic organization facilitating medical students of Indonesia who intend to make great impacts on our nation’s health with activity-based projects. CIMSA empowers medical students of Indonesia to play their major role in health promotion and prevention as a step to improve nation’s health. Also, CIMSA prepares all medical students of Indonesia to increase their capacity in medical fields as future health professionals. CIMSA was officially established in May 6, 2001 and currently maintains 27 locals throughout Indonesia with over 8000 members. Since 2002, CIMSA has been affiliated with the International Federation of Medical Students’ Association (IFMSA), which is recognized by the World Health Organization as the biggest international forum for medical students.",
                        'image_content' => null
                    ],
                    [
                        "label" => 'SDGs Description',
                        "type" => 'long-text',
                        'section' => 'sdgs',
                        'content' => 'We believe in the <b>Sustainable Development Goals (SDGs)</b> and are especially aiding the completion of SDG 3 (Good Health), 4 (Quality Education), 5 (Gender Equality), and 13 (Climate Action).',
                        'image_content' => null
                    ],
                    [
                        "label" => 'SDGs',
                        "type" => 'multiple-image',
                        'section' => 'sdgs',
                        'content' => null,
                        'image_content' => null
                    ],
                    [
                        "label" => 'IFMSA Description',
                        "type" => 'long-text',
                        'section' => 'ifmsa',
                        'content' => 'IFMSA is a <b>non-profit</b>, <b>non-governmental</b>, and <b>non-partisan</b> <b>federation</b> representing <b>association of medical students internationally</b>. Since 1951, <b>IFMSA has been run</b> for and by medical students <b>around the world</b>. IFMSA has been <b>recognized by the United Nations’ System</b> and <b>World Health Organization</b>. <b>CIMSA has been affiliated</b> with IFMSA <b>since 2002</b> and is the <b>sole representative since September 11, 2019</b>.',
                        'image_content' => null
                    ],
                    [
                        "label" => 'Vision & Mission Description',
                        "type" => 'text',
                        'section' => 'vision-mission',
                        'content' => 'We have formulized our vision and mission in the hopes that CIMSA UGM can better address the problems in our area.',
                        'image_content' => null
                    ],
                    [
                        "label" => 'Vision',
                        "type" => 'text',
                        'section' => 'vision-mission',
                        'content' => 'CIMSA ULM sebagai organisasi mahasiswa kedokteran yang adaptif, dinamis, dan bergairah dalam melaksanakan program kerja berkelanjutan serta mewujudkan lingkungan yang profesional dan harmonis bagi para member dan officials.',
                        'image_content' => null
                    ],
                    [
                        "label" => 'Missions',
                        "type" => 'long-text',
                        'section' => 'vision-mission',
                        'content' => json_encode([
                            [
                                "title" => "INTERNAL",
                                "description" => "Mewujudkan <b>CIMSA ULM</b> yang mampu menginspirasi melalui pemberdayaan individu dalam aktivitas relevan dan progresif berdasarkan riset dan data untuk memberikan pengaruh kepada member dan masyarakat."
                            ],
                            [
                                "title" => "EXTERNAL",
                                "description" => "Mengoptimalkan hubungan dan kerja sama dengan pihak eksternal dan alumni senior, meningkatkan penggunaan media yang eksploratif, serta melaksanakan advokasi yang berkelanjutan sebagai perwujudan mahasiswa kedokteran yang aktif dan tanggap isu."
                            ],
                            [
                                "title" => "ADMINISTRATION",
                                "description" => "Kesekretariatan <b><i>CIMSA ULM</i></b> yang efektif, profesional, terintegrasi, dan berbasis teknologi dengan adanya sistem administrasi yang terstandarisasi SOP dan akomodatif bagi member dan officials."
                            ],
                            [
                                "title" => "FINANCE",
                                "description" => "Mengelola dan menjaga kestabilan keuangan CIMSA UGM melalui optimalisasi perencanaan keuangan dan fundraising yang terstruktur, strategis, dan inovatif untuk mendukung program kerja organisasi."
                            ],
                            [
                                "title" => "ORGANIZATIONAL DEVELOPMENT",
                                "description" => "Mengoptimalkan pemanfaatan riset dan data dengan berpedoman pada AD/ART serta rencana strategis untuk mendukung pengembangan organisasi."
                            ]
                        ]),
                        'image_content' => null
                    ],
                ],


                'contact' => null
            ],
            [
                "name" => 'SCOs',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => 'description',
                        'content' => "We organize our work through six Standing Committees that represent focus areas of equal importance in order to maintain a balanced, holistic, and steady approach towards our targets and goals.",
                        'image_content' => null
                    ],
                ],
                'contact' => null
            ],
            [
                "name" => 'Contact Us',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => "Ever-expanding efforts, CIMSA UGM is always looking for opportunities to collaborate and make greater impacts.",
                        'image_content' => null
                    ],
                    [
                        "label" => 'Web3Forms Key',
                        "type" => 'text',
                        'section' => null,
                        'content' => "c95eefba-3246-43b9-8f02-87afe5cb48c9",
                        'image_content' => null
                    ],
                    [
                        "label" => 'Map URL',
                        "type" => 'text',
                        'section' => null,
                        'content' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.211029688729!2d114.58294921060936!3d-3.2978638966631637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4230963790c57%3A0x902859712cc02755!2sLambung%20Mangkurat%20University%20-%20Campus%20I%20Banjarmasin!5e0!3m2!1sen!2sid!4v1734245455540!5m2!1sen!2sid',
                        'image_content' => null
                    ],

                ],
                'contact' => [
                    "name" => 'ANYASEFRIA RIZQIDA A.',
                    'occupation' => 'Vice Local Coordinator for External Affairs',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'year' => '2024',
                    'end_year' => '2025',
                ],
            ],
            [
                "name" => 'Alumni Senior',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => "CIMSA ULM is forever thankful to those who have contributed their hearts, spirits, and time to making CIMSA ULM what it is today. This is a page dedicated to our alumni and seniors.",
                    ],
                    [
                        "label" => 'Map Image',
                        "type" => 'image',
                        'section' => null,
                        'content' => null
                    ],

                ],
                'contact' => [
                    "name" => 'Muhammad Daffa Ilhami',
                    'occupation' => 'Vice Local Coordinator',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'year' => '2025',
                    'end_year' => '2026',
                ],
            ],
            [
                "name" => 'Activities',
                'contents' => [
                    [
                        "label" => 'Programs Image',
                        "type" => 'image',
                        'section' => 'programs',
                        'content' => null,
                    ],
                    [
                        "label" => 'Programs Description',
                        "type" => 'long-text',
                        'section' => 'programs',
                        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores quasi nihil, voluptatibus doloribus illum porro sint debitis nam aliquid nobis nemo consequatur, sit vel necessitatibus excepturi, id praesentium quae.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam incidunt, similique autem hic quae a iste vero dolor unde necessitatibus, velit natus minima fuga officiis perferendis architecto ipsa eligendi illo.',
                    ],
                    [
                        "label" => 'Trainings Image',
                        "type" => 'image',
                        'section' => 'trainings',
                        'content' => null,
                    ],
                    [
                        "label" => 'Trainings Description',
                        "type" => 'long-text',
                        'section' => 'trainings',
                        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores quasi nihil, voluptatibus doloribus illum porro sint debitis nam aliquid nobis nemo consequatur, sit vel necessitatibus excepturi, id praesentium quae.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam incidunt, similique autem hic quae a iste vero dolor unde necessitatibus, velit natus minima fuga officiis perferendis architecto ipsa eligendi illo.',
                    ],
                    [
                        "label" => 'National Meetings Description',
                        "type" => 'long-text',
                        'section' => 'national-meetings',
                        'content' => 'One of CIMSA’s goal is to provide a forum for Indonesian medical students to discuss topics related to health and educatiom. Therefore, every year CIMSA holds its annual meetings on February, May, and October. Each meeting has specific goals, target, and strategies designed by CIMSA national officer. The core activities on our meetings are Grand Lecture and Issue Update, Trainings, Plenary Session, Parallel Sessions, and Small Working Group Discussions. In the end, the output of these meetings will be implemented in our locals’ activities.',
                    ],
                    [
                        "label" => 'National Meetings Embedded Youtube URL',
                        "type" => 'text',
                        'section' => 'national-meetings',
                        'content' => 'https://www.youtube.com/embed/Hap0KvyFwLI?si=WLVLwJAUrKCPpwD1',
                    ],
                    [
                        "label" => 'Become Delegates URL',
                        "type" => 'text',
                        'section' => 'national-meetings',
                        'content' => 'https://mdaffailhami.github.io',
                    ],

                ],
                'contact' => null,
            ],
            [
                "name" => 'Programs',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => 'We manifest the will to achieve our goals through ways that are relevant-to-the-issue, sustainable, and accountable.',
                    ],

                ],
                'contact' => null,
            ],
            [
                "name" => 'Trainings',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => 'True to our vision, CIMSA UGM aims to empower medical students in every possible aspect.',
                    ],
                    [
                        "label" => 'Trainers Description',
                        "type" => 'text',
                        'section' => null,
                        'content' => 'CIMSA has an established capacity building system where members may become trainers that will act as peer educators on various topics. These ‘trainings of trainers’ are conducted each year (some are held biennially), ensuring a steady production of trainers and a continuous stream of capacity buildings.',
                    ],

                ],
                'contact' => [
                    "name" => 'Muhammad Daffa Ilhami',
                    'occupation' => 'Vice Local Coordinator',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'year' => '2025',
                    'end_year' => '2026',
                ],
            ],
            [
                "name" => 'Officials',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => 'Meet the officials of CIMSA ULM. We are a team of dedicated and passionate individuals who work together to achieve our goals and make a positive impact in our community.',
                    ],

                ],
                'contact' => null,
            ],
            [
                "name" => 'Blog',
                'contents' => [
                    [
                        "label" => 'Description',
                        "type" => 'long-text',
                        'section' => null,
                        'content' => 'Content from our members, seniors, alumni, and activity reports.',
                    ],

                ],
                'contact' => [
                    "name" => 'Muhammad Daffa Ilhami',
                    'occupation' => 'Vice Local Coordinator',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'year' => '2025',
                    'end_year' => '2026',
                ],
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($pages as $page) {
                $page_model = new Page();

                $page_model->name = $page['name'];
                $page_model->uri = Str::slug($page['name']);

                $page_model->save();

                foreach ($page['contents'] as $page_content) {

                    $this->createPageContent($page_model, $page_content);
                }

                if (isset($page['contact'])) {
                    $this->createPageContact($page_model, $page["contact"]);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }

    public function createPageContent($page_model, $data)
    {

        $slug = Str::slug($page_model->name);

        $payload = [
            'column' => Str::slug($data['label']),
            'label' => $data['label'],
            'type' => $data['type'],
            'section' => $data['section'],
        ];

        if ($data['type'] === 'text') {
            $payload['text_content'] = $data['content'];
        } elseif ($data['type'] === 'long-text') {
            $payload['long_text_content'] = $data['content'];
        }

        // For Image data
        $page_content_model = $page_model->contents()->create($payload);

        // single image
        if ($data['type'] === 'image') {
            $path_name = "pages/{$slug}";
            $image_name = generateImage('image', $path_name);
            $page_content_model->galleries()->create([
                "url" => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
                "order" => 1,
                "type" => "page-content"
            ]);
        }

        // multiple image
        if ($data['type'] === 'multiple-image') {
            // Looping Galeries
            for ($i = 1; $i <= 3; $i++) {
                $path_name = "pages/{$slug}";
                $image_name = generateImage('image', $path_name);

                $page_content_model->galleries()->create([
                    "url" => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
                    "order" => $i,
                    "type" => "page-content"
                ]);
            }
        }
    }

    public function createPageContact($page_model, $data)
    {
        $path_name = "avatar/page-contact";
        $image_name = generateImage('avatar', $path_name);

        $page_model->contact()->create([
            'type' => 'page',
            'image' => config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name,
            'name' => $data['name'],
            'occupation' => $data['occupation'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'year' => $data['year'],
        ]);
    }
}
