@extends('common.common')


@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="content-box">
        <div class="content-detail">
            <div class="detail-title clearfix">
                <div class="head pull-left">
                    <a href="#">
                        <img class="img-circle" width="100" height="100" src="https://dn-phphub.qbox.me/uploads/avatars/5281_1470624645.jpeg?imageView2/1/w/100/h/100" />
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
            </div>
            <div class="detail-article">
                {{ $post->content }}
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
                            <img width="50" height="50" class="img-circle" src="https://dn-phphub.qbox.me/uploads/avatars/34_1427637647.jpeg?imageView2/1/w/100/h/100"></a>
                        </a>
                    </div>
                    <div class="comment-infos" style="margin-left: 70px;">
                        <div class="comment-info-head">
                            <a href="#">{{ $item->member->name }}</a>
                            <span>{{ $item->member->introduction }}</span>
                            <span class="pull-right">
                                <a href="#">分享</a> ⋅ <a href="#">回复</a>
                            </span>
                            <div class="meta">
                                #{{ $index+1 }} ⋅ {{ $item->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="comment-info-body">
                            {{ $item->content }}
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
    <div class="article-item">
        <div class="item-title">
            回复
        </div>
        <div class="item-content">
            <form action="{{ url('/comment/store') }}" method="post">
                {{ csrf_field() }}
                <input name="post_id" value="{{ $post->id }}" type="hidden">
                <div class="form-group">
                    <textarea class="form-control" name="content" style="height: 100px;"></textarea>
                </div>
                <div class="form-group clearfix">
                    <button class="btn btn-sm btn-success pull-right">回复</button>
                </div>

            </form>
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