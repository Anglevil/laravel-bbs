@extends('common.member')


@section('title','个人中心-我的帖子')
@section('content')
    <div class="content-box">
        <div class="content-list">

            @include('member.nav')

            <div class="side-item-content">

                <ul class="list-group member-post-list">
                    @foreach($post as $v)
                    <li class="list-group-item">
                        <a href="{{ url('/post/'.$v->id) }}">{{ $v->title }}</a>
                        <span>
                            <a href="#">{{ $v->category->name }}</a> ⋅ {{ $v->view_count }} 阅读 ⋅ {{ $v->comment_count }} 回复 ⋅
                            <a href="javascript:;">{{ \Carbon\Carbon::createFromTimestamp(strtotime($v->last_comment_at))->diffForHumans() }}</a>
                        </span>
                    </li>
                    @endforeach
                </ul>
                <div class="content-footer clearfix">
                    <ul class="pagination pull-right" style="margin-right: 10px;margin-bottom: 0;">
                        {{ $post->render() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('member.side')