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
				document.getElementById('nameError').style.visibility = "collapse";
				document.getElementById('pass1Error').style.visibility = "collapse";
				document.getElementById('pass2Error').style.visibility = "collapse";
				document.getElementById('emailError').style.visibility = "collapse";
				document.getElementById('bottomText').innerHTML = "Already have an account? Login <a href='javascript:returningUser()' class='link'>here</a>";
				var img = document.getElementById('fbbtn')
				 if ( img ){
				 	img.src = "../img/login-facebook.png";
				 } 
			}
			function validateName() {
				//validate username
				var name = document.getElementById('username').value;
				var error = document.getElementById('nameError');
				if (name==null || name=="")
				{
				  //alert("Username must be filled out.");
				  error.innerHTML = "Username must be filled out.";
				  error.style.visibility = "visible";
				  return false;
				}
				if (name.length <= 8 || name >= 15)
				{
					error.innerHTML = "Username must be greater than 8 and less than 15 characters.";
					error.style.visibility = "visible";
					//alert("Username must be greater than 8 and less than 15 characters.");
					return false;
				}
				//else hide errors
				error.innerHTML = "";
				error.style.visibility = "collapse";
			}
			function validatePassword() {
				//validate password
				var password = document.getElementById('password1').value;
				var error = document.getElementById('pass1Error');
				if (password==null || password=="")
				{
				  //alert("Password must be filled out.");
				  error.innerHTML = "Password must be filled out.";
				  error.style.visibility = "visible";
				  return false;
				}
				if (password.length <= 8 || password.length >= 15)
				{
					//alert("Password must be greater than 8 and less than 15 characters.");
					error.innerHTML = "Password must be greater than 8 and less than 15 characters.";
					error.style.visibility = "visible";
					return false;
				}
				//else hide errors
				error.innerHTML = "";
				error.style.visibility = "collapse";

				validateConfirmPassword();
			}
			function validateConfirmPassword() {
				//validate confirm password
				var password = document.getElementById('password1').value;
				var password2 = document.getElementById('password2').value;
				var error = document.getElementById('pass2Error');
				if (password!=password2)
				{
				  error.innerHTML = "Passwords must match.";
				  error.style.visibility = "visible";
				  //alert("Passwords must match.");
				  return false;
				}
				//else hide errors
				error.innerHTML = "";
				error.style.visibility = "collapse";
			}
			function validateEmail() {
				//validate email
				var email = document.getElementById('email').value;
				var error = document.getElementById('emailError');
				if (email==null || email=="")
				{
				  //alert("Email must be filled out.");
				 error.innerHTML = "Email must be filled out.";
				 error.style.visibility = "visible";
				 return false;
				}
				var atpos=email.indexOf("@");
				var dotpos=email.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
				{
				  error.innerHTML = "Not a valid e-mail address";
				  error.style.visibility = "visible";
				  //alert("Not a valid e-mail address");
				  return false;
				}
				error.innerHTML = "";
				error.style.visibility = "collapse";
			}