<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Lib\Markdown\Markdown;
use Lib\Notification\Mention;

class CommentController extends Controller
{
    protected $mention;
    public function __construct(Mention $mention)
    {
        $this->middleware('auth');
        $this->mention = $mention;
    }
    //
    public function store(StoreCommentRequest $request){
        $data = $request->input();
        //查询帖子信息
        $post = Post::where('id',$data['post_id'])->firstOrFail();
        if((!$post) || $post->is_block){
            return redirect('/post/'.$data['post_id'].'#comment')->withErrors('帖子不存在或者已经被锁');
        }
        //解析回复内容
        $data['content'] = $this->mention->parse($data['content']);
        //查看是否重复评论
        $markdown = new Markdown;
        $data['content'] = $markdown->convertMarkdownToHtml($data['content']);
        $last_comment = Comment::where('member_id', Auth::id())
            ->where('post_id', $data['post_id'])
            ->orderBy('id', 'desc')
            ->first();
        if(count($last_comment) && strcmp($last_comment->content, $data['content']) === 0){
            return redirect('/post/'.$data['post_id'].'#comment')->withErrors('请不要重复回复');
        }
        //更新帖子状态
        $post->last_comment_member_id = Auth::id();
        $post->last_comment_at = Carbon::now()->toDateTimeString();
        $post->increment('comment_count', 1);
        $post->save();



        $data['member_id'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        unset($data['_token']);
        $res = Comment::insert($data);

        if($res){
            return redirect('/post/'.$data['post_id']);
        }else{
            return redirect('/post/'.$data['post_id'].'#comment')->withErrors('回复失败');
        }
    }
}
