<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkInProgressController extends Controller
{
    public function index($pageType = 'page')
    {
        return view('work-in-progress', compact('pageType'));
    }
}
