<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageContact;
use App\Models\PageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->truncate();

        $pages = [
            [
                "name" => 'Landing',
                "uri" => '',
                'contents' => [
                    [
                        "column" => 'vision',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                        'image_content' => null
                    ],
                    [
                        "column" => 'mission',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                        'image_content' => null
                    ],
                    [
                        "column" => 'about-us',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "To empower Indonesia medical students in order to create a healthier, more secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally healthier lives for a healthier world.",
                        'image_content' => null
                    ],
                    [
                        "column" => 'quote',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "Lack of activity destroys the good condition of every human being",
                        'image_content' => null
                    ],
                    [
                        "column" => 'quote-author',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "Plato",
                        'image_content' => null
                    ],
                ],
                'contact' => null,
            ],
            [
                "name" => 'About Us',
                "uri" => '',
                'contents' => [
                    [
                        "column" => 'description',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "Center for Indonesian Medical Students’ Activities is a non-profit, non- government, and non-politic organization facilitating medical students of Indonesia who intend to make great impacts on our nation’s health with activity-based projects. CIMSA empowers medical students of Indonesia to play their major role in health promotion and prevention as a step to improve nation’s health. Also, CIMSA prepares all medical students of Indonesia to increase their capacity in medical fields as future health professionals. CIMSA was officially established in May, 6th 2001 and currently maintains 27 locals throughout Indonesia with over 8000 members. Since 2002, CIMSA has been affiliated with International Federation of Medical Students’ Association (IFMSA), which is recognized by World Health Organization as the biggest international forum for medical students.",
                        'image_content' => null
                    ],
                ],
                'contact' => null
            ],
            [
                "name" => 'Contact Us',
                "uri" => 'contact-us',
                'contents' => [
                    [
                        "column" => 'description',
                        "type" => 'text',
                        'group' => null,
                        'text_content' => "Ever-expanding efforts, CIMSA UGM is always looking for opportunities to collaborate and make greater impacts.",
                        'image_content' => null
                    ],

                ],
                'contact' => [
                    "image" => null,
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
                $page_model->uri = $page['uri'];

                $page_model->save();

                foreach ($page['contents'] as $page_content) {

                    $page_model->contents()->create([
                        'column' => $page_content['column'],
                        'type' => $page_content['type'],
                        'group' => $page_content['group'],
                        'text_content' => $page_content['text_content'],
                        'image_content' => $page_content['image_content']
                    ]);
                }

                if ($page['contact']) {

                    $page_model->contact()->create([
                        'image' => $page['contact']['image'],
                        'name' => $page['contact']['name'],
                        'ocupation' => $page['contact']['ocupation'],
                        'email' => $page['contact']['email'],
                        'phone' => $page['contact']['phone'],
                        'start_year' => $page['contact']['start_year'],
                        'end_year' => $page['contact']['end_year'],
                    ]);
                }

                echo  $page['name'] . " Page created\n";
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            echo $th->getMessage();
        }
    }
}
