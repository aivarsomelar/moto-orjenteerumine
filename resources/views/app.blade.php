<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moto orienteerumine</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/urx.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Moto Orienteerumine</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                    <li><a href="{{ url('/team/all') }}">Teamid</a></li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            Minu Team<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li><a href="{{url('/team/description')}}">Teami kirjeldus</a></li>
                            <li><a href="{{ url('/riddle/show') }}">Teami ülesanded</a></li>
                            <li><a href="{{ url('/picture/moments/team/all') }}">Teami pildid</a></li>
                        </ul>
                    </li>
					<li><a href="{{ url('/riddle/insert') }}">Kuhu minna?</a></li>
				</ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/auth/register') }}">Registreeri team</a></li>
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
			</div>
		</div>
	</nav>
    <div class=container">
	    @yield('content')
    </div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
