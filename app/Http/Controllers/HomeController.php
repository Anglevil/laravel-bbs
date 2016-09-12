<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Member;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use Lib\Markdown\Markdown;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'post','demo']]);
    }


    public function demo(){
        return view('demo');
    }

    public function index(){
        //获取所有帖子
        $post = Post::with('member','category','lastCommentMember')
            ->orderBy('is_block','DESC')
            ->orderBy('is_top','ASC')
            ->orderBy('id','DESC')
            ->orderBy('last_comment_at','ASC')
            ->paginate(15);
        return view('index',['post'=>$post]);
    }

    public function post($id){
        $post = Post::where('id',$id)
            ->with('lastCommentMember','member','category')
            ->firstOrFail();
        $comment = Comment::with('member')
            ->where('post_id',$post->id)
            ->orderBy('created_at','ASC')
            ->get();
        $post->increment('view_count', 1);
        return view('post',['post'=>$post,'comment'=>$comment]);
    }

    public function create(Request $request){
        $category = Category::all();
        return view('create',['category'=>$category]);
    }

    /**
     * @param Request $request
     */
    public function store(StorePostRequest $request){
        $data = $request->input();
        $markdown = new Markdown;
        $data['content'] = $markdown->convertMarkdownToHtml($data['content']);
        $data['member_id'] = Auth::id();
        $data['last_comment_member_id'] = Auth::id();
        $data['last_comment_at'] = Carbon::now()->toDateTimeString();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        unset($data['_token']);

        $res = Post::insert($data);

        if($res){
            return redirect('/');
        }else{
            return redirect('/post/create');
        }

    }
}
