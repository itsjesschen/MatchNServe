<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Match & Serve | Matching great volunteers with great organizations</title>
<?php echo HTML::style('css/bootstrap.css'); ?> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

</head>

<body>
<div class="header">
<?php echo render('elements.header'); ?>
</div>

<div class="dashboard">
	<h3 class="inputZip">Type in your zip code to get started</h3>
		<form class="navbar-form">
  			<input type="text" value="  zip code" class="zipCodeField" onclick="value= ''">
  			<button type="submit" class="btn">Submit</button>
		</form>
</div>

<div class="subDashboard">
</div>

<div class="workspace">
	<div class="container marketing">
      	<div class="row">
        	<div class="span4">
          		<img class="img-circle" data-src="holder.js/140x140">
          			<h2>Volunteers</h2>
          				<p>Find out how Match & Serve can help you find the coolest projects out there that fitst your skills and requirements</p>
          				<p><a class="btn" href="#">View details &raquo;</a></p>
        	</div><!-- /.span4 -->
        	<div class="span4">
          		<img class="img-circle" data-src="holder.js/140x140">
          			<h2>Karma Points</h2>
          			<p>Because after all, the good you do DOES come back to you</p>
          			<p><a class="btn" href="#">View details &raquo;</a></p>
        	</div><!-- /.span4 -->
        	<div class="span4">
          		<img class="img-circle" data-src="holder.js/140x140">
          			<h2>Organizations</h2>
          			<p>Learn how you can get AND maintain relationship with the right volunteers for all your projects</p>
          			<p><a class="btn" href="#">View details &raquo;</a></p>
        	</div><!-- /.span4 -->
      	</div><!-- /.row -->
	</div><!-- container marketing-->
</div>

<div class="footer">
<?php echo render('elements.footer'); ?>
</div>
</body>

</html>