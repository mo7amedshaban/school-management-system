<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function test()
    {
        return view('test_pg');
    }
}
