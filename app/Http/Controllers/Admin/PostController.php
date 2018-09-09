<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Modles\Comment;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->paginate(20);
        
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all()->pluck('name', 'id')->toArray();
         $tags = Tag::all()->pluck('name', 'id')->toArray();

        
        return view('admin.post.create', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       $params = $request->all();
        
        $params['slug'] = str_slug($params['title']);
        $params['user_id'] = auth()->user()->id;
        $params['published_from'] = Carbon::parse($params['published_from']);


        $params['image'] = $this->uploadImageAndReturnName();

        $post = Post::create($params);
        
        //sync tags with post
        $params['tags_id'] = $this->createTagsIfNeeded($params['tags_id']);
        
        $post->tags()->sync($params['tags_id']);
        
        flash('Post was created successfully!!')->success();

        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $params = $request->all();
        
        $params['slug'] = str_slug($params['title']);
        $params['user_id'] = auth()->user()->id;
        $params['published_from'] = Carbon::parse($params['published_from']);
        
        if($image = $this->uploadImageAndReturnName() ) {
        $params['image'] = $image;
        }
        
        $post->update($params);
        
        //sync tags with post
        $params['tags_id'] = $this->createTagsIfNeeded($params['tags_id']);
        
        $post->tags()->sync($params['tags_id']);
        
        flash('Post was updated successfully!!')->success();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->comments()->delete();
        
        $post->delete();
        
        flash('Post was deleted successfully!!')->success();

        return redirect()->route('posts.index');
    }
    /**
     * upload image and return file name
     * 
     * retun string
     */
    private function uploadImageAndReturnName() {
        
        if(! request()->hasFile('image') ) return false;
        
        $image = request()->file('image');
        
        //image file exists
        $image_name = time() .'.'.$image->getClientOriginalExtension();
        
        $path = 'img/posts/'.$image_name;
        
        Image::make( $image->getRealPath() )->fit(620,400)->save($path);
        
        request()->file('image')->move('img/posts', $image_name);
        
        return $image_name;
    }
    /*
     * create new tag if needed
     * @param Array $tags_id
     * @return Array
     */
    private function createTagsIfNeeded($tags_id){
        
        for ($i = 0; $i< count($tags_id); $i++){
            $tag = $tags_id[$i];
            
            if( ! is_numeric($tag) ){
                $new_tag = Tag::create(['name'=>$tag, 'slug'=> str_slug($tag)]);
                $tags_id[$i] = $new_tag->id;
            }
        }
        return $tags_id;
    }
}
