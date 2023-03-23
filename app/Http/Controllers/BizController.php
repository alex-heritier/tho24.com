<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biz;
use App\Models\DTO\BizCalendar;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class BizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bizs = Biz::all();
        if (request()->ajax()) {
            return view('biz/partial/index')->with('bizs', $bizs);
        } else {
            return view('biz/index')->with(['bizs' => $bizs]);
        }
    }

    public function show(int $id)
    {
        $biz = Biz::with('reviews')->find($id);
        $calendar = (new BizCalendar())->getCalendarGrid();
        return view('legacy/biz', [
            'biz' => $biz,
            'avg_rating' => $biz->averageRating(),
            'total_review_count' => count($biz->reviews),
            'reviews' => $biz->reviews->take(2),
            'calendar' => $calendar
        ]);
    }
}
