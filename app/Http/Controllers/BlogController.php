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

		//use latest instead that is a method from laravel
		$posts = Post::with('author')
								->latestFirst()
								->published()
								->simplePaginate($this->limit);
		return view("blog.index", compact('posts'));
    }


    public function category(Category $category)
    {
        $categoryName = $category->title;
        
        //route mode binding
        $posts = $category->posts()
                          ->with('author')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit);

        return view("blog.index", compact('posts', 'categoryName'));
    }


    public function show(Post $post)
    {
    	//find post by id 
    	//we can also inject the model like function parameter above
		return view("blog.show", compact('post'));
    }
}

//compact for passing data from controller to view