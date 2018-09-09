<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\UserRelations;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, UserRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     Mutator for password
    */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
     public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucfirst($value);
    }
    
    /**
     * return users full name
     */
    
    public function getFullName()
    {
        return $this->first_name .' '.$this->last_name;
    }
    /**
     * Check users role
     * @param string $roles
     * @return boolean
     */
    public function isAdmin()
            {
        return $this->role_id == 1;
        }
    
}
