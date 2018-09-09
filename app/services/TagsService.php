<?php


namespace App\Services;

use App\Models\Tag;

class TagsService{
    /**
     * return tags that are used in posts
     * 
     * @return Collection
     */
 
 public function get()
    {
        return Tag::has('posts')->get();
    }
    
}