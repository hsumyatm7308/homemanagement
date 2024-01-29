<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailycostsController extends Controller
{
    //
    public function index()
    {
        return view('dailycosts.index');
    }

    public function create()
    {
        return view('dailycosts.create');
    }
}
