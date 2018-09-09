<?php

function  isActive($uri='', $exact_uri = false, $with_class = true, $active_class = 'active')
        {
    $class = ($with_class) ? 'class="'.$active_class.'"' : $active_class;
    
    if($exact_uri){
        if(\Request::is($uri)) return $class;
    }
    else{
        if(\Request::is($uri.'/*') || \Request::is($uri) ) return $class;
    }
    // check home
    if(is_null(\Request::segment(1)) && empty($uri) )return $class;
    return '';
        }