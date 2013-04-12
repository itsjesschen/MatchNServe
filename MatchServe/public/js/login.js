function returningUser(){
				document.getElementById('newUser').style.visibility = "collapse";
				document.getElementById('password').style.visibility = "visible";
				document.getElementById('passwordInput').style.visibility = "visible";
				document.getElementById('submit').value = "LOGIN";
				document.getElementById('forgotPassword').style.visibility = "visible";
				document.getElementById('nameError').style.visibility = "hidden";
				document.getElementById('pass1Error').style.visibility = "hidden";
				document.getElementById('pass2Error').style.visibility = "hidden";
				document.getElementById('emailError').style.visibility = "hidden";
				document.getElementById('bottomText').innerHTML = "Don't have an account yet? Create an account <a href='javascript:newUser()' class='link'>here</a>";
				var img = document.getElementById('fbbtn')
				 if ( img ){
				 	img.src = "../img/login-facebook.png";
				 } 
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
				var img = document.getElementById('fbbtn')
				 if ( img ){
				 	img.src = "../img/signup-facebook.png";
				 } 
			}
			function forgotPassword(){
				document.getElementById('newUser').style.visibility = "collapse";
				document.getElementById('password').style.visibility = "collapse";
				document.getElementById('passwordInput').style.visibility = "collapse";
				document.getElementById('submit').value = "SUBMIT";
				document.getElementById('forgotPassword').style.visibility = "collapse";
				document.getElementById('nameError').style.visibility = "hidden";
				document.getElementById('pass1Error').style.visibility = "hidden";
				document.getElementById('pass2Error').style.visibility = "hidden";
				document.getElementById('emailError').style.visibility = "hidden";
				document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' class='link'>here</a>";
				var img = document.getElementById('fbbtn')
				 if ( img ){
				 	img.src = "../img/login-facebook.png";
				 } 
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