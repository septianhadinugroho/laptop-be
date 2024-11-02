<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function history(){
        return view('history');
    }
    // history hal admin
    public function historylaporan(){
        return view('admin.historylaporan');
    }
}
