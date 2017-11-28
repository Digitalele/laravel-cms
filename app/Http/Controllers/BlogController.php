<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Call the controller class method
use App\Post;
use App\Category;

class BlogController extends Controller
{
	protected $limit = 3;

		
    public function index()
    {
        $categories = Category::with(['posts' => function($query) {
                $query->published();
        }])->orderBy('title', 'asc')->get();

		//use latest instead that is a method from laravel
		$posts = Post::with('author')
								->latestFirst()
								->published()
								->simplePaginate($this->limit);
		return view("blog.index", compact('posts', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::with(['posts' => function($query) {
                $query->published();
        }])->orderBy('title', 'asc')->get();

        //use latest instead that is a method from laravel
        $posts = Post::with('author')
                                ->latestFirst()
                                ->published()
                                ->where('category_id', $id)
                                ->simplePaginate($this->limit);
        return view("blog.index", compact('posts', 'categories'));
    }


    public function show(Post $post)
    {
    	//find post by id 
    	//we can also inject the model like function parameter above
		return view("blog.show", compact('post', 'categories'));
    }
}

//compact for passing data from controller to view