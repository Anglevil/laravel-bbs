<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/normalize.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/common.css" />

</head>
<body>
<div class="wrapper">
    <div class="login-box" style="width: 400px;margin: 100px auto;">
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
        <form action="{{ url('/register') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                用户名
                <input class="form-control" name="name" type="text" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                邮箱
                <input class="form-control" name="email" type="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                密码
                <input class="form-control" name="password" type="password">
            </div>
            <div class="form-group">
                确认密码
                <input class="form-control" name="password_confirmation" type="password">
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-success btn-block" type="submit">注册</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.min.js" ></script>
<script type="text/javascript" src="/js/bootstrap.min.js" ></script>
</body>
</html>
