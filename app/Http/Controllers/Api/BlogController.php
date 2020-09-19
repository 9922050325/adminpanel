<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

   public function index()
   {
        return view('blog.blog');
   }

   public function insertBlog()
   {
        return view('blog.insertBlog');
   }

   public function createBlog()
   {

   }
}
