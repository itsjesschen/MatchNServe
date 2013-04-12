<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Match & Serve | Login/Registration Page</title>

		<?php echo Asset::container('bootstrap')->styles();?>
		<?php echo Asset::scripts();?>
		<?php echo Asset::container('login')->scripts();?>
		<script language="javascript">
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
