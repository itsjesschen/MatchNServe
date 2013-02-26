<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
    <title>Match and Serve - Create A Project</title>
    <meta name="viewport" content="width=device-width">
    <?php echo Asset::container('bootstrap')->styles();?>
  	<?php echo Asset::scripts();?>
    <?php echo Asset::container('projectcreation')->scripts();?>
    <?php echo Asset::container('datepicker')->scripts();?>
    <?php echo Asset::styles();?> 


    <style type="text/css">

    a.dp-choose-date {
	float: left;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 3px 0;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(calendar.png) no-repeat; 
	}

	a.dp-choose-date.dp-disabled {
		background-position: 0 -20px;
		cursor: default;
	}

    </style>
</head>

<body>

	<div class="header">
		<?php echo render('elements.header'); ?>
	</div>

<!-- FIRST TEST ON PHP VIEW
	<?php echo '<p> Hello. You are using:</p>';
	echo $_SERVER['HTTP_USER_AGENT']; ?>
-->

	</br>
	<form action="projectcreation/test" method="get">

        <div id="projectcreation-specifiers-container">

	 		<input id="projectName" type="text" width="100" name="projectName" value="Give your project a name" defaultValue = "Give your project a name" onclick="searchFieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"/>
            </br></br>
	 		<input id="projectHeadline" type="text" width="100" name="projectHeadline" value="What's the jist?" defaultValue = "What's the jist?" onclick="searchFieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"/>
            </br></br>
	 		<input id="projectDescription" type="text" width="100" name="projectDescription" value="Full project description" defaultValue = "Full project description" onclick="searchFieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"/>
            </br></br>
	 		<input id="projectDate" type="text" width="100" name="projectDate" value="Choose project date" defaultValue = "Choose project date" onclick="searchFieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"/>
            </br></br>

			<select class="projectAdminSelector">
				<option disabled> Select an admin </option>
			</select>



		</div>

 		<p><p><input type="submit" /></p></p>
	</form>


	<div class="footer">
		<?php echo render('elements.footer'); ?>
	</div>

</body>
</html>