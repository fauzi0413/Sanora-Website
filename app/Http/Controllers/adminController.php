<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    function index()
    {
        return view('admin');
    }

    function author()
    {
        return view('author');
    }
}
