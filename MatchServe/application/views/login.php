<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Match & Serve | Login/Registration Page</title>

		<?php echo Asset::container('bootstrap')->styles();?>
		<?php echo Asset::scripts();?>

		<script language="javascript">
			function returningUser(){
				document.getElementById('newUser').style.visibility = "collapse";
				document.getElementById('password').style.visibility = "visible";
				document.getElementById('passwordInput').style.visibility = "visible";
				document.getElementById('submit').value = "LOGIN";
				document.getElementById('forgotPassword').style.visibility = "visible";
				document.getElementById('nameError').style.visibility = "collapse";
				document.getElementById('pass1Error').style.visibility = "collapse";
				document.getElementById('pass2Error').style.visibility = "collapse";
				document.getElementById('emailError').style.visibility = "collapse";
				document.getElementById('bottomText').innerHTML = "Don't have an account yet? Create an account <a href='javascript:newUser()' class='link'>here</a>";
				document.getElementById('fbbtn').src = "../img/login-facebook.png";
			}
			function newUser(){
				document.getElementById('newUser').style.visibility = "visible";
				document.getElementById('password').style.visibility = "visible";
				document.getElementById('passwordInput').style.visibility = "visible";
				document.getElementById('submit').value = "REGISTER";
				document.getElementById('forgotPassword').style.visibility = "collapse";
				document.getElementById('nameError').style.visibility = "visible";
				document.getElementById('pass1Error').style.visibility = "visible";
				document.getElementById('pass2Error').style.visibility = "visible";
				document.getElementById('emailError').style.visibility = "visible";
				document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' class='link'>here</a>";
				document.getElementById('fbbtn').src = "../img/signup-facebook.png";
			}
			function forgotPassword(){
				document.getElementById('newUser').style.visibility = "collapse";
				document.getElementById('password').style.visibility = "collapse";
				document.getElementById('passwordInput').style.visibility = "collapse";
				document.getElementById('submit').value = "SUBMIT";
				document.getElementById('forgotPassword').style.visibility = "collapse";
				document.getElementById('nameError').style.visibility = "collapse";
				document.getElementById('pass1Error').style.visibility = "collapse";
				document.getElementById('pass2Error').style.visibility = "collapse";
				document.getElementById('emailError').style.visibility = "collapse";
				document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' class='link'>here</a>";
				document.getElementById('fbbtn').src = "../img/login-facebook.png";
			}
			function validateName() {
				//validate username
				var name = document.getElementById('username').value;
				
				if (name==null || name=="")
				{
				  //alert("Username must be filled out.");
				  document.getElementById('nameError').innerHTML = "Username must be filled out.";
				  return false;
				}
				if (name.length <= 8 || name >= 15)
				{
					document.getElementById('nameError').innerHTML = "Username must be greater than 8 and less than 15 characters.";
					//alert("Username must be greater than 8 and less than 15 characters.");
					return false;
				}
				document.getElementById('nameError').innerHTML = "";	
			}
			function validatePassword() {
				//validate password
				var password = document.getElementById('password1').value;
				if (password==null || password=="")
				{
				  //alert("Password must be filled out.");
				  document.getElementById('pass1Error').innerHTML = "Password must be filled out.";
				  return false;
				}
				if (password.length <= 8 || password.length >= 15)
				{
					//alert("Password must be greater than 8 and less than 15 characters.");
					document.getElementById('pass1Error').innerHTML = "Password must be greater than 8 and less than 15 characters.";
					return false;
				}
				document.getElementById('pass1Error').innerHTML = "";
				validateConfirmPassword();
			}
			function validateConfirmPassword() {
				//validate confirm password
				var password = document.getElementById('password1').value;
				var password2 = document.getElementById('password2').value;
				if (password!=password2)
				{
				  document.getElementById('pass2Error').innerHTML = "Passwords must match.";
				  //alert("Passwords must match.");
				  return false;
				}
				document.getElementById('pass2Error').innerHTML = "";
			}
			function validateEmail() {
				//validate email
				var email = document.getElementById('email').value;
				if (email==null || email=="")
				{
				  //alert("Email must be filled out.");
				  document.getElementById('emailError').innerHTML = "Email must be filled out.";
				  return false;
				}
				var atpos=email.indexOf("@");
				var dotpos=email.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
				{
				  document.getElementById('emailError').innerHTML = "Not a valid e-mail address";
				  //alert("Not a valid e-mail address");
				  return false;
				}
				document.getElementById('emailError').innerHTML = "";
			}
		</script>
		<style>
		form {
		color:gray;
		}
		#newUser {
		visibility: collapse;
		}
		#bottomLinks {
		font-size:14px;
		}
		.link{
		color:grey;
		font-weight:bold;
		text-decoration:underline;
		}
		#submit
		{
			color:white;
			font-weight:bold;
			padding:10px;
			border:none;
			cursor: pointer;
			background-color:#1BC700;
		}
		#fbbtn {
			width:250px;
			height:40px;
		}
		.error {
			color:red;
			visibility: collapse;
		}
		</style>
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
				<form action="<?php echo URL::to('user/processlogin')?>" method="POST">
					<table>
						<tr id="name">
							<td>USERNAME
							</td>
						</tr>
						<tr id="name">
							<td><input type="text" class="formElementSpacing" name="userName" id='username' onblur="validateName()"></td>
							<td><label class='error' id='nameError'></label></td>
						</tr>
						<tr id="password">
							<td>PASSWORD: 
							</td>
						</tr>
						<tr id="passwordInput">
							<td><input type="password" class="formElementSpacing" name="password" id='password1' onblur="validatePassword()"></td>
							<td><label class='error' id='pass1Error'></label></td>
						</tr>
					</table>
					<table  id="newUser" >
						<tr><td>RE-TYPE PASSWORD:</td></tr>
						<tr><td>
							<input type="password" class="formElementSpacing" name="newPassword" id='password2'onblur="validateConfirmPassword()"></td>
							<td><label class='error' id='pass2Error'></label></td>
						</tr>
						<tr><td>EMAIL ADDRESS:</td></tr>
						<tr><td>
							<input type="text" class="formElementSpacing" name="newEmail" id='email' onblur="validateEmail()"></td>
							<td><label class='error' id='emailError'></label></td>
						</tr>
					</table>
					
					<table id="bottomLinks">	
						<div class="prompt" id="bottomText" >Don't have an account yet? Create an account 
							<a class="link" href="javascript:newUser()" >here</a>
						</div>
								
						<tr><td id="forgotPassword" class="prompt">Forgot your password? Click 
							<a class="link" href="javascript:forgotPassword()"> here</a>
						</td></tr>
								
						<tr><td>
							<input type="submit" class="button" id="submit" name="submit" value="LOGIN" />
						</td></tr>
					</table>
				</form>
				</div>
			</div>

			<div class="infoBoxMiddle">
				<?php echo HTML::image('img/orDivider.png', 'Divder') ?>
				</a>
			</div>
			
			<div name = "rightBox" class="infoBoxRight">	
				<div class="stuffInside">		
				<a style="padding-left:20px" href="<?php echo URL::to('user/facebooklogin') ?>">
					<img id='fbbtn' src='../img/login-facebook.png'/>
					</a>
				</div>
			</div>
		</div>

		<div class="footer">
			<?php echo render('elements.footer'); ?>
		</div>
	</body>
</html>
