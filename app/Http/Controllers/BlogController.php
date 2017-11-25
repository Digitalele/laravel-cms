<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Call the controller class method
use App\Post;

class BlogController extends Controller
{
		protected $limit = 3;
		
    public function index()
    {
    		//use latest instead that is a method from laravel
    		$posts = Post::with('author')->latestFirst()->simplePaginate(3);
				return view("blog.index", compact('posts'));
    }
}
