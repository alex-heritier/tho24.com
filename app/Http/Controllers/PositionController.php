<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// # Verb       # URI                   # Action   # Route Name
// GET          /positions              index      positions.index
// GET          /positions/create       create     positions.create
// POST         /positions              store      positions.store
// GET          /positions/{id}         show       positions.show
// GET          /positions/{id}/edit    edit       positions.edit
// PUT/PATCH    /positions/{id}         update     positions.update
// DELETE       /positions/{id}         destroy    positions.destroy

class PositionController extends Controller
{
    public function index()
    {
        $biz = Auth::user()?->biz;
        $positions = $biz ? Auth::user()->biz->positions : Position::all();

        return view('positions.index', ['positions' => $positions, 'isBiz' => (bool) $biz]);
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
            'min_salary' => 'required|integer|min:0',
            'max_salary' => 'required|integer|min:0',
            'salary_rate' => 'required',
            'hire_count' => 'required',
            'employment_type' => 'required',
        ]);
        $validated['min_salary'] = 100 * (int) $validated['min_salary'];
        $validated['max_salary'] = 100 * (int) $validated['max_salary'];

        $bizID = Auth::user()->biz->id;
        $position = Position::create([
            'biz_id' => $bizID,
            'status' => 'A',
            ...$validated,
        ]);

        // return $position;
        return redirect('/positions');
    }

    public function show(string $id)
    {
        $biz = Auth::user()?->biz;
        $position = Position::with(['biz', 'myApplies'])->findOrFail($id);

        return view('positions.show', ['position' => $position, 'isBiz' => $position?->biz->id === $biz?->id]);
    }

    public function destroy(string $id)
    {
        Position::find($id)->update(['status' => 'X']);

        return redirect('/');
    }
}
