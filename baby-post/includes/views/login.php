<!DOCTYPE HTML>
<html>
<head>
<title>Login Baby Post</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Login Baby Post" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?php echo $this->getBaseUrl('css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="<?php echo $this->getBaseUrl('css/style.css') ?>" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="<?php echo $this->getBaseUrl('js/jquery-2.1.1.min.js') ?>"></script> 
<!--icons-css-->
<link href="<?php echo $this->getBaseUrl('css/font-awesome.css'); ?>" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<form action="<?php echo $this->getBaseUrl('index/authorize.html'); ?>">
					<input type="text" name="email" placeholder="Email" required="">
                    <input type="password" name="password" class="lock" placeholder="Password">
                    <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
									<input type="checkbox" name="rememberme" id="brand1" value="1">
									<label for="brand1"><span></span>Remember me</label>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Login">	
				</form>
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2018 Baby Post. All Rights Reserved</p>
</div>	
<!--COPY rights end here-->

<!--scrolling js-->
		<script src="<?php echo $this->getBaseUrl('js/jquery.nicescroll.js'); ?>"></script>
		<script src="<?php echo $this->getBaseUrl('js/scripts.js'); ?>"></script>
		<!--//scrolling js-->
<script src="<?php echo $this->getBaseUrl('js/bootstrap.js'); ?>"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
