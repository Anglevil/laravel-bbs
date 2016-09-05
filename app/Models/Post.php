<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //



    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function lastCommentMember(){
        return $this->belongsTo(Member::class, 'last_comment_member_id');
    }
}
