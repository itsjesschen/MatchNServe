<html>
	<style type='text/css'>
		body 
		{ 
			font-family:Arial;
		}
		.button 
		{
			background-color:rgb(204,204,204);color:rgb(119,119,119);padding:25px;padding-right:60px;padding-left:60px;
			cursor: pointer;
		}
		.triangle-obtuse {
	position:relative;
	padding:15px;
	margin:1em 0 3em;
	color:#fff;
	background:#777777;
	/* css3 */
	background:-webkit-gradient(linear, 0 0, 0 100%, from(#A8A8A8), to(#777777));
	background:-moz-linear-gradient(#A8A8A8, #777777);
	background:-o-linear-gradient(#A8A8A8, #777777);
	background:linear-gradient(#A8A8A8, #777777);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
}

/* creates the wider right-angled triangle */
.triangle-obtuse:before {
	content:"";
	position:absolute;
	bottom:-40px; /* value = - border-top-width - border-bottom-width */
	left:80px; /* controls horizontal position */
	border:0;
	border-right-width:30px; /* vary this value to change the angle of the vertex */
	border-bottom-width:40px; /* vary this value to change the height of the triangle. must be equal to the corresponding value in :after */
	border-style:solid;
	border-color:transparent #777777;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}
	</style>
	<body>
	<div class="header">
    <?php echo render('elements.header'); ?>
  </div>
    <div class="dashboard">
	</div>
	  <div class="subDashboard">
  </div>
  <div class="workspace">
	<table cellspacing='10px'>
		<tr><td><div class="triangle-obtuse" style='-moz-border-radius:60px;border-radius:60px;width:300px;font-size:30px;color:white;background-color:rgb(119,119,119);padding:25px;font-style:italic;'>We found multiple accounts under your name. Which one would you like to use?</br>
		<div style='font-size:15px;padding-top:10px;'>You can change these accounts later on. Just pick one for now.</div></div>
		</td><td></td><td></td><td>
		<form id='myform' action=<?php echo URL::to('user/accountselected'); ?> method='get'>
			<table cellspacing='10px'>
				<tr><td class='button' onclick="clicked('personal')" align='center'>PERSONAL ACCOUNT</td></tr>
				<?php 
				$userName = Session::get('userName');
				$names = Session::get('names');
				foreach($names as $name)
				{
					echo "<tr><td class='button' onclick=\"clicked('$name')\" align='center'>$name</td></tr>";
				}   
				?>
				<tr><td><input type='hidden' name='account' id='account' value=''/></td></tr>
				<tr><td><input type='hidden' name='userName' value='$userName'/></td></tr>
			</table>
		</form>
	</td></tr></table>
	<script type='text/javascript'>
		function clicked(name) {
			document.getElementById('account').value = name;
			document.getElementById('myform').submit();
		}
	</script>
	</div>
	<div class="footer">
  <?php echo render('elements.footer'); ?>
</div>

		</body>
</html>
