<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<?php echo Asset::styles();?>
	<?php echo Asset::container('bootstrap')->styles();?>

	<style>
	.container{
		width:300px;
		height:80px;
		margin:5px;
	}
	.calendar{
		float:left;
		width:60px;
		height:80px;
		margin:5px;
		margin-right:0px;
		background-color: yellow;
	}
	.infosection{
		float:left;
		width:140px;
		height:80px;
		margin:5px;
		margin-left:0px;
		background-color: blue;
	}
	#projectlist li{
		clear:both;
		margin:0;
		padding:0;
	}
	#projectlist{
		height:510px;
		width:300px;
	}
	</style>

</head>

<body>

	<div class="container">
		<ul id="projectlist">
			<li>
				<div class="calendar">

				</div>
				<div class="infosection">
				</div>
			</li>
			<li>
				<div class="calendar">
				</div>
				<div class="infosection">
				</div>
			</li>
		</ul>
	</div>

</body>

</html>