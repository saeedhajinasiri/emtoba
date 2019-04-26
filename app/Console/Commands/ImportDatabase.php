<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:import {--file=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the database from the file that is uploaded';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ds = DIRECTORY_SEPARATOR;
        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $database = env('DB_DATABASE');

        $path = database_path() . $ds . 'backups' . $ds . 'import/';
        $file = $this->option('file');

        $command = sprintf('mysql -h %s -u %s %s < %s', $host, $username, $database, $path . $file);
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        exec($command);
    }
}
