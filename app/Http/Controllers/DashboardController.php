<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //




    function view(Request $request) {
        $nama = $request->nama;
        return view('dashboard', compact('nama'));
    }
}
