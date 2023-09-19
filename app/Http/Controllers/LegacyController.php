<?php

namespace App\Http\Controllers;

use App\Services\BizService;
use App\Services\MoneyService;
use App\Services\SaigonService;
use App\Services\TradeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

        // Add 'all' fields
        array_unshift(
            $districts,
            ['code' => '@all', 'name' => 'HCMC'],
            null,
        );
        $trades = ['@all' => 'All'] + [null => ''] + $trades;

        return view('legacy/index')->with(['bizs' => $bizs, 'districts' => $districts, 'trades' => $trades]);
    }

    public function account()
    {
        return view('legacy/account');
    }

    public function biz(Request $request)
    {
        $id = $request->query('id');

        return redirect('/biz/'.$id);
    }

    public function register(MoneyService $moneyService)
    {
        $districts = SaigonService::DISTRICTS['district'];
        $trades = TradeService::TRADES;
        $currencySymbol = $moneyService->getLocaleCurrencySymbol();

        return view('legacy/register')->with([
            'districts' => $districts,
            'trades' => $trades,
            'currency_symbol' => $currencySymbol,
        ]);
    }

    public function index2()
    {
        return view('legacy/index2');
    }

    /**
     * API Calls
     */
    public function bizSearch(Request $result, BizService $bizService)
    {
        $district = $result->query('district');
        $trade = $result->query('trade');
        $query = $result->query('query');
        $results = $bizService->search(district: $district, trade: $trade, query: $query)->get();

        // return view('biz/index', ['bizs' => $results]);
        $view = View::make('biz.partial.show');

        return implode('', $results->map(fn ($el) => $view->with(['biz' => $el])->render())->toArray());
    }
}
