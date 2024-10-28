<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('pages.admin.dashboard', [
            'blogs' => Blog::latest()->search(request('search'))->paginate(7)
        ]);
    }
}
