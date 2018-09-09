<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\PostRelations;
use App\Models\Scopes\PostScopes;

class Post extends Model
{
    use PostRelations, PostScopes, SoftDeletes;
    
    protected $fillable=['user_id', 'category_id', 'slug', 'title', 'content', 'image', 'published_from','created_at'];
    
    protected $dates = ['published_from'];
}
