<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Services\SaigonService;

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
