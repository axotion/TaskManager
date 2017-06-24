
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <title>WeirdApp</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/singin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <!-- Prevent typical bots -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body  style="background-color: #303030 !important; color:white !important;">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('app.name')  }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(auth()->guest())
                <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @else
                    <li><a href="/profile"><b>{{ auth()->user()->name}}</b></a></li>
                    <li><a href="/create">New task</a></li>
                    <li><a href="/logout">Logout</a></li>


                @endif

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="padding-top: 0% !important;">

    <div class="starter-template">
        <h1>@yield('title')</h1>
        @yield('body')
    </div>

</div><!-- /.container -->


@yield('form')

<div class="navbar navbar-default navbar-fixed-bottom " style="background-color: #222222; border-color: #222222; margin-bottom: -1%">
    <div class="container"style="margin-bottom: 20px">
        <p class="navbar-text social" >© {{ \Carbon\Carbon::now()->year }} - Site Built only for educational purpose

        </p>


    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
