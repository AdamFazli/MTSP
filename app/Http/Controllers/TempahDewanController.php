<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempahDewanController extends Controller
{
    public function index()
    {
        return view('tempahDewan.index'); // Make sure this view exists
    }
}
