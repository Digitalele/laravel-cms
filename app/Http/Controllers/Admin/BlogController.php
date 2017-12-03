<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;


class BlogController extends AdminController
{
    protected $limit = 5;
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path('img');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'author')->latest()->paginate($this->limit);
        $postCount = Post::count();
        return view("admin.blog.index", compact('posts', 'postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {   
        $post = new Post();
        return view('admin.blog.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        // $this->validate($request, [
        //     'title'       => 'required',
        //     'slug'        => 'required|unique:posts',
        //     'body'        => 'required',
        //     'published_at'=> 'date_format:Y-m-d',
        //     'category_id' => 'required'
        // ]);
        
        //hanlde file 
        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);

        return redirect('/admin/blog')->with('message', 'Your post was created successfully!');
    }

    
    private function handleRequest($request)
    {
        $data = $request->all();

        if($request->hasFile('image'));
        {
            $image       = $request->file('image');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination, $fileName);

            $data['image'] = $fileName;
        }
        return $data;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
