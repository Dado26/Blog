<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CommentRelations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use CommentRelations, SoftDeletes;
    
    protected $fillable = ['post_id','user_id','content'];
    
    //const UPDATED_AT = null;
}
