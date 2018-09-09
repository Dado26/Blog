<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->with('role')->paginate(15);
        
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();
        
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\UserRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
       $params = $request->all(); 
        
       $params['password'] = bcrypt($params['password']);
  
       User::create($params);
       
       flash('User was created successfully!!')->success();

       return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();
        
        return view('admin.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $params = $request->all();
        
        if(empty($params['password']) ){
            unset($params['password']);
        }else{
             $params['password'] = bcrypt($params['password']);
        }
        
        $user->update($params);
        
        flash('User was updated successfully!!')->success();

        return redirect()->route('users.index');
    }
    /**
     * remove th specified resource from storage
     * @param Category $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        flash('User was deleted successfully!!')->success();

        return redirect()->route('users.index');
    }

}
