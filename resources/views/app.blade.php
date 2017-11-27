
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.Jcrop.css">



    <script src="/js/jquery-2.1.4.min.js"></script>
    {{--<script src="/js/bootstrap.min.js"></script>--}}
    {{--app.js就是代表着bootstrap--}}
    <script src="/js/app.js"></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.Jcrop.min.js"></script>



</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Blog</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">首页</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())

                    <li>
                        <a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="/user/avatar"> <i class="fa fa-user"></i> 更换头像</a></li>
                            <li><a href="#"> <i class="fa fa-cog"></i> 更换密码</a></li>
                            <li><a href="#"> <i class="fa fa-heart"></i> 特别感谢</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout"> <i class="fa fa-sign-out"></i>退出登录</a></li>
                        </ul>
                    </li>

                    <li><img src="{{Auth::user()->avatar}}" class="img-circle" width="50" alt=""></li>

                @else
                    <li><a href="/user/login">登 陆</a></li>
                    <li><a href="/user/register">注 册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
@yield('content')

{{--<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>--}}
{{--<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>--}}

</body>
</html>
