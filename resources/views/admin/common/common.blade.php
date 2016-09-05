<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>后台管理系统-@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <script type="text/javascript" src="/backend/assets/js/jquery.js"></script>

    <link rel="stylesheet" href="/backend/assets/css/style.css">
    <link rel="stylesheet" href="/backend/assets/css/loader-style.css">
    <link rel="stylesheet" href="/backend/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/backend/assets/js/button/ladda/ladda.min.css">

    @yield('css')



    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/admin/assets/ico/minus.png">
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- TOP NAVBAR -->

@include('admin.common.header')

<!-- /END OF TOP NAVBAR -->

<!-- SIDE MENU -->
@include('admin.common.side')
<!-- END OF SIDE MENU -->



<!--  PAPER WRAP -->
<div class="wrap-fluid">
    <div class="container-fluid paper-wrap bevel tlbr">


        <!-- CONTENT -->
        <!--TITLE -->
        <div class="row">
            <div id="paper-top">
                <div class="col-sm-3">
                    <h2 class="tittle-content-header">
                        <i class="icon-media-record"></i>
                        <span>@yield('title')</span>
                    </h2>

                </div>

                <div class="col-sm-7">
                    <div class="devider-vertical visible-lg"></div>
                    <div class="tittle-middle-header">

                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <span class="tittle-alert entypo-info-circled"></span>
                            欢迎回来,&nbsp;
                            <strong>管理员!</strong>&nbsp;&nbsp;你最后是在昨天登录, 16:54 PM
                        </div>


                    </div>

                </div>
                <div class="col-sm-2">
                    <div class="devider-vertical visible-lg"></div>
                    <div class="btn-group btn-wigdet pull-right visible-lg">
                        <div class="btn">
                            Widget</div>
                        <button data-toggle="dropdown" class="btn dropdown-toggle" type="button">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <span class="entypo-plus-circled margin-iconic"></span>Add New</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="entypo-heart margin-iconic"></span>Favorite</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="entypo-cog margin-iconic"></span>Setting</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <!--/ TITLE -->

        <!-- BREADCRUMB -->

        @yield("breadcrumb")

        <!-- END OF BREADCRUMB -->


        @yield('content')


        <!-- FOOTER -->
        @include('admin.common.footer')
        <!-- / END OF FOOTER -->
    </div>
    <!--  END OF PAPER WRAP -->

    <!-- RIGHT SLIDER CONTENT -->

    @include('admin.common.slider')

    <!-- END OF RIGHT SLIDER CONTENT-->


    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="/backend/assets/js/preloader.js"></script>
    <script type="text/javascript" src="/backend/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="/backend/assets/js/app.js"></script>
    <script type="text/javascript" src="/backend/assets/js/load.js"></script>
    <script type="text/javascript" src="/backend/assets/js/main.js"></script>


</div>

</body>

</html>
