<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    public static function find($post_name){
        $file_name = resource_path('posts/' . $post_name . '.html');
        if(!file_exists($file_name)){
            //return 404 depuis le model inclus dans laravel
            throw new ModelNotFoundException();
        }

    return file_get_contents($file_name);
    }
    
}

