<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function pengguna(){
        return view('admin.pengguna');
    }
}
