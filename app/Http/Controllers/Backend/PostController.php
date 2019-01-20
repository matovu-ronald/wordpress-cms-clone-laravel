<?php

namespace App\Http\Controllers\Backend;

use Alert;
use Image;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends BackendController
{
    protected $limit = 4;

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
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        if (($status = $request->get('status')) && $status == 'trash')
        {
            $posts = Post::onlyTrashed()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;

        }
        elseif ($status == 'published')
        {
            $posts = Post::published()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::published()->count();
        }
        elseif ($status == 'scheduled')
        {
            $posts = Post::scheduled()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::scheduled()->count();
        }
        elseif ($status == 'draft')
        {
            $posts = Post::draft()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::draft()->count();
        }
        else {
            $posts = Post::with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::count();

        }

        $statusList = $this->statusList();

        return view('backend.blog.index', compact('posts', 'postCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList()
    {
        return [
            'all' => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft' => Post::draft()->count(),
            'trash' => Post::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('backend.blog.create', compact('post'));
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

        return redirect('/backend/blog')->with('message', 'Your post was created successfully!');
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
        $post = Post::findOrFail($id);

        //Get old image
        $oldImage = $post->image;

        $data = $this->handleRequest($request);
        $post->update($data);

        if ($oldImage !== $post->image) {
            $this->removeImage($oldImage);
        }
         
        Alert::success('Post Edited successfully')->flash();

        return redirect('/backend/blog')->with('message', 'Your post was updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();

        return redirect('/backend/blog')->with('trash-message', ['Post has been trashed successfully', $id]);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect('/backend/blog')->with('message', 'Your post has been moved from the trash');
    }

    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        // Remove image from the server
        $this->removeImage($post->image);

        return redirect('/backend/blog/?status=trash')->with('message', 'Post has been permanently deleted');
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

    private function removeImage($image)
    {
        if ( ! empty($image) )
        {
            $imagePath     = $this->uploadPath . '/' . $image;
            $ext           = substr(strrchr($image, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if ( file_exists($imagePath) ) unlink($imagePath);
            if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
        }
    }
}
