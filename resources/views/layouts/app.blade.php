<!DOCTYPE html>
<html lang="en">
<head>
	<title>Laravel Exam</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('public/stylesheet/styles.css') }}">
	
</head>
<body class="override">
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">MyApp</a>
			</div>
			
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/about-us') }}">About Us</a></li>
					<li><a href="{{ url('/blog') }}">Blog</a></li>
					<li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container">
		<div class="row page-content">
			@yield('content')
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">&copy Author: <a href="http://carlofontanos.com" target="_blank">Carl Victor Fontanos</a></div>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

