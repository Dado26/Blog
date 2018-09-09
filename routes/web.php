<?php

/*
 * front
 */
Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/category/{category}', 'Front\HomeController@category')->name('category');
Route::get('/about', 'Front\StaticPageController@about')->name('about');

Route::group(['prefix'=>'post', 'namespace'=>'Front'],function(){
    Route::get('/{post}', 'PostController@show')->name('post');
    
Route::group(['middleware'=>'auth'],function(){  
    Route::post('/{post}/comment', 'PostController@addComment')->name('add_comment');
    Route::delete('/comment', 'PostController@deleteComment')->name('delete_comment');
});
});

// contact
Route::get('contact', 'Front\ContactController@showForm')->name('contact');
Route::post('contact', 'Front\ContactController@sendEmailAttempt')->name('send_contact_email_attempt');





//Usser auth

Route::get('sign-in', 'Front\AuthController@SignInForm')->name('sign_in_form');

Route::post('sign-in', 'Front\AuthController@SignInAttempt')->name('sign_in_attempt');

Route::get('sign_up', 'Front\AuthController@SignUpForm')->name('sign_up_form');

Route::post('sign-up', 'Front\AuthController@SignUpAttempt')->name('sign_up_attempt');

Route::get('sign-out','Front\AuthController@signOut')->name('sign_out');

/*
 * Admin
 */
Route::group(['prefix'=>'admin', 'namespace'=>'Admin'],function(){
    Route::get('/','AuthController@signInForm')->name('admin.sign_in_form');
    Route::post('/','AuthController@signInAttempt')->name('admin.sign_in_attempt');
    
    Route::group(['middleware'=>'auth.admin'], function(){
        
    Route::get('sign-out','AuthController@signOut')->name('admin.sign_out');
    
    Route::get('posts','PostController@index')->name('posts.index');
    
    Route::resource('categories','CategoryController', ['except'=>['show']]);    
    Route::resource('users','UserController', ['except'=>['show']]);   
    Route::resource('comments','CommentController', ['except'=>['show','create','store']]);
    Route::resource('posts','PostController', ['except'=>['show']]);



     });
});
