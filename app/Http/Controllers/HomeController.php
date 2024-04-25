<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $session = session()->get('users');
        return view('index', [
            'blogs' => $blogs,
            'session' => $session
        ]);
    }
}
