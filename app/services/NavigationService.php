<?php

namespace App\Services;

use App\Models\Category;
use Cache;

class NavigationService{
    /**
     * return all gategories from database
     * @return Collection
     */
    public function getCategories()
    {
        return Cache::remember('navigation.categories', 180, function(){
            return Category::all();
        });
    }
}


