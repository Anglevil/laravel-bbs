@extends('common.member')


@section('title','修改密码')

@include('member.edit.edit_side')

@section('content')
    <div class="content-box">
        <div class="content-list">
            <div class="side-item-content">
                <h2><i class="glyphicon glyphicon-lock"></i> 修改登陆密码</h2>
                <hr>
                @include('common.errsuc')
                <div class="form-box">
                    <form action="" method="post">

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">原始密码</label>
                            <div class="col-sm-6">
                                <input name="old_password" class="form-control" type="password">
                            </div>
                            <div class="col-sm-4 help-block">原来的登陆密码</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">新密码</label>
                            <div class="col-sm-6">
                                <input name="password" class="form-control" type="password">
                            </div>
                            <div class="col-sm-4 help-block">修改成新的密码</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">确认新密码</label>
                            <div class="col-sm-6">
                                <input name="password_confirmation" class="form-control" type="password">
                            </div>
                            <div class="col-sm-4 help-block">确认新密码</div>
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
