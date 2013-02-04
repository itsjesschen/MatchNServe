<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- header containing all the bootstrap calls -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HeaderPage</title>
	<?php echo HTML::style('bootstrap/css/bootstrap.css'); ?> 

    <style type="text/css">
    </style>
</head>

<body>
	<div class="header">
		<div class="navbar navbar-inverse">
  			<div class="navbar-inner">
        	<a href="#" class="brand">
        		<img src="img/Title.png"/>
      		</a>
    		<div class="navheader">
            	<ul class="nav">
      				<li><a href="<?php echo URL::to('login') ?>">Login/Register</a></li>
    			</ul>
        	</div>
  		</div>
	</div>
</body>
</html>