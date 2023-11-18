<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateTestingDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'db:testing';

    /**
     * The console command description.
     */
    protected $description = 'Create database for testing purposes';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            DB::statement('CREATE DATABASE testing');
        } catch (\Exception $e) {
            $this->error('Database already exists!');

            return 0;
        }

        $this->info('Database created successfully!');

        return 0;
    }
}
