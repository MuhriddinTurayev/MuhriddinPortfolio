<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   Post YARATIS 1-USUL


        // $newPost = new Post;
        // $newPost->title = 'new post';
        // $newPost->short_content = 'new post short content';
        // $newPost->content = 'new post content';
        // $newPost->photos = '/storage/new_post.png';
 
        // $newPost->save();


       //   Post YARATIS 1-USUL

        // $newPost = Post::create([
        //     'title' => '6',
        //     'short_content' => 'nfew post content',
        //     'content' => 'new posft content',
        //     'photos' => '/storagef/new_post.png',
        // ]);

    // update 1-Usuli   

        // $post = Post::find(4)->update(['title'=> "O'zgartirilgan sarlavha2"]); 

          // update 2-Usuli   

        // $post = Post::find(4);
        //  $post->title = "O'zgartirilgan sarlavha";
        //  $post->save();


        // delete 

        // $post = Post::where('id', 1)->first();
        // $post->delete();
        // return 'success';

        $posts = Post::paginate(10);
        return view('posts.index')->with('posts', $posts);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request);

        // $request->validate([
        //     'title' => 'required|max:255', 
        //     'short_content' => 'required', 
        //     'content' => 'required', 
        // ]);
        if($request->hasfile('photos')){
            $name = $request->file('photos')->getClientOriginalName(); //photo.jpg
            $path = $request->file('photos')->storeAs('post-photos', $name);
        }
      
        
        $post = Post::create([
            'user_id'=>auth()->id(),
            'category_id'=> $request->category_id,
            'title'=> $request->title,        
            'short_content'=> $request->short_content,
            'content'=> $request->content,
            'photos' => $path ?? null,
        ]);
        if(isset($request->tags)){
        foreach ($request->tags as $tag) {
            $post->tags()->attach($tag);
        }
        }

        return redirect()->route('posts.index');
       

        

       //   Post YARATIS 1-USUL

        // $newPost = Post::create([
        //     'title' => '6',
        //     'short_content' => 'nfew post content',
        //     'content' => 'new posft content',
        //     'photos' => '/storagef/new_post.png',
        // ]);

        //   $newPost->save();


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
       return view('posts.show')->with([
        'post' => $post,
        'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
        'tags' => Tag::all(),
        'categories' => Category::all()

    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Gate::authorize('update-post', $post);
        $this->authorize('update', $post);
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        if($request->hasfile('photos')){

            if(isset($post->photos)){
                Storage::delete($post->photos);
            }

            $name = $request->file('photos')->getClientOriginalName(); //photo.jpg
            $path = $request->file('photos')->storeAs('post-photos', $name);
            
        }
        
        $post->update([
            'title'=> $request->title,
            'short_content'=> $request->short_content,
            'content'=> $request->content,
            'photos' => $path ?? $post->photos,
        ]);
        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if(isset($post->photos)){
            Storage::delete($post->photos);
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
