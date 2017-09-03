
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>AspirePig的留言板- @yield('title')</title>

@section('style')
    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@show

</head>

<body>

@section('header')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <ul class="nav nav-pills">
                <li class="{{ (Request::getPathInfo() == '/' ) ? 'active' : ''}}
                    {{ (Request::getPathInfo() == '/index' ) ? 'active' : ''}}">
                    <a href='index'>首页</a>
                </li>
                <li class="{{ Request::getPathInfo() == '/login' ? 'active' : ''}}">
                    <a href='login'>登录</a>
                </li>
                <li class="{{ Request::getPathInfo() == '/register' ? 'active' : ''}}">
                    <a href='register'>注册</a>

            </ul>
            @yield('content')
        </div>
    </div>
</div>
@show

@section('fotter')
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
@show
