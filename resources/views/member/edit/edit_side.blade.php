@section('side')
    <div class="side-item">
        <div class="side-item-content">
            <ul class="list-group member-edit-list">
                <li class="list-group-item {{ navViewActive('member.edit.edit') }}">
                    <a href="{{ url('/member/edit') }}">
                        <i class="glyphicon glyphicon-list-alt"></i> 个人信息
                    </a>
                </li>
                <li class="list-group-item {{ navViewActive('member.edit.avatar') }}">
                    <a href="{{ url('/member/edit_avatar') }}">
                        <i class="glyphicon glyphicon-picture"></i> 头像修改
                    </a>
                </li>
                <li class="list-group-item {{ navViewActive('member.edit.password') }}">
                    <a href="{{ url('/member/edit_password') }}">
                        <i class="glyphicon glyphicon-lock"></i> 修改密码
                    </a>
                </li>
                <li class="list-group-item {{ navViewActive('member.edit.binding') }}">
                    <a href="{{ url('/member/edit_binding') }}">
                        <i class="glyphicon glyphicon-flag"></i> 账号绑定
                    </a>
                </li>

            </ul>
        </div>
    </div>

@endsection