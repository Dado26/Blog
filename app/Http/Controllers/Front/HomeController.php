<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
            {
       // $posts = Post::all(); ovako nije bolje zbog puno queries
        // $posts = Post::with(['user'])->get() ovako uzima odmah i usera...
        
        /*
Ovako može bez pravljenja filtera i scopa
  if($month = request('month'){
         $posts->whereMonth('created_at', Carbon::parse($month)->month);})
  
   if($year = request('year'){
         $posts->whereYear('created_at', $year);})       

        filter posts by published and (month, year, tag)
                  */
        
        $posts = Post::published()
                ->filter(request(['month','year','tag']))
                ->latest()
                ->with(['user'])
                ->paginate(5);
        
        
        return view('front.homepage', compact('posts'));
            }
            
           
            /*
             * filter posts by category
             */
            public function category(Category $category) 
                    {
        $posts = Post::published()
                ->where('category_id', $category->id)        
                ->latest()
                ->with(['user'])
                ->paginate(5);
                
                return view ('front.homepage', compact('posts'));
            }
}
