<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?> | Autelan Cloud Platform</title>
		<!-- Bootstrap core CSS -->
    	<link href="/application/views/global/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    	<!-- Login form CSS -->
   		<link href="/application/views/global/custom/css/login.css" rel="stylesheet">
   		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <script src="/application/views/global/custom/js/ie10-viewport-bug-workaround.js"></script>

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<div id="fullscreen_bg" class="fullscreen_bg"/>

		<div class="container">
			<?php $att = array('class' => 'form-signin');?>
			
			<?php echo   form_open(base_url('admin/validate_credentials'), $att); ?>
				<h1 class="form-signin-heading text-muted">Autelan Cloud Platform</h1>
				<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="">
				<input type="password" class="form-control" name="password" placeholder="Password" required="">
				<p style="color: #FFF;"><?php echo $error ?></p>
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Sign In
				</button>
			</form>

		</div>
	</body>
</html>
