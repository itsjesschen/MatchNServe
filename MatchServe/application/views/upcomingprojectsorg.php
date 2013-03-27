<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<!-- <?php echo Asset::container('bootstrap')->styles();?> -->
	<!-- <?php echo Asset::scripts();?> -->


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
			<!-- first project on the list, the href will connect the project with the rightsideinfo-->
			<!--<li class="active"><a href="#project1" data-toggle="tab">
				<div class="calendar">
					<div id="month">MAR</div>
					<div id="date">25</div>
				</div>
				<div class="infosection">
					<div id="projecttitle">Web Developer</div>
					<div id="orgname">Downtown Women's Center</div>
					<div id="timeline">10:00am - 2:00pm</div>
					<div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
				</div></a>
			</li>-->
		</ul>
		<!-- this is the where you will find the tab content for the right hand side. This correlates 
		exactly with the href from above. Make sure to follow it through -->
		<div id="tab-content" class="tab-content">
			<!--<div class="tab-pane active" id="project1">
				<div class="tabbable tabs-left" id="rightsideinfo">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#schedule" data-toggle="tab"><?php echo HTML::image("img/CalendarGray.png") ?></br>Schedule</a></li>
						<li><a href="#messages" data-toggle="tab"><?php echo HTML::image("img/MessageGray.png") ?></br>Messages</a></li>
						<li><a href="#deleteproject" data-toggle="tab"><?php echo HTML::image("img/DeleteGray.png") ?></br>Delete Project</a></li>
						<li><a href="#pendingvolunteers" data-toggle="tab"><?php echo HTML::image("img/PendingGray.png") ?></br>Pending</a></li>
						<li><a href="#checkinvolunteers" data-toggle="tab"><?php echo HTML::image("img/CheckInGray.png") ?></br>Check-In</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="schedule">Schedule1</div>
						<div class="tab-pane" id="messages">Messages1</div>
						<div class="tab-pane" id="deleteproject">Delete Project1</div>
						<div class="tab-pane" id="pendingvolunteers">Pending1</div>
						<div class="tab-pane" id="checkinvolunteers">Check-In1</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="project2">
				<div class="tabbable tabs-left" id="rightsideinfo">
					<ul class="nav nav-tabs">
					<li class="active"><a href="#schedule2" data-toggle="tab"><?php echo HTML::image("img/CalendarGray.png") ?></br>Schedule</a></li>
						<li><a href="#messages2" data-toggle="tab"><?php echo HTML::image("img/MessageGray.png") ?></br>Messages</a></li>
						<li><a href="#deleteproject2" data-toggle="tab"><?php echo HTML::image("img/DeleteGray.png") ?></br>Delete Project</a></li>
						<li><a href="#pendingvolunteers2" data-toggle="tab"><?php echo HTML::image("img/PendingGray.png") ?></br>Pending</a></li>
						<li><a href="#checkinvolunteers2" data-toggle="tab"><?php echo HTML::image("img/CheckInGray.png") ?></br>Check-In</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="schedule2">Schedule2</div>
						<div class="tab-pane" id="messages2">Messages2</div>
						<div class="tab-pane" id="deleteproject2">Delete Project2</div>
						<div class="tab-pane" id="pendingvolunteers2">Pending2</div>
						<div class="tab-pane" id="checkinvolunteers2">Check-In2</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="project3">
			</div>
			<div class="tab-pane" id="project4">
			</div>
			<div class="tab-pane" id="project5">
			</div>-->
		</div>
	</div>
</body>
</html>