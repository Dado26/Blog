<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use App\Models\User;

class PostController extends Controller
{
     /*
             * show selected post
             * @param Post $post
             * @return view
             */
            
            public function show(Post $post)
            {
                
                $user = Auth::user();
                return view('front.post', compact('post', 'user'));
            }
            /**
             * add new comment to post
             * @param POst $post
             * @param Request $request
             */
            public function addComment(Post $post, Request $request) {
                
                $comment = $request->get('comment');
                
                if(! $comment){
                    return ['status'=>'error', 'message'=>'Cannot submit an empty comment'];
                }
                
                $post->comments()->create(['user_id'=>Auth::id(), 'content'=>$comment]);
                
                return ['status'=>'succes'];

            }
            /**
             * delete comment
             * @param Request $request
             * @return json response
             */
            
            public function deleteComment( Request $request)
                    {
                
             
             $comment = Comment::find($request->get('comment_id'));

              $success = $comment->delete();
               
               if($success)  return ['status'=>'success'];
                              
               return ['status'=>'error','message'=>'Failed to delete comment'];
                    }
             /**
                
        $comment = Comment::find($request->get('comment_id'));
              
              if ( ! auth()->user()->can('delete', $comment)) return ['status'=>'error','message'=>'You are not authorized to delete this comment']; 
                  
              $success =  $comment->delete();
                
                if($success) return ['status'=>'success'];
                
                return ['status'=>'error','message'=>'Failed to delete comment'];
                    }
                */
            
}
