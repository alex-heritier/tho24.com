<?php

namespace App\Services;

use App\Models\Biz;
use Illuminate\Database\Eloquent\Builder;

class BizService
{
    const ALL = '@all';

    public function search(string $district = self::ALL, string $trade = null, string $query = null): Builder
    {
        $results = $district === self::ALL ? Biz::where([]) : Biz::where('district', $district);
        if ($trade) {
            $results = $trade === self::ALL ? $results : $results->where('trade', $trade);
        }
        if ($query) {
            $results = $results->where(function ($builder) use ($query) {
                return $builder
                    ->where('name', 'LIKE', "$query%")
                    ->orWhere('phone', 'LIKE', "$query%");
            });
        }
        return $results->limit(5);
    }
}
