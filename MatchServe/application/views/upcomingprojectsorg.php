<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>

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
		width:175px;
		height:80px;
		margin:5px;
		margin-left:0px;
		background-color: #777777;
	}

	#projectlist li{
		clear:both;
		margin:5px;
		padding:0;
		list-style: none;
	}
	#projectlist{
		height:500px;
		width:300px;
		margin:0px;
		padding:0px;
		overflow: auto;
		float:left;
	}
	.containerstuff{
		float:left;
		margin:0px;
		padding:0px;
		width:1000px;
	}
	#orgname{
		font-size: 9px;
		padding-left:5px;
		margin-top: -5px;
		color:#ffffff;

	}
	#projecttitle{
		margin-top:3px;
		padding-left: 5px;
		text-transform: uppercase;
		color:#ffffff;
	}

	#timeline{
		padding-left: 5px;
		color:#cccccc;
	}
	#progressbar{
		margin-top:3px;
		margin-left:5px;
		margin-right:5px;
		height:15px;
	}
	#rightsideinfo{
		float: left;
		width:500px;
		margin-left:5px;
	}
	.selected{
		background-color: #A30000;
	}
	</style>


</head>

<body>

	<div class="containerstuff" class="tabbable tabs-left">
		<ul id="projectlist" class="nav nav-tabs">
		</ul>
		<!-- this is the where you will find the tab content for the right hand side. This correlates 
		exactly with the href from above. Make sure to follow it through -->
		<div class="tab-content tab-content-special" id="extendedprojectlist">
		</div>
	</div>
</body>
</html>