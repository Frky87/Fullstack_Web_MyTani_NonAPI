<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    // Menampilkan halaman profil
    public function showProfile()
    {
        $user = auth()->user(); // Mengambil user yang sedang login
        return view('user.profileUser.profileUser', compact('user'));
    }

    // Mengupdate data profil user
    public function updateProfile(Request $request)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Ambil user yang sedang login
        $user = auth()->user();

        // Update data user
        $user->update([
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}
