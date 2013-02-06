<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Match & Serve | Login/Registration Page</title>

		<!--SUPER IMPORTANT: MAKE SURE TO COPY AND PASTE THIS IN EVERY HEADER SO ALL THE INCLUDES CAN TAKE EFFECT IN THE PAGE-->
		<?php echo Asset::container('bootstrap')->styles();?>
		<?php echo Asset::scripts();?>

		<!--FORM SCRIPT-->
		<script language="javascript">
			function returningUser(){
				document.getElementById('newUser').style.visibility = "hidden";
				document.getElementById('password').style.visibility = "visible";
				document.getElementById('passwordInput').style.visibility = "visible";
				document.getElementById('submit').value = "LOGIN";
				document.getElementById('forgotPassword').style.visibility = "visible";
				document.getElementById('bottomText').innerHTML = "Don't have an account yet? Create an account <a href='javascript:newUser()' style='font-size:14px;color:grey'>here</a>";
			}
			function newUser(){
				document.getElementById('newUser').style.visibility = "visible";
				document.getElementById('password').style.visibility = "visible";
				document.getElementById('passwordInput').style.visibility = "visible";
				document.getElementById('submit').value = "REGISTER";
				document.getElementById('forgotPassword').style.visibility = "hidden";
				document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' style='color:grey'>here</a>";
			}
			function forgotPassword(){
				document.getElementById('newUser').style.visibility = "hidden";
				document.getElementById('password').style.visibility = "hidden";
				document.getElementById('passwordInput').style.visibility = "hidden";
				document.getElementById('submit').value = "SUBMIT";
				document.getElementById('forgotPassword').style.visibility = "hidden";
				document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' style='color:grey'>here</a>";
			}
		</script>
	</head>

	<body>
		<div class="header">
			<?php echo render('elements.header'); ?>
		</div>

		<div class="dashboard">
		</div>

		<div class="subDashboard">
		</div>

		<div class="workspace">
			<div name="leftBox" class="infoBoxLeft">
				<div class="stuffInside">
				<div class = "prompt">Please fill out the form below to get started</div>
				<form action="<?php echo URL::to('login/login')?>" style="color:gray" method="POST">
					<table>
						<tr id="name">
							<td>USERNAME
							</td>
						</tr>
						<tr id="name">
							<td><input type="text" class="formElementSpacing" name="userName">
							</td>
						</tr>
						<tr id="password">
							<td>PASSWORD: 
							</td>
						</tr>
						<tr id="passwordInput">
							<td><input type="password" class="formElementSpacing" name="password">
							</td>
						</tr>
					</table>
					<table  id="newUser" style="visibility: hidden">
						<tr><td>RE-TYPE PASSWORD:</td></tr>
						<tr><td>
							<input type="password" class="formElementSpacing" name="newPassword">
						</td></tr>
						<tr><td>EMAIL ADDRESS:</td></tr>
						<tr><td>
							<input type="text" class="formElementSpacing" name="newEmail">
						</td></tr>
					</table>
					
					<table>	
						<div class="prompt" id="bottomText" style="font-size:14px;">Don't have an account yet? Create an account 
							<a href="javascript:newUser()" style="font-size:14px;color:grey">here</a>
						</div>
								
						<tr><td id="forgotPassword" class="prompt" style="font-size:14px;">Forgot your password? Click 
							<a href="javascript:forgotPassword()" style="font-size:14px;color:gray;"> here</a>
						</td></tr>
								
						<tr><td>
							<input type="submit" class="button" id="submit" name="submit" value="LOGIN" style="background-color:rgb(27,199,0);color:white;font-weight:bold;padding:10px;border:none;cursor: pointer;"/>
						</td></tr>
					</table>
				</form>
				</div>
			</div>

			<div class="infoBoxMiddle">
				<img src='img/orDivider.png'/></a>
			</div>
			
			<div name = "rightBox" class="infoBoxRight">	
				<div class="stuffInside">		
				<a style="padding-left:20px" href="<?php echo URL::to('facebooklogin') ?>">
					<img src='img/login-facebook.png'/></a>
				</div>
			</div>
		</div>

		<div class="footer">
			<?php echo render('elements.footer'); ?>
		</div>
	</body>
</html>
