<?php


namespace App\Models\Relations;

use App\Models\Post;

trait TagRelations
{
            /**
 * every tags has many posts()
 */    
     public function posts()
            {
        return $this->belongsToMany(Post::class);
            }
            
            }