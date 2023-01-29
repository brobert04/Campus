<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
