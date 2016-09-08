@section('side')
    <div class="side-item">

        <div class="side-item-content">
            <div class="member-avatar">
                <img src="{{ getPicture(Auth::user()->avatar) }}">
            </div>
            <div class="member-name">
                <h3>{{ Auth::user()->name }}</h3>
            </div>
            <hr>
            <div class="follow-info row">
                <div class="col-xs-4">
                    <a class="counter" href="#">0</a>
                    <a class="text" href="#">关注者</a>
                </div>
                <div class="col-xs-4">
                    <a class="counter" href="#">0</a>
                    <a class="text" href="#">话题</a>
                </div>
                <div class="col-xs-4">
                    <a class="counter" href="#">0</a>
                    <a class="text" href="#">回复</a>
                </div>
            </div>
            <hr>
            <div class="member-info">
                <p>简介:{{ Auth::user()->introduction?Auth::user()->introduction:'这个人很懒，什么都没有留下~~~~' }}</p>
                <p>注册于:{{ Auth::user()->created_at }}</p>
                <p>最后活跃:{{ Auth::user()->updated_at->diffForHumans() }}</p>
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