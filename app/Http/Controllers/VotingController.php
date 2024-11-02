<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function voting()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();
        
        // Mengirim data user ke view voting
        return view('voting', compact('user'));
    }
}