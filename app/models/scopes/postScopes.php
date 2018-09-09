<?php

namespace App\Models\Scopes;

use Carbon\Carbon;

trait PostScopes
{
    /**
     * limit results only to published posts

     */
     public function scopePublished($query)
            {
        return $query->where(function($query){
                    $query->where('published_from', '<' , Carbon::now() );
                    $query->orWhereNull('published_from');
                });
}

  /**
     * filter results by month and year and tag
   * used for archives
    *@param array $filters
  */
     public function scopeFilter($query, $filters)
            {
         
         if($month = $filters['month']){
             $query->whereMonth('created_at', Carbon::parse($month)-> month);
         }
      
          if($year = $filters['year']){
             $query->whereYear('created_at', $year);
         }
         
           if($tag = $filters['tag']){
             $query->whereHas('tags', function($query) use ($tag){
                 $query->where('slug', $tag);
             });
         }
         
}

}