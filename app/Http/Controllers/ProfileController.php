<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('profile.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'allowed_ratings' => ['required', 'array'],
            'allowed_ratings.*' => ['string'],
        ]);

        $user = Auth::user();
        $user->update([
            'allowed_ratings' => $validated['allowed_ratings'],
            'updated_at' => $user->updated_at,
        ]);

        return redirect()
            ->route('settings.edit')
            ->with('success', 'Your content preferences have been successfully updated.');
    }
}