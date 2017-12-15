<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Intervention\Image\Facades\Image;


class BlogController extends AdminController
{
    protected $limit = 5;
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms_config.image.directory'));
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

            $successUploaded = $image->move($destination, $fileName);

            //thumbnail
            if($successUploaded) 
            {
                $width     = config('cms_config.image.thumbnail.width');
                $height    = config('cms_config.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $fileName)
                        ->resize($width, $height)
                        ->save($destination . '/' . $thumbnail);

            }

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
        $post = Post::findOrFail($id);
        return view("admin.blog.edit", compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post     = Post::findOrFail($id);
        $data     = $this->handleRequest($request);
        $post->update($data);

        return redirect('/admin/blog')->with('message', 'Your post was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect('/admin/blog')->with('trash-message', ['Your post moved to trash', $id]);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect('/admin/blog')->with('message', 'You post has been moved from the trash!');

    }
}
