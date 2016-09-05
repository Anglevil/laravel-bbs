<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';
    //
    public function post(){
        return $this->hasMany(Post::class);
    }
}
