<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>codeHarbour - Web meetup in South East England</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="stylesheet" type="text/css" href="css/fonts/MyFontsWebfontsKit.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/mainFunctions.js?<?php echo time(); ?>"></script>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	</head>
  <body>
	@include('layouts.nav')
	<div class="container">
		@yield('content')
	</div>
	@include('layouts.footer')
  </body>
</html>
