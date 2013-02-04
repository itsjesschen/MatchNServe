<html>
	<style type='text/css'>
		body 
		{ 
			font-family:Arial;
		}
		.button 
		{
			background-color:rgb(204,204,204);color:rgb(119,119,119);padding:25px;padding-right:60px;padding-left:60px;
		}
	</style>
	<table cellspacing='10px'>
		<tr><td><div style='-moz-border-radius:60px;border-radius:60px;width:300px;font-size:30px;color:white;background-color:rgb(119,119,119);padding:25px;font-style:italic;'>We found multiple accounts under your name. Which one would you like to use?</br>
		<div style='font-size:15px;padding-top:10px;'>You can change these accounts later on. Just pick one for now.</div></div>
		</td><td>
		<form id='myform' action='http://www.matchandserve.com' method='post'>
			<table cellspacing='10px'>
				<tr><td class='button' onclick="clicked('personal')" align='center'>PERSONAL ACCOUNT</td></tr>
				<?php 
				$names = $_POST['names'];
				$userName = $_POST['userName'];
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
</html>
