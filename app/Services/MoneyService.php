<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class MoneyService
{
    const USD  = 'usd';
    const VND  = 'vnd';
    const USD_SYMBOL = '$';
    const VND_SYMBOL = '₫';

    public function getLocaleCurrency(): string
    {
        $locale = Session::get('locale');
        switch ($locale) {
            case 'vi':
                return self::VND;
            default:
            case 'en':
                return self::USD;
        }
    }

    public function getLocaleCurrencySymbol(): string
    {
        $locale = Session::get('locale');
        switch ($locale) {
            case 'vi':
                return self::VND_SYMBOL;
            default:
            case 'en':
                return self::USD_SYMBOL;
        }
    }
}
