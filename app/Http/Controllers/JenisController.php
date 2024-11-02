<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function jenis(){
        return view('admin.jenis');
    }
}
