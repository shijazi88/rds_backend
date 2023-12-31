<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:truncate-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $signature = 'db:truncate {tables* : The names of the tables to truncate}';
    protected $description = 'Truncate specified database tables';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tables = $this->argument('tables');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
            $this->info("Table $table truncated successfully.");
        }

        $this->info('All specified tables have been truncated.');
    }
}
