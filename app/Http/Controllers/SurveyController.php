<?php

namespace App\Http\Controllers;

class SurveyController extends Controller
{
    public function show(string $slug)
    {
        return view('static.survey.' . $slug);
    }
}
