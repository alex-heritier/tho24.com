<?php

namespace App\Services;

use App\Models\Biz;
use Illuminate\Database\Eloquent\Builder;

class BizService
{
    const ANYWHERE = 'anywhere';

    public function search(string $district = self::ANYWHERE, string $query = null): Builder
    {
        $results = $district === self::ANYWHERE ? Biz::where([]) : Biz::where('district', $district);
        if ($query) {
            $results = $results
                ->where(function ($builder) use ($query) {
                    return $builder
                        ->where('name', 'LIKE', "$query%")
                        ->orWhere('trade', 'LIKE', "$query%");
                });
        }
        return $results->limit(5);
    }
}
