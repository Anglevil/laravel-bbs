<header role="navigation" class="navbar navbar-default navbar-static-top topnav">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ url('/') }}" class="navbar-brand">问答社区</a>
        </div>
        <div clas="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/') }}">首页</a>
                </li>
                <li>
                    <a href="#">教程</a>
                </li>
                <li>
                    <a href="#">分享</a>
                </li>
            </ul>
        </div>
        <div class="navbar-right">
            <form method="get" class="navbar-form navbar-left">
                <div class="form-group">
                    <input name="q" class="form-control search-input mac-style" placeholder="搜索" type="text" />
                </div>
            </form>
            <ul class="nav navbar-nav github-login">
                <li>
                    <a href="{{ url('/post/create') }}">
                        <i class="glyphicon-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-bell"></i>
                        <span class="badge badge-fade popover-with-html">0</span>
                    </a>
                </li>
                @if(Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">登录</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">注册</a>
                    </li>
                @else
                <li>
                    <a href="#" aria-haspopup="true" data-toggle="dropdown" id="Dlable">
                        <img class="avatar-topnav" src="/img/3189_1450272271.jpeg">
                        {{ Auth::user()->name }}
                        <i class="glyphicon glyphicon-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li>
                            <a href="{{ url('/member') }}">
                                <i class="glyphicon glyphicon-user"></i> 个人中心
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-pencil"></i> 编辑资料
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <i class="glyphicon glyphicon-off"></i> 退出登录
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</header>