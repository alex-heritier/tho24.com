<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BizService;
use App\Services\MoneyService;
use App\Services\SaigonService;
use App\Services\TradeService;

class LegacyController extends Controller
{
    /**
     * HTML Pages
     */
    public function home(BizService $bizService)
    {
        $bizs = $bizService->search()->get();
        $districts = SaigonService::DISTRICTS['district'];
        $trades = TradeService::TRADES;
        array_unshift(
            $districts,
            ['code' => 'anywhere', 'name' => 'HCMC'],
            null,
        );
        return view('legacy/index')->with(['bizs' => $bizs, 'districts' => $districts, 'trades' => $trades]);
    }

    public function account()
    {
        return view('legacy/account');
    }

    public function biz(Request $request)
    {
        $id = $request->query('id');
        return redirect('/biz/' . $id);
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
    public function bizSearch(Request $result, BizService $bizService)
    {
        $district = $result->query('district');
        $trade = $result->query('trade');
        $query = $result->query('query');
        $results = $bizService->search(district: $district, trade: $trade, query: $query);
        return view('biz/index', ['bizs' => $results->get()]);
    }
}
