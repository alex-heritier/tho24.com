<?php

namespace App\Console\Commands;

use App\Services\SaigonService;
use Illuminate\Console\Command;

class BuildJsonToArray extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:build-json-to-array';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $data = SaigonService::DISTRICTS;
        $res = var_export($data, true);
        echo file_put_contents('yolo', $res);
    }
}
