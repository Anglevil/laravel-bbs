@extends('common.member')


@section('title','个人中心-我的回复')
@section('content')
    <div class="content-box">
        <div class="content-list">

            @include('member.nav')

            <div class="side-item-content">

                <ul class="list-group member-post-list">
                    @foreach($comment as $v)
                    <li class="list-group-item">
                        <a href="{{ url('/post/'.$v->post->id) }}">{{ $v->post->title }}</a>
                        <span>at <a href="javascript:;">{{ $v->created_at->diffForHumans() }}</a></span>
                        <p>{!! $v->content !!}</p>
                    </li>
                    @endforeach
                </ul>
                <div class="content-footer clearfix">
                    <ul class="pagination pull-right" style="margin-right: 10px;margin-bottom: 0;">
                        {{ $comment->render() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('member.side')