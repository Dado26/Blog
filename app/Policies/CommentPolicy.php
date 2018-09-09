<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;
    /**
     * if admin is the user
     * than allow every policy
     * 
     * 
     * @return
     */
    
    public function before()
{
    if (auth()->user()->isAdmin()) {
        return true;
    }
}
    
    /**
     * check if user can delete comment
     * @return boollean
     */

    public function delete(User $user, Comment $comment)
            {
        return $user->id == $comment->user_id;
            }
}
