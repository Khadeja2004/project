<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing'); // أو اسم العرض الذي تريد استخدامه للصفحة الرئيسية
    }
    public function sizeshart()
    {
        return view('sizeshart');
    }
    public function socialmedia()
    {
        return view('socialmaedia');
    }
}
