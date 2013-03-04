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
		width:175px;
		height:80px;
		margin:5px;
		margin-left:0px;
		background-color: #777777;
	}

	#projectlist li{
		clear:both;
		margin:0;
		padding:0;
		list-style: none;
	}
	#projectlist{
		height:500px;
		width:275px;
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

	<script>

	</script>

</head>

<body>

	<div class="containerstuff">
		<ul id="projectlist">
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
			<li>
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div>
			</li>
		</ul>
		<div class="tabbable tabs-left" id="rightsideinfo">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#schedule" data-toggle="tab"><img src="img/CalendarGray.png"></br>Schedule</a></li>
				<li><a href="#messages" data-toggle="tab"><img src="img/MessageGray.png"></br>Messages</a></li>
				<li><a href="#deleteproject" data-toggle="tab"><img src="img/DeleteGray.png"></br>Delete Project</a></li>
				<li><a href="#pendingvolunteers" data-toggle="tab"><img src="img/PendingGray.png"></br>Pending</a></li>
				<li><a href="#checkinvolunteers" data-toggle="tab"><img src="img/CheckInGray.png"></br>Check-In</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="schedule">Schedule</div>
				<div class="tab-pane" id="messages">Messages</div>
				<div class="tab-pane" id="deleteproject">Delete Project</div>
				<div class="tab-pane" id="pendingvolunteers">Pending</div>
				<div class="tab-pane" id="checkinvolunteers">Check-In</div>
			</div>
		</div>
	</div>

</body>

</html>