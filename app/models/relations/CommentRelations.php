<?php

namespace App\Models\Relations;

use App\Models\User;
use App\Models\Post;


trait CommentRelations
{
 /**
 * each comment belongs to a user(author)
 *
 */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     /**
 * each comment belongs to a post
 *
 */
        public function post()
    {
        return $this->belongsTo(Post::class);
    }
}