<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function beranda()
    {
        $role = Auth::user()->level;
        return view('dashboard', compact('role'));
    }
}