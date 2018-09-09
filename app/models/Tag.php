<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\TagRelations;

class Tag extends Model
{
    use TagRelations;
    
    protected $fillable=['name', 'slug'];
}
