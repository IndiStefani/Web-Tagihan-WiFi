<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        return view('profile.edit', compact('user'));
    }


    /**
     * Update the profile for the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!\Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }

        auth()->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->with('password_status', 'Password berhasil diperbarui!');
    }
}
