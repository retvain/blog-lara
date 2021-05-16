<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class TestScopeController extends Controller
{
    public function index()
    {
        $result = BlogPost::UserId('1')->get();

        dd(__METHOD__, $result);
    }
}
