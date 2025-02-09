<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reseting Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Cleaning storage');
        cleanStorage('app/public');

        $this->info('Reseting Data');

        Artisan::call('db:seed', [
            '--class' => "CleanDataSeeder",
        ]);

        $this->info("Reset Data Successfull");
    }
}
