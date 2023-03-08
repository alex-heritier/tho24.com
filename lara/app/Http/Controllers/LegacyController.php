<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biz;
use App\Services\SaigonService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class LegacyController extends Controller
{
    /**
     * HTML Pages
     */
    public function home()
    {
        $bizs = Biz::all();
        return view('legacy/index')->with('bizs', $bizs);
    }

    public function account()
    {
        return view('legacy/account');
    }

    public function biz()
    {
        return view('legacy/biz');
    }

    public function register()
    {
        return view('legacy/register')->with(['districts' => SaigonService::DISTRICTS['district']]);
    }

    /**
     * API Calls
     */
    public function dummy()
    {
        $file = Storage::disk('local')->get('saigon3.json');
        // $filePath = resource_path('json/saigon3.json');
        // $jsonData = File::get($filePath);
        return str_replace(["array(", "array (", "\n", "  ", "),"], ["[", "[", PHP_EOL . "  ", "    ", "],"], var_export(json_decode($file), true));
    }
}
