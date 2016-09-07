<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        //获取用户信息
        $member = Member::where('id',Auth::id())
            ->first();
        //我的帖子
        $post = Post::where('member_id',Auth::id())
            ->with('category')
            ->orderBy('id','DESC')
            ->get();
        return view('member.index',compact('member','post'));
    }

    public function edit(){
        return view('member.edit.edit');
    }

    public function edit_avatar(){
        return view('member.edit.edit_avatar');
    }

    public function edit_password(){
        return view('member.edit.edit_password');
    }

    public function edit_binding(){
        return view('member.edit.edit_binding');
    }
}
