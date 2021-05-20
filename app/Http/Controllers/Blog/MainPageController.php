<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class MainPageController extends BaseController
{
    public function index ()
    {
        $items = BlogPost::all()->sortByDesc('id');
        return view('Blog.posts.index', compact('items'));
    }
}
