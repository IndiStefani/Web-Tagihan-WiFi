<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('profile.show');
    }

    /**
     * Update the profile for the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate and update the user's profile here

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }

    public function edit()
    {
        return view('profile.edit');
    }
}
