@extends('common.member')


@section('title','个人中心')
@section('content')
    <div class="content-box">
        <div class="content-list">
            <div class="side-item-title row" style="margin: 0;">
                <div class="col-xs-3">
                    <a href="#">发帖</a>
                </div>
                <div class="col-xs-3">
                    <a href="#">我的帖子</a>
                </div>
                <div class="col-xs-3">
                    <a href="#">我的回复</a>
                </div>
                <div class="col-xs-3">
                    <a href="#">@我的</a>
                </div>
            </div>
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
                <br /><br /><br /><br /><br /><br /><br />
            </div>
        </div>
    </div>
@endsection

@section('side')
    <div class="side-item">

        <div class="side-item-content">
            <div class="member-avatar">
                <img src="{{ getPicture($member->avatar) }}">
            </div>
            <div class="member-name">
                <h3>{{ $member->name }}</h3>
            </div>
            <hr>
            <div class="follow-info row">
                <div class="col-xs-4">
                    <a class="counter" href="#">10</a>
                    <a class="text" href="#">关注者</a>
                </div>
                <div class="col-xs-4">
                    <a class="counter" href="#">10</a>
                    <a class="text" href="#">话题</a>
                </div>
                <div class="col-xs-4">
                    <a class="counter" href="#">0</a>
                    <a class="text" href="#">回复</a>
                </div>
            </div>
            <hr>
            <div class="member-info">
                <p>简介:{{ $member->introduction?$member->introduction:'这个人很懒，什么都没有留下~~~~' }}</p>
                <p>注册于:{{ $member->created_at }}</p>
                <p>最后活跃:{{ $member->updated_at->diffForHumans() }}</p>
            </div>
            <hr>
            <div class="member-edit">
                <a href="{{ url('/member/edit') }}" class="btn btn-sm btn-primary btn-block">
                    <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
                </a>
            </div>
        </div>
    </div>

@endsection