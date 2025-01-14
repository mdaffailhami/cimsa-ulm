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
