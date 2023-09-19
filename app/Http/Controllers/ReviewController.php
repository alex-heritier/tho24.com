<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate
        try {
            // Validate request data
            $request->validate([
                'biz_id' => ['required'],
                'review_text' => ['required'],
                'rating' => ['required'],
            ]);

            // Validate session id
            if (! $request->session()->has('my.id')) {
                throw new Exception('Session ID does not exist');
            }

            // Validate session id
            if ($request->input('rating') < 1 || $request->input('rating') >= 5) {
                throw new Exception('Rating is out of bounds');
            }
        } catch (Exception $e) {
            Log::error('Failed validation: '.$e->getMessage());

            return redirect()->back()->withErrors(['review' => 'Missing data']);
        }

        // Create
        try {
            $review = Review::create([
                'user_id' => session('my.id'),
                'biz_id' => $request->input('biz_id'),
                'message' => $request->input('review_text'),
                'rating' => $request->input('rating'),
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create review: '.$e->getMessage());

            return redirect()->back()->withErrors(['review' => 'Failed to create review']);
        }

        return redirect()->back();
    }
}
