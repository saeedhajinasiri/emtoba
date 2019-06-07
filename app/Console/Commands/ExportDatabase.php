<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the database in a file with download it';

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
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');

        $ts = time();
        $path = database_path() . $ds . 'backups' . $ds . date('Y', $ts) . $ds . date('m', $ts) . $ds . date('d', $ts) . $ds;
        $file = date('Y-m-d', $ts) . '-dump-' . $database . '.sql';
        $command = "mysqldump -h {$host} -u {$username} {$database} > {$path}{$file} --ignore-table={$database}.users --ignore-table={$database}.role_user --ignore-table={$database}.roles --ignore-table={$database}.permission_role --ignore-table={$database}.permissions";
        // $command = sprintf('mysqldump -h %s -u %s -p\'%s\' %s > %s', $host, $username, $password, $database, $path . $file);

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        exec($command);
    }
}
