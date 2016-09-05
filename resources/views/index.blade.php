@extends('common.common')


@section('title','问答社区首页')
@section('content')
    <div class="content-box">
        <div class="content-header">
            <ul class="list-inline">
                <li data-content="最后回复排序"><a href="#" class="active">活跃</a></li>
                <li data-content="只看加精的话题"><a href="#">精华</a></li>
                <li data-content="点赞数排序"><a href="#">投票</a></li>
                <li data-content="发布时间排序"><a href="#">最近</a></li>
                <li data-content="无人问津的话题"><a href="#">零回复</a></li>
            </ul>
        </div>
        <div class="content-list">
            <ul class="list-group row">

                @foreach ($post as $v)
                    <li class="list-group-item clearfix">
                        <div class="pull-left clearfix">
                            <div class="pull-left">
                                <a href="#">
                                    <img class="img-circle" src="https://dn-phphub.qbox.me/uploads/avatars/4430_1470104433.png?imageView2/1/w/100/h/100" width="45">
                                </a>
                            </div>
                            <div class="pull-left">
                                <div class="post-count">
                                    <span>{{ $v->comment_count }}</span>/{{ $v->view_count }}
                                </div>
                            </div>
                            <div class="pull-left">
                                <div class="post-info">
                                    @if($v->is_block != 1)
                                        @if($v->is_top == 1)
                                            <span class="hidden-xs label label-warning">置顶</span>
                                        @endif
                                        @if($v->is_good == 1)
                                            <span class="hidden-xs label label-danger">精华</span>
                                        @endif
                                    @else
                                        <span class="hidden-xs label label-default">锁帖</span>
                                    @endif
                                    <a href=" {{ url('/post/'.$v->id) }}">
                                        {{ $v->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="last-comment">
                                <a href="#">
                                    <img class="img-circle" src="https://dn-phphub.qbox.me/uploads/avatars/5189_1470142961.png?imageView2/1/w/100/h/100" width="20"
                                         title="{{ $v->lastCommentMember->name }}">
                                </a>
                                <span class="timeago">{{ \Carbon\Carbon::createFromTimestamp(strtotime($v->last_comment_at))->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach



            </ul>
        </div>
        <div class="content-footer clearfix">
            <ul class="pagination pull-right" style="margin-right: 10px;margin-bottom: 0;">
                {{ $post->render() }}
            </ul>
        </div>
    </div>
@endsection

@section('side')
    <div class="side-item">
        <div class="side-item-content">
            <a href="#" class="bottom">
                <i class="glyphicon glyphicon-pencil"></i> 发布帖子
            </a>
        </div>
    </div>

    <div class="side-item">
        <div class="side-item-title">
            热门推荐
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