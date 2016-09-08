<?php

namespace App\Http\Controllers\Member;

use App\Models\Comment;
use App\Models\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        //我的帖子
        $post = Post::where('member_id',Auth::id())
            ->with('category')
            ->orderBy('id','DESC')
            ->paginate(15);

        return view('member.index',compact('post'));
    }
    public function comment(){
        //我的回复
        $comment = Comment::where('member_id',Auth::id())
            ->with('member','post')
            ->orderBy('id','DESC')
            ->paginate(15);
        return view('member.comment',compact('comment'));
    }


}
