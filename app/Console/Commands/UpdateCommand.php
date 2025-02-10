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
        $this->info("Updating database");
        $this->call('migrate');
        $this->call('optimize:clear');

        $this->info("Update finish");
    }
}
