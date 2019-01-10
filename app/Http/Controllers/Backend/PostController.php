<?php

namespace App\Http\Controllers\Backend;

use Alert;
use Image;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends BackendController
{
    protected $limit = 10;

    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();

        $this->uploadPath =  public_path(config('cms.image.directory'));
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
        return view('backend.blog.index', compact('posts', 'postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);

        Alert::success('Post created successfully')->flash();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = findOrFail($id);
        $data = $this->handleRequest($request);
        $post->update($data);
        Alert::success('Post Edited successfully')->flash();
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {

            //Set Image variable with the image file from the request
            $image = $request->file('image');

            //Get Name of the Uploaded file
            $fileName = $image->getClientOriginalName();
             
            //Set Destination Path  
            $destination = $this->uploadPath;

            //Set successUploaded variable for the image 
            $successUploaded = $image->move($destination, $fileName);

            //Check if the image is succesfully uploaded before resizing
            if ($successUploaded) {

                //Get File Extension and generation thumbnail name
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                //Set Size for image using configuration values
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');

                //Resize image using intervention image package
                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            $data['image'] = $fileName;
        }

        return $data;
    }
}
