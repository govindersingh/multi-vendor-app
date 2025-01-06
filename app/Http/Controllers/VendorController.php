<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;

class VendorController extends Controller
{
    public function index(){
        $vendors = User::role();
        dd($vendors);
        return view('pages.clients.index', compact(
            'vendors'
        ));
    }
}
