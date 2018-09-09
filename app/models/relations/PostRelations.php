<?php

namespace App\Models\Relations;

use App\Models\User;

use App\Models\Tag;

use App\Models\Comment;

use App\Models\Category;


trait PostRelations
{
/**
 * every post belongs to a user (publisher/creator)
 */    
     public function user()
            {
        return $this->belongsTo(User::class);
            }

            /**
 * every post has many tags()
 */    
     public function tags()
            {
        return $this->belongsToMany(Tag::class);
            }
            
            /**
 * every post has many comments
 */               
        public function comments()
            {
        return $this->hasMany(Comment::class);
            }
                    
                       /**
 * every post has one category()
 */    
        public function category()
            {
        return $this->belongsTo(Category::class);
            }
            
            }

