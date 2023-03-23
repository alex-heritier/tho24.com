<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BizService;
use App\Services\MoneyService;
use App\Services\SaigonService;

class LegacyController extends Controller
{
    /**
     * HTML Pages
     */
    public function home(BizService $bizService)
    {
        $bizs = $bizService->search()->get();
        $districts = SaigonService::DISTRICTS['district'];
        array_unshift(
            $districts,
            ['code' => 'anywhere', 'name' => 'HCMC'],
            null,
        );
        return view('legacy/index')->with(['bizs' => $bizs, 'districts' => $districts]);
    }

    public function account()
    {
        return view('legacy/account');
    }

    public function biz(Request $request)
    {
        $id = $request->query('id');
        return redirect('/biz/' . $id);
        // $biz = Biz::with('reviews')->find($request->query('id'));
        // return view('legacy/biz', [
        //     'biz' => $biz,
        //     'avg_rating' => $biz->averageRating(),
        //     'reviews' => $biz->reviews->take(2),
        // ]);
    }

    public function register(MoneyService $moneyService)
    {
        $districts = SaigonService::DISTRICTS['district'];
        $currencySymbol = $moneyService->getLocaleCurrencySymbol();
        return view('legacy/register')->with(['districts' => $districts, 'currency_symbol' => $currencySymbol]);
    }

    /**
     * API Calls
     */
    public function biz_search(BizService $bizService, string $district, string $query = null)
    {
        $results = $bizService->search(district: $district, query: $query);
        return view('biz/index', ['bizs' => $results->get()]);
    }
}
