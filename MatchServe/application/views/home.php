<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Match & Serve | Matching great volunteers with great organizations</title>

<!--SUPER IMPORTANT: MAKE SURE TO COPY AND PASTE THIS IN EVERY HEADER SO ALL THE INCLUDES CAN TAKE EFFECT IN THE PAGE-->
<?php echo Asset::container('bootstrap')->styles();?>
<?php echo Asset::scripts();?>

<!--SCRIPT TO INITIALIZE THE CAROUSEL-->
<script>
  $(document).ready(function(){
    $('#myCarousel').carousel();
  });
</script>
</head>

<!--BEGINNING OF BODY-->
<body>

<div class="header">
<?php echo render('elements.header'); ?>
</div>

<div class="dashboard">
	<div class="inputZip"><img src="img/TypeZip.png"/></div>
		<form class="navbar-form" action="<?php echo URL::to('search') ?>" method="get">
  			<input type="text" value="  zip code" class="zipCodeField" onclick="value= ''" name="search-term">
  		  <input type="submit" value="Submit" class="btn">
		</form>
</div>

<div class="subDashboard">
</div>

<div class="workspace">
  <div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
      <div class="active item">
        <img src="img/SaveLives.png"/>
      </div>
      <div class="item">
        <img src="img/ChangeCommunity.png"/>
      </div>
      <div class="item">
        <img src="img/ChangeWorld.png"/>
      </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
  </div>
	<div class="container marketing">
      	<div class="row">
        <div class="blurbAtTheBottom">
        	<div class="span4">
          		<img class="img-circle" data-src="holder.js/140x140">
          			<h2>Volunteers</h2>
          				<p>Find projects that fit your skills</p>
          				<p><a class="btn" href="#">View details &raquo;</a></p>
        	</div><!-- /.span4 -->
        	<div class="span4">
          		<img class="img-circle" data-src="holder.js/140x140">
          			<h2>Karma Points</h2>
          			<p>The good you do DOES come back to you</p>
          			<p><a class="btn" href="#">View details &raquo;</a></p>
        	</div><!-- /.span4 -->
        	<div class="span4">
          		<img class="img-circle" data-src="holder.js/140x140">
          			<h2>Organizations</h2>
          			<p>Get the right volunteers for the job</p>
          			<p><a class="btn" href="#">View details &raquo;</a></p>
        	</div><!-- /.span4 -->
        </div>
      	</div><!-- /.row -->
	</div><!-- container marketing-->
</div>

<div class="footer">
<?php echo render('elements.footer'); ?>
</div>
</body>
</html>