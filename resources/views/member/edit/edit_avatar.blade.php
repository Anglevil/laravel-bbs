@extends('common.member')


@section('title','编辑个人t头像')

@include('member.edit.edit_side')

@section('content')
    <div class="content-box">
        <div class="content-list">
            <div class="side-item-content">
                <h2><i class="glyphicon glyphicon-picture"></i> 编辑个人头像</h2>
                <hr>
                @include('common.errsuc')
                <div class="form-box">
                    <form action="{{ url('/member/edit_avatar') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">当前头像</label>
                            <div class="col-sm-6">
                                <img src="{{ getPicture(Auth::user()->avatar) }}">
                            </div>
                            <div class="col-sm-4 help-block"></div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">上传头像</label>
                            <div class="col-sm-6">
                                <input name="avatar" type="file">
                            </div>
                            <div class="col-sm-4 help-block"></div>
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
