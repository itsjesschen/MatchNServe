<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<?php echo Asset::container('bootstrap')->styles();?>
	<?php echo Asset::scripts();?>


	<style>

	.calendar{
		float:left;
		text-align: center;
		width:60px;
		height:80px;
		margin:5px;
		margin-right:0px;
		background-color: #eeeeee;
	}
	#month{
		font-size: 20px;
		margin:2px;
		margin-top:10px;
	}
	#date{
		font-size: 46px;
		margin:2px;
		margin-top: 10px;
	}
	.infosection{
		float:left;
		width:140px;
		height:80px;
		margin:5px;
		margin-left:0px;
		background-color: #777777;
	}
	#projectlist li{
		clear:both;
		margin:0;
		padding:0;
	}
	#projectlist{
		height:500px;
		width:250px;
		margin:0px;
		padding:0px;
		overflow: auto;
	}
	.container{
		margin:0px;
		padding:0px;
	}
	</style>

</head>

<body>

	<div class="container">
		<ul id="projectlist">
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
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