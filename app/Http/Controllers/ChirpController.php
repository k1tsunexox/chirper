<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $chirps = Chirp::with('user')->latest()->get();

        return view('home', compact('chirps'));
    }

    // ChirpController@store — remove the if/else entirely
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|min:5|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect()->back()->with('success', 'Your chirp has been posted!');
    }

    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|min:5|max:255',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Your chirp has been updated!');
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();

        return redirect('/')->with('success', 'Your chirp has been deleted.');
    }
}
