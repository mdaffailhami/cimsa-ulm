<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class GenerateDummyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $seeders = [
            'OfficialSeeder',
            'CommitteSeeder',
            'ProgramSeeder',
            'TrainingSeeder',
            'PageSeeder',
            'SocialMediaSeeder',
            'PostSeeder',
        ];

        Schema::disableForeignKeyConstraints();

        foreach ($seeders as $seeder) {
            $this->info("Seeding: $seeder");
            Artisan::call("db:seed", ['--class' => $seeder]);
        }

        Schema::enableForeignKeyConstraints();

        $this->info("✅ Dummy data has been generated successfully.");
    }
}
