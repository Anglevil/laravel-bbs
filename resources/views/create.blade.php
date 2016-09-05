@extends('common.common')


@section('title','发帖')
@section('content')
    <div class="content-box">
        <div class="create-form" style="padding: 10px;">
            @if (count($errors) > 0)
            <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>哇哦！你的输入好像有些错误！</strong>

                    <br><br>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/post/store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    标题
                    <input class="form-control" name="title" type="text">
                </div>
                <div class="form-group">
                    分类
                    <select class="form-control" name="category_id">
                        <option value="0">请选择栏目</option>
                        @foreach($category as $v)
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn  btn-success">发帖</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('side')

    <div class="side-item">
        <div class="side-item-title">
            发帖须知
        </div>
        <div class="side-item-content">
            请传播美好的事物，这里拒绝低俗、诋毁、谩骂等相关信息 请尽量分享技术相关的话题，谢绝发布社会, 政治等相关新闻 这里绝对不讨论任何有关盗版软件、音乐、电影如何获得的问题
        </div>
    </div>
    <div class="side-item">
        <div class="side-item-title">
            关于
        </div>
        <div class="side-item-content">
            分享生活见闻, 分享知识 接触新技术, 讨论技术解决方案 为自己的创业项目找合伙人, 遇见志同道合的人 自发线下聚会, 加强社交 发现更好工作机会 甚至是开始另一个神奇的开源项目
        </div>
    </div>
@endsection