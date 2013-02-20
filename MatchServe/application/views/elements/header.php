<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- header containing all the bootstrap calls -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
  <?php echo Asset::container('bootstrap')->styles();?>
</head>

<body>
	<div class="header">
		<div class="navbar navbar-inverse">
  			<div class="navbar-inner">
        	<a href="<?php echo URL::to('home')?>" class="brand">
        		<img src="img/Title.png"/>
      		</a>
    		  <div class="navheader">
            	<ul class="nav">
      				<li>
      				<?php
      					$name = Cookie::get('name');
      					if(isset($name))
      					{
      						echo "<a href = " .URL::to('logout/logout'). "> Logout </a>";
      					}
      					else
      					{
      						echo "<a href = " .URL::to('login'). "> Login/Register </a>";
      					}
      				?>
      				</li>
    			</ul>
        	</div>
  		</div>
	</div>
</body>
</html>