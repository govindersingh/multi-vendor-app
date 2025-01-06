<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('dashboard');
    }
}
