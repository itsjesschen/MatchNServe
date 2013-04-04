<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<!--<?php echo Asset::container('bootstrap')->styles();?>
	<?php echo Asset::scripts();?> -->
	<?php echo Asset::container('dashboardorg')->scripts();?>
	<?php echo Asset::container('datepicker')->scripts();?>
	<?php echo Asset::container('timepicker')->scripts();?>
	<!-- <?php echo Asset::styles();?>  -->
	<title></title>

	<style type="text/css">
	.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
	.ui-timepicker-div dl { text-align: left; }
	.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
	.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
	.ui-timepicker-div td { font-size: 90%; }
	.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

	.ui-timepicker-rtl{ direction: rtl; }
	.ui-timepicker-rtl dl { text-align: right; }
	.ui-timepicker-rtl dl dd { margin: 0 65px 10px 10px; }

	.inputBox {
		width: 300px;
	}

	#basicInfoGetter{
		margin-left: 20px;
	}
	#projectDescription{
		height:150px;
	}
	#stufftobeplacedonleft,
	#stufftobeplacedonright{
		float:left;
		width:500px;
		text-align: center;
	}

	</style>
</head>

<body>
	<form id="projectCreationForm" action=<?php echo URL::to('projectcreation/checkSubmit'); ?> method="get">
		<div id="stufftobeplacedonleft">
			<div id="projectcreation-specifiers-container">
				<input id="projectName" type="text" name="projectName" value="What position would you like to fill?" defaultValue = "What position would you like to fill?" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
			</br></br>
			<input id="projectHeadline" type="text" name="projectHeadline" value="Tell us the project in 1 short sentence" defaultValue = "Tell us the project in 1 short sentence" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
		</br></br>
		<input id="projectDescription" type="text" name="projectDescription" value="Give us the full project description" defaultValue = "Give us the full project description" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
	</br></br>
	<p> LOCATION: 	
		<input id="projectLocationONLINE" type="radio" name="projectLocation" value="1"> ONLINE
		<input id="projectLocationONSITE" type="radio" name="projectLocation" value="2"> ONSITE
	</p>
	<input id="projectLocationOtherAddress" type="text" name="projectLocationOther" value="If other, please give address." defaultValue = "If other, please give address." onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
</br></br>
<input id="projectVolunteerNumber" type="text" name="projectVolunteerNumber" value="How many volunteers are needed?" defaultValue = "How many volunteers are needed?" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
</br></br>
</div>
</div>
<div id="stufftobeplacedonright">
	<div id="project-creation-admin-dropdown">
		<li class="dropdown">
			<a class="projectAdminSelector dropdown-toggle" data-toggle="dropdown" href="#">Primary Contact<span class="caret"></span></a>
			<ul class = "dropdown-menu">
			</ul>
		</li>
	</br></br>
</div>
<input id="projectStartTime" type="text" name="projectStartTime" value="Start Time" defaultValue = "Start Time" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
<input id="projectEndTime" type="text" name="projectEndTime" value="End Time" defaultValue = "End Time" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
</br></br>
<div id="project-creation-skills-dropdown">
	<li class="dropdown">
		<a class="projectSkillSelector dropdown-toggle" data-toggle="dropdown" href="#">Skills Required 
			<span class="caret"></span>
		</a>
		<ul class = "dropdown-menu">
		</ul>
	</li>
</br></br>
</div>
<div id="project-creation-pgf-dropdown">
	<li class="dropdown">
		<a class="projectGoodForList dropdown-toggle" data-toggle="dropdown" href="#">Who is this good for? 
			<span class="caret"></span>
		</a>
		<ul class = "dropdown-menu">
		</ul>
	</li>
</br></br>
</div>
<input id="projectRequirements" type="text" name="projectRequirements" value="Any requirements?" defaultValue = "Any requirements?" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/>
</br></br>
</div>
<input type="submit" name="SaveButton" class="btn" value="Save Draft"/>   
<input type="submit" name="FinishButton" class="btn" value="Finish"/>
</br>
</div>
</form>
</body>
</html>