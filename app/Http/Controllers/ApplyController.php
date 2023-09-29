<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;

// # Verb       # URI                   # Action   # Route Name
// GET          /resources              index      resources.index
// GET          /resources/create       create     resources.create
// POST         /resources              store      resources.store
// GET          /resources/{id}         show       resources.show
// GET          /resources/{id}/edit    edit       resources.edit
// PUT/PATCH    /resources/{id}         update     resources.update
// DELETE       /resources/{id}         destroy    resources.destroy

class ApplyController extends Controller
{
    public function index()
    {
        $applies = Apply::with('position')->where('user_id', auth()->id())->get();

        return view('applies.index')->with('applies', $applies);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'position_id' => 'required',
        ]);

        $apply = Apply::create([
            'status' => 'P',
            ...$validated,
        ]);

        return redirect('/applies/'.$apply->id);
    }

    public function show(string $id)
    {
        $apply = Apply::with('position')->findOrFail($id);

        // return view('applies.show')->with('apply', $apply);
        return redirect('/positions/'.$apply->position_id);
    }
}
