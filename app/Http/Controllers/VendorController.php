<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Enums\UserType;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    public function index(){
        //-Check permission.
        if(auth()->user()->role_id != UserType::VENDOR->value){
            notify()->preset('access-denied');
            return redirect()->route('dashboard');
        }
        
        return view('pages.vendor.index');
    }
}
