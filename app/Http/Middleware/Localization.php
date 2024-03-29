<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Session::has('locale')) {
                Log::debug('SETTING LOCALE FROM SESSION - '.Session::get('locale'));
                App::setLocale(Session::get('locale'));
            } else {
                $availableLocales = config('app.available_locales');
                $locale = $request->getPreferredLanguage($availableLocales);

                Log::debug('BROWSER HEADER - '.$request->server('HTTP_ACCEPT_LANGUAGE'));
                Log::debug('>>>> PREFFERED LANGUAGE - '.$locale);

                Session::put('locale', $locale);
                App::setLocale($locale);
            }
        } catch (Exception $e) {
            // Some kind of error happened but lets just ignore it for now
            Log::debug('>>>> LOCALIZATION ERROR - '.$e->getMessage());
        }

        return $next($request);
    }
}
