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
        DB::table('page_contacts')->truncate();
        DB::table('page_contents')->truncate();
        DB::table('pages')->truncate();

        $pages = [
            [
                "name" => 'Landing',
                'contents' => [
                    [
                        "column" => 'banner-title',
                        "label" => 'Banner Title',
                        "type" => 'text',
                        'section' => 'banner',
                        'text_content' => "CENTER FOR INDONESIAN MEDICAL STUDENTS' ACTIVITIES",
                    ],
                    [
                        "column" => 'banner-image',
                        "label" => 'Banner Image',
                        "type" => 'image',
                        'section' => 'banner',
                        'text_content' => null,
                    ],
                    [
                        "column" => 'vision',
                        "label" => 'Vision',
                        "type" => 'text',
                        'section' => 'vision-mission',
                        'text_content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                    ],
                    [
                        "column" => 'vision-image',
                        "label" => 'Vision Image',
                        "type" => 'image',
                        'section' => 'vision-mission',
                        'text_content' => null
                    ],
                    [
                        "column" => 'mission',
                        "type" => 'text',
                        'section' => "vision-mission",
                        'text_content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                    ],
                    [
                        "column" => 'mission-image',
                        "label" => 'Mission Image',
                        "type" => "image",
                        'section' => "vision-mission",
                        'text_content' => null,
                    ],
                    [
                        "column" => 'established-year',
                        "type" => 'text',
                        'section' => "statistics",
                        'text_content' => "2001",
                    ],
                    [
                        "column" => 'active-members',
                        "type" => 'text',
                        'section' => "statistics",
                        'text_content' => "+500",
                    ],
                    [
                        "column" => 'successful-projects',
                        "type" => 'text',
                        'section' => "statistics",
                        'text_content' => "+120",
                    ],
                    [
                        "column" => 'community-developments',
                        "type" => 'text',
                        'section' => "statistics",
                        'text_content' => "5",
                    ],
                    [
                        "column" => 'about-us-bg-image',
                        "type" => 'image',
                        'section' => "about-us",
                        'text_content' => null,
                    ],
                    [
                        "column" => 'about-us',
                        "type" => 'text',
                        'section' => 'about-us',
                        'text_content' => "CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit and non-governmental organization, that centers on the Sustainable Development Goals. Through its vision, “Empowering Medical Students, Improving Nation’s Health”, CIMSA provides chances and experiences for medical students to express their opinions and idealisms through their social actions that will bring out tangible results for the development of this nation, especially in the medical field.",
                    ],
                    [
                        "column" => 'quote',
                        "label" => 'Quote',
                        "type" => 'text',
                        'section' => 'quotes',
                        'text_content' => "Lack of activity destroys the good condition of every human being",
                    ],
                    [
                        "column" => 'quote-image',
                        "label" => 'Quote Image',
                        "type" => 'image',
                        'section' => 'quotes',
                        'text_content' => null,
                    ],
                    [
                        "column" => 'quote-author',
                        "label" => 'Quote Author',
                        "type" => 'text',
                        'section' => 'quotes',
                        'text_content' => "Plato",
                    ],
                ],
                'contact' => null,
            ],
            [
                "name" => 'About Us',
                'contents' => [
                    [
                        "column" => 'description',
                        "label" => 'Description',
                        "type" => 'text',
                        'section' => 'description',
                        'text_content' => "Center for Indonesian Medical Students’ Activities is a non-profit, non- government, and non-politic organization facilitating medical students of Indonesia who intend to make great impacts on our nation’s health with activity-based projects. CIMSA empowers medical students of Indonesia to play their major role in health promotion and prevention as a step to improve nation’s health. Also, CIMSA prepares all medical students of Indonesia to increase their capacity in medical fields as future health professionals. CIMSA was officially established in May, 6th 2001 and currently maintains 27 locals throughout Indonesia with over 8000 members. Since 2002, CIMSA has been affiliated with International Federation of Medical Students’ Association (IFMSA), which is recognized by World Health Organization as the biggest international forum for medical students.",
                        'image_content' => null
                    ],
                ],
                'contact' => null
            ],
            [
                "name" => 'Contact Us',
                'contents' => [
                    [
                        "column" => 'description',
                        "label" => 'Description',
                        "type" => 'text',
                        'section' => null,
                        'text_content' => "Ever-expanding efforts, CIMSA UGM is always looking for opportunities to collaborate and make greater impacts.",
                        'image_content' => null
                    ],
                    [
                        "column" => 'map-url',
                        "label" => 'Map URL',
                        "type" => 'text',
                        'section' => null,
                        'text_content' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.211029688729!2d114.58294921060936!3d-3.2978638966631637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4230963790c57%3A0x902859712cc02755!2sLambung%20Mangkurat%20University%20-%20Campus%20I%20Banjarmasin!5e0!3m2!1sen!2sid!4v1734245455540!5m2!1sen!2sid',
                        'image_content' => null
                    ],

                ],
                'contact' => [
                    "name" => 'ANYASEFRIA RIZQIDA A.',
                    'ocupation' => 'Vice Local Coordinator for External Affairs',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'start_year' => '2024',
                    'end_year' => '2025',
                ],
            ],
            [
                "name" => 'Alumni Senior',
                'contents' => [
                    [
                        "column" => 'description',
                        "label" => 'Description',
                        "type" => 'text',
                        'section' => null,
                        'text_content' => "CIMSA ULM is forever thankful to those who have contributed their hearts, spirits, and time to making CIMSA ULM what it is today. This is a page dedicated to our alumni and seniors.",
                    ],
                    [
                        "column" => 'map-image',
                        "label" => 'Map Image',
                        "type" => 'image',
                        'section' => null,
                        'text_content' => null
                    ],

                ],
                'contact' => [
                    "name" => 'Muhammad Daffa Ilhami',
                    'ocupation' => 'Vice Local Coordinator',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'start_year' => '2025',
                    'end_year' => '2026',
                ],
            ],
            [
                "name" => 'Activities',
                'contents' => [
                    [
                        "column" => 'programs-image',
                        "label" => 'Programs Image',
                        "type" => 'image',
                        'section' => 'programs',
                        'text_content' => null,
                    ],
                    [
                        "column" => 'programs-description',
                        "label" => 'Programs Description',
                        "type" => 'text',
                        'section' => 'programs',
                        'text_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores quasi nihil, voluptatibus doloribus illum porro sint debitis nam aliquid nobis nemo consequatur, sit vel necessitatibus excepturi, id praesentium quae.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam incidunt, similique autem hic quae a iste vero dolor unde necessitatibus, velit natus minima fuga officiis perferendis architecto ipsa eligendi illo.',
                    ],
                    [
                        "column" => 'trainings-image',
                        "label" => 'Trainings Image',
                        "type" => 'image',
                        'section' => 'trainings',
                        'text_content' => null,
                    ],
                    [
                        "column" => 'trainings-description',
                        "label" => 'Trainings Description',
                        "type" => 'text',
                        'section' => 'trainings',
                        'text_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores quasi nihil, voluptatibus doloribus illum porro sint debitis nam aliquid nobis nemo consequatur, sit vel necessitatibus excepturi, id praesentium quae.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam incidunt, similique autem hic quae a iste vero dolor unde necessitatibus, velit natus minima fuga officiis perferendis architecto ipsa eligendi illo.',
                    ],
                    [
                        "column" => 'national-meetings-description',
                        "label" => 'National Meetings Description',
                        "type" => 'text',
                        'section' => 'national-meetings',
                        'text_content' => 'One of CIMSA’s goal is to provide a forum for Indonesian medical students to discuss topics related to health and educatiom. Therefore, every year CIMSA holds its annual meetings on February, May, and October. Each meeting has specific goals, target, and strategies designed by CIMSA national officer. The core activities on our meetings are Grand Lecture and Issue Update, Trainings, Plenary Session, Parallel Sessions, and Small Working Group Discussions. In the end, the output of these meetings will be implemented in our locals’ activities.',
                    ],
                    [
                        "column" => 'national-meetings-embedded-youtube-url',
                        "label" => 'National Meetings Embedded Youtube URL',
                        "type" => 'text',
                        'section' => 'national-meetings',
                        'text_content' => 'https://www.youtube.com/embed/Hap0KvyFwLI?si=WLVLwJAUrKCPpwD1',
                    ],
                    [
                        "column" => 'become-delegates-url',
                        "label" => 'Become Delegates URL',
                        "type" => 'text',
                        'section' => 'national-meetings',
                        'text_content' => 'https://mdaffailhami.github.io',
                    ],

                ],
                'contact' => null,
            ],
            [
                "name" => 'Trainings',
                'contents' => [
                    [
                        "column" => 'description',
                        "label" => 'Description',
                        "type" => 'text',
                        'section' => null,
                        'text_content' => 'True to our vision, CIMSA UGM aims to empower medical students in every possible aspect.',
                    ],
                    [
                        "column" => 'trainers-description',
                        "label" => 'Trainers Description',
                        "type" => 'text',
                        'section' => null,
                        'text_content' => 'CIMSA has an established capacity building system where members may become trainers that will act as peer educators on various topics. These ‘trainings of trainers’ are conducted each year (some are held biennially), ensuring a steady production of trainers and a continuous stream of capacity buildings.',
                    ],

                ],
                'contact' => [
                    "name" => 'Muhammad Daffa Ilhami',
                    'ocupation' => 'Vice Local Coordinator',
                    'email' => 'vlecimsaugm@gmail.com',
                    'phone' => '082226926058',
                    'start_year' => '2025',
                    'end_year' => '2026',
                ],
            ],
            [
                "name" => 'Officials',
                'contents' => [
                    [
                        "column" => 'description',
                        "label" => 'Description',
                        "type" => 'text',
                        'section' => null,
                        'text_content' => 'Meet the officials of CIMSA ULM. We are a team of dedicated and passionate individuals who work together to achieve our goals and make a positive impact in our community.',
                    ],

                ],
                'contact' => null,
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
            'column' => $data['column'],
            'type' => $data['type'],
            'section' => $data['section'],
            'text_content' => isset($data['text_content']) ? $data["text_content"] : null,
        ];

        if ($data['type'] === 'image') {
            $path_name = "pages/{$slug}";
            $image_name = generateImage('image', $path_name);
            $image_url = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;

            $payload["image_content"] = $image_url;
        }

        $page_model->contents()->create($payload);
    }

    public function createPageContact($page_model, $data)
    {
        $path_name = "avatar/page-contact";
        $image_name = generateImage('avatar', $path_name);

        $page_model->contact()->create([
            'image' => config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name,
            'name' => $data['name'],
            'ocupation' => $data['ocupation'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'start_year' => $data['start_year'],
            'end_year' => $data['end_year'],
        ]);
    }
}
