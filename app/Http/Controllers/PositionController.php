<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// # Verb       # URI                   # Action   # Route Name
// GET          /positions                 index      positions.index
// GET          /positions/create          create     positions.create
// POST         /positions                 store      positions.store
// GET          /positions/{photo}         show       positions.show
// GET          /positions/{photo}/edit    edit       positions.edit
// PUT/PATCH    /positions/{photo}         update     positions.update
// DELETE       /positions/{photo}         destroy    positions.destroy

class PositionController extends Controller
{
    public function index()
    {
        $biz = Auth::user()?->biz;
        $positions = $biz ? Auth::user()->biz->positions : Position::all();
        return view('positions.index', ['positions' => $positions, 'isBiz' => !!$biz]);
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
            'salary_rate' => 'required',
            'hire_count' => 'required',
            'employment_type' => 'required',
        ]);

        $bizID = Auth::user()->biz->id;
        $position = Position::create([
            'biz_id' => $bizID,
            'status' => 'A',
            ...$validated,
        ]);

        return $position;
    }

    public function destroy(string $id)
    {
        Position::find($id)->update(['status' => 'X']);
        return redirect('/');
    }
}
