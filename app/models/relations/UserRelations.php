<?php


namespace App\Models\Relations;


use App\Models\Role;

trait UserRelations
{
            /**
 * every user has a role
 */    
     public function role()
            {
        return $this->belongsTo(Role::class);
            }
            
            }