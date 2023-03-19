<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biz;
use App\Services\SaigonService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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

    public function biz(Request $request)
    {
        $biz = Biz::with('reviews')->find($request->query('id'));
        return view('legacy/biz', [
            'biz' => $biz,
            'avg_rating' => $biz->averageRating(),
            'reviews' => $biz->reviews->take(2),
        ]);
    }

    public function register()
    {
        return view('legacy/register')->with(['districts' => SaigonService::DISTRICTS['district']]);
    }

    /**
     * API Calls
     */
    public function biz_search(Request $request, string $query = null)
    {
        $results = Biz::where('name', 'LIKE', "%$query%")->get();
        return view('biz/index', ['bizs' => $results]);
    }
}
