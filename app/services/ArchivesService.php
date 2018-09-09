<?php

namespace App\Services;

use App\Models\Post;

class ArchivesService
{
    public function get()
    {
        /*return post::select(DB::raw('year(created_at) year'))*/
        
        /**
         * get archives by year and month
         * 
         * return collection
         */
        
        return Post::selectRaw('year(created_at) AS year, monthname(created_at) AS month')
                ->groupBy('year','month')
                ->orderByRaw('min(created_at) desc')
                ->get();
    }
}