@extends('common.member')


@section('title','编辑个人资料')

@include('member.edit.edit_side')

@section('content')
    <div class="content-box">
        <div class="content-list">
            <div class="side-item-content">
                <h2><i class="glyphicon glyphicon-cog"></i> 编辑个人资料</h2>
                <hr>
                @include('common.errsuc')
                <div class="form-box">
                    <form action="{{ url('/member/edit') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-6">
                                <input class="form-control" disabled type="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-sm-4 help-block">您的登录邮箱</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">昵称</label>
                            <div class="col-sm-6">
                                <input class="form-control" disabled type="text" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-sm-4 help-block">您的昵称</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">个人简介</label>
                            <div class="col-sm-6">
                                <textarea name="introduction" class="form-control">{{ Auth::user()->introduction }}</textarea>
                            </div>
                            <div class="col-sm-4 help-block">您的个人简介</div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-primary">应用修改</button>
                            </div>
                            <div class="col-sm-4 help-block"></div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
