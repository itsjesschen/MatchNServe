<html>
<head>
<script language="javascript">
function returningUser()
{
	document.getElementById('newUser').style.visibility = "hidden";
	document.getElementById('password').style.visibility = "visible";
	document.getElementById('passwordInput').style.visibility = "visible";
	document.getElementById('submit').value = "LOGIN";
	document.getElementById('forgotPassword').style.visibility = "visible";
	document.getElementById('bottomText').innerHTML = "Don't have an account yet? Create an account <a href='javascript:newUser()' style='font-size:14px;color:grey'>here</a>";
}

function newUser()
{
	document.getElementById('newUser').style.visibility = "visible";
	document.getElementById('password').style.visibility = "visible";
	document.getElementById('passwordInput').style.visibility = "visible";
	document.getElementById('submit').value = "REGISTER";
	document.getElementById('forgotPassword').style.visibility = "hidden";
	document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' style='color:grey'>here</a>";
}
function forgotPassword()
{
	document.getElementById('newUser').style.visibility = "hidden";
	document.getElementById('password').style.visibility = "hidden";
	document.getElementById('passwordInput').style.visibility = "hidden";
	document.getElementById('submit').value = "SUBMIT";
	document.getElementById('forgotPassword').style.visibility = "hidden";
	document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' style='color:grey'>here</a>";
}
</script>
</head>
<title> Registration </title>
<body>
<style type="text/css">
body {
color:grey;
}
.prompt 
{
	font-style:italic;
	color:gray;
	margin-bottom:10px;
}
.formElementSpacing
{
	margin-top:6px;
	background-color:rgb(204,204,204);
	border: none;
	padding:7px;
	width:200px;
}
.rightBox
{
	float:left; 
	height:110px;
	margin-left:40px;
	padding-left:20px;
	border-left:2px solid gray;
}
.orDiv
{
	float:left;
	margin-left:30px; 
	width:200px;
	padding-top:20px;
	height:40px;
}

.bottomRightDiv
{
	float:left;
	margin-left:40px; 
	border-left:2px solid gray;
	height:120px;
}
</style>
<div style = "width:520px">
<div name = "leftBox" style = "float:left;">
<div class = "prompt">
Please fill out the form below to get started
</div>
<form action="../controllers/login.php" style="color:gray" method="post">
<table><tr><td width="270">
<tr><td>
<table style="color:grey"><tr id="name"><td>USERNAME</td></tr>
<tr id="name"><td><input type="text" class="formElementSpacing" name="userName"></td></tr>
<tr id="password"><td>PASSWORD: </td></tr>
<tr id="passwordInput"><td><input type="password" class="formElementSpacing" name="password"></td></tr>
</table style="color:grey;"></td></tr>
<tr><td><table  id="newUser" style="visibility: hidden;color:grey;"><tr><td>RE-TYPE PASSWORD: </td></tr>
<tr><td><input type="password" class="formElementSpacing" name="newPassword"></td></tr>
<tr><td>EMAIL ADDRESS: </td></tr>
<tr><td><input type="text" class="formElementSpacing" name="newEmail"></td></tr>
</table></td>
</tr>
<tr><td><div class="prompt" id="bottomText" style="font-size:14px;">Don't have an account yet? Create an account <a href="javascript:newUser()" style="font-size:14px;color:grey">here</a></div>
<tr><td id="forgotPassword" class="prompt" style="font-size:14px;">Forgot your password? Click <a href="javascript:forgotPassword()" style="font-size:14px;color:gray;"> here</a></td></tr>
<tr><td><input type="submit" class="button" id="submit" name="submit" value="LOGIN" style="background-color:rgb(27,199,0);color:white;font-weight:bold;padding:10px;border:none;cursor: pointer;"/></td></tr>
</table>
</form>
</div>
<div name = "rightBox" class ="rightBox">
</div>
<div name = "Or" class = "orDiv">
Or <a style="padding-left:20px" href="../controllers/facebooklogin.php">
<img src="../../public/img/login-facebook.png"/>
</a>
</div>
<div class = "bottomRightDiv" >
</div>
</div>
</body>
</body>
</html>
