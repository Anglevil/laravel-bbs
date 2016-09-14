@extends('common.common')


@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="content-box">
        <div class="content-detail">
            <div class="detail-title clearfix" style="position: relative;">
                <div class="head pull-left">
                    <a href="#">
                        <img class="img-circle" width="100" height="100" src="{{ getPicture($post->member->avatar) }}" />
                    </a>
                </div>
                <div class="title pull-left">
                    <h2>{{ $post->title }}</h2>
                    <div class="info">
                        <a href="#">
                            <i class="glyphicon glyphicon-folder-open"></i>  {{ $post->category->name }}
                        </a> ⋅
                        <a href="#">{{ $post->member->name }}</a> ⋅
                        于 {{ $post->created_at->diffForHumans() }}
                        @if(count($comment))
                            ⋅ 最后回复由 <a href="#">{{ $post->lastCommentMember->name }}</a> 于 {{ \Carbon\Carbon::createFromTimestamp(strtotime($post->last_comment_at))->diffForHumans() }}
                        @endif
                            ⋅ {{ $post->view_count }} 阅读
                    </div>
                </div>
                <div class="post-status-box">
                    @if($post->is_top)
                        <div class="post-status-top post-status" data-toggle="tooltip" title="帖子被置顶,排序靠前" style="background: #f0ad4e;">
                            <i class="glyphicon glyphicon-arrow-up"></i> 置顶
                        </div>
                    @endif

                    @if($post->is_good)
                        <div class="post-status-good post-status" data-toggle="tooltip" title="帖子被加精,实力好帖" style="background: #d9534f;">
                            <i class="glyphicon glyphicon-thumbs-up"></i> 精华
                        </div>

                    @endif
                    @if($post->is_block)
                        <div class="post-status-block post-status" data-toggle="tooltip" title="帖子被锁定,沉底关闭" style="background: #777;">
                            <i class="glyphicon glyphicon-lock"></i> 锁定
                        </div>
                    @endif

                </div>
            </div>
            <div class="detail-article">
                {!! $post->content !!}
            </div>
        </div>



    </div>
    <div class="article-item">
        <div class="item-content">
            点赞
        </div>
    </div>
    <div class="article-item">
        <div class="item-title">
            回复数量 {{ count($comment) }}
        </div>
        <div class="item-content">
            @if(count($comment))
            <ul style="padding-left:0; ">
                @foreach($comment as $index => $item)
                <li class="clearfix comment-item">
                    <div class="pull-left comment-img">
                        <a href="#">
                            <img width="50" height="50" class="img-circle" src="{{ getPicture($item->member->avatar) }}"></a>
                        </a>
                    </div>
                    <div class="comment-infos" style="margin-left: 70px;">
                        <div class="comment-info-head">
                            <a href="#">{{ $item->member->name }}</a>
                            <span>{{ $item->member->introduction }}</span>
                            <span class="pull-right">
                                <a href="javascript:;" data-toggle="tooltip" title="赞">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                </a> ⋅
                                <a href="javascript:;" data-toggle="tooltip" title="回复({{ $item->member->name }})"  onclick="comment('{{ $item->member->name }}');">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </a>
                            </span>
                            <div class="meta">
                                #{{ $index+1 }} ⋅ {{ $item->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="comment-info-body">
                            {!! $item->content !!}
                        </div>

                    </div>
                </li>
                @endforeach
            </ul>
            @else
                <div style="text-align: center;line-height: 50px;color: #ccc;">暂无回复</div>
            @endif
        </div>
    </div>
    <div class="article-item" id="comment">
        <div class="item-title">
            回复
        </div>

        <div class="item-content">
            @include('common.errsuc')
            <form action="{{ url('/comment/store') }}" method="post">
                {{ csrf_field() }}
                <input name="post_id" value="{{ $post->id }}" type="hidden">
                <input id="comment_input" type="hidden">
                <div class="form-group">
                    <textarea name="content" class="form-control" style="height: 200px;" id="comment_textarea" {{$post->is_block?'disabled':''}}></textarea>
                </div>
                <div class="form-group clearfix">
                    <button class="btn btn-sm btn-success pull-right" {{$post->is_block?'disabled':''}}>回复</button>
                </div>

            </form>
            <div class="markdown-body" id="markdown-box" style="border: dashed 1px gray;padding: 10px;background: #faf5eb;">

            </div>
        </div>
    </div>

@endsection

@section('side')
    <div class="side-item">
        <div class="side-item-title">
            板块
        </div>
        <div class="side-item-content">
            <br /><br /><br /><br /><br /><br />
        </div>
    </div>

    <div class="side-item">
        <div class="side-item-title">
            相关推荐
        </div>
        <div class="side-item-content">
            <ul class="list">
                <li>
                    <a href="#" data-toggle="tooltip" title="下载量最高的 100 个 Laravel 扩展包推荐">
                        下载量最高的 100 个 Laravel 扩展包推荐
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" title="下载量最高的 100 个 Laravel 扩展包推荐">
                        下载量最高的 100 个 Laravel 扩展包推荐
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" title="下载量最高的 100 个 Laravel 扩展包推荐">
                        下载量最高的 100 个 Laravel 扩展包推荐
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/8.0/styles/monokai_sublime.min.css">
@endsection
@section('js')
    <script src="/js/marked.js"></script>
    <script src="/js/highlight.js"></script>
    <script>
        //hljs.initHighlightingOnLoad();
        $(document).ready(function(){

            marked.setOptions({
                renderer: new marked.Renderer()
            });
            marked.setOptions({
                highlight: function (code) {
                    return hljs.highlightAuto(code).value;
                }
            });

        });

        $('#comment_textarea').keyup(function () {
            var marktext = marked($('#comment_textarea').val());
            $('#markdown-box').html(marktext);
            $('#comment_input').val(marktext);
        });


        function comment(name){
            $('#comment_textarea').val('@'+name+' ');
            $('#comment_textarea').focus();
            window.location.href = '#comment';
        }
    </script>
@endsection