<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/normalize.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/common.css" />
    @yield('css')
</head>
<body>
<div class="wrapper">
    @include('common.header')
    <div class="content">
        <div class="container">

            <div class="col-md-9 content-page">

                @yield('content')

            </div>
            <div class="col-md-3 side-bar">
                @yield('side')
            </div>




        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer row">
                <div class="col-sm-5 col-lg-5">
                    关于我们
                </div>
                <div class="col-sm-7 col-lg-7">
                    信息
                </div>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript" src="/js/jquery.min.js" ></script>
<script type="text/javascript" src="/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/package/moment/moment.js"></script>
<script type="text/javascript">
    $("[data-toggle='tooltip']").tooltip();
</script>
@yield('js')
</body>
</html>
