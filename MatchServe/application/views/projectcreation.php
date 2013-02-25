<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
    <title>Match and Serve - Create A Project</title>
    <meta name="viewport" content="width=device-width">
    <?php echo Asset::container('bootstrap')->styles();?>
  	<?php echo Asset::scripts();?>
    <?php echo Asset::container('projectcreation')->scripts();?>

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

	 		<p>PROJECT TITLE <input type="text" name="projectName" /></p>
	 		<p>PROJECT DESCRIPTION <input type="text" name="projectDescription" /></p>
	 		<p>WHEN IS THE PROJECT GOING TO HAPPEN?</p>
	 		<input type="radio" class="projectTimeSelector" name="ONGOING" value="1"> ONGOING <br>
	        <input type="radio" class="projectTimeSelector" name="SPECIFIC DATES" value="2"> SPECIFIC DATES <br>
	   		</br>
<!--
	        <span class="dropdown">
                <a class="projectcreation-category dropdown-toggle" data-toggle="dropdown" href="#">ADMINS
                    <span class="caret"></span>
                </a>
                <ul class = "dropdown-menu">
                </ul>
            </span>
-->
			<select class="projectAdminSelector">
  				<option value="test">TestAdmin</option>
			</select>
		</div>

 		<p><p><input type="submit" /></p></p>
	</form>


	<div class="footer">
		<?php echo render('elements.footer'); ?>
	</div>

</body>
</html>