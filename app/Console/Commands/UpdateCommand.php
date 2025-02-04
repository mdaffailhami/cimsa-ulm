<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating the last commit';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->info('Cleaning storage');
        $this->cleanDirectory();


        $this->info("Regenerating database");
        $this->call('migrate:fresh');
        $this->call('db:seed');

        $this->info("Update finish");
    }

    private function cleanDirectory()
    {
        $storagePath = storage_path('app/public');

        if (File::exists($storagePath)) {
            $directories = File::deleteDirectories($storagePath);
            $this->info("Storage have been cleaned");
        } else {
            $this->warn("Directory 'app/public/' does not exist.");
        }
    }
}
