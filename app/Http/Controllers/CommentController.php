<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(StoreCommentRequest $request){
        $data = $request->input();
        //查询帖子信息
        $post = Post::where('id',$data['post_id'])->firstOrFail();
        if((!$post) || $post->is_block){
            return "帖子不存在或者已经被锁";
        }else{
            //更新帖子状态
            $post->last_comment_member_id = Auth::id();
            $post->last_comment_at = Carbon::now()->toDateTimeString();
            $post->increment('comment_count', 1);
            $post->save();
        }


        $data['member_id'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        unset($data['_token']);

        $res = Comment::insert($data);

        if($res){
            return redirect('/post/'.$data['post_id']);
        }else{
            return redirect('/');
        }
    }
}
