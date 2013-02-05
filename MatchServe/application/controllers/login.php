<?php

class Login_Controller extends Base_Controller{

	function action_index(){
		return View::make('login');
	}

function generateRandomString($length = 8) {    
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function action_facebook(){
	facebookLogin::login();
	return View::make('search');
}

function action_login(){

// 	$dbLocalhost = mysql_connect("localhost", "root", "")
// or die("Could not connect: " . mysql_error());
// mysql_select_db("matchserve", $dbLocalhost)
// or die("Could not find database: " . mysql_error());

    if (isset($_POST['submit']))
	{
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$newPassword = $_POST['newPassword'];

		
		if ($userName != null && $userName !="" && ($newPassword == null || $newPassword ==""))
		{
			if ($password != null && $password !="") 
			{
				$result = mysql_query("SELECT Password FROM users WHERE Name='$userName'", $dbLocalhost);
				$count = 0;
					while($row = mysql_fetch_array($result))
					  {
					  $count++;
						if ($_POST['password'] == $row['Password'])
						{
						//	cookie::put('name', '$userName', 7200);
							echo "Successful Login";
							echo "<html>";
							echo "<form id='myform' action='accountselection.php' method='post'>";
							echo "<input type='hidden' name='userName' value='$userName' />";
							echo "</form>";
							echo "<script type='text/javascript'>";
							echo "document.getElementById('myform').submit();";
							echo "</script>";
							echo "</html>";
						}
						else
						{
							echo "Incorrect password! <a href='../views/login.php'>Forgot Password</a>";
							$count = 2;
						}
					  }
					  if($count <= 1)
					  {
						echo "Your record does not exist. <a href='../views/login.php'>Try again</a>";
					  }
			}
			else 
			{
				$result = mysql_query("SELECT Email FROM users WHERE Name='$userName'", $dbLocalhost)
					or die("Problem reading table: " . mysql_error());
					$count = 0;
				while($row = mysql_fetch_array($result))
				{
					$count++;
					$temp=generateRandomString();
					$email = $row['Email'];
					// The message
					$message = "Dear $userName,\nYour new password is $temp. Please login with the new credentials.\nThank you.";

					// In case any of our lines are larger than 70 characters, we should use wordwrap()
					$message = wordwrap($message, 70);

					// Send
					mail('$email', 'Forgot Password', $message);
					echo "Email sent";
				}
				 if($count <= 0)
			     {
					echo "Your record does not exist. <a href='../views/login.php'>Try again</a>";
				 }
			}
		}
		else if ($newPassword!=null && $newPassword !="")
		{
			$email = $_POST['newEmail'];
			$temp1 = mysql_query("SELECT * FROM users WHERE Name='$userName'", $dbLocalhost);
			$count = 0;
			while($row = mysql_fetch_assoc($temp1)) 
			{
				$count++;
			}
			
			if ($count <= 0) 
			{
				if ($password == $newPassword)
				{
					$sql="insert into users(Name, Email, Password) values('$userName','$email','$newPassword')";
					$result = mysql_query($sql, $dbLocalhost)
					or die("Problem writing to table: " . mysql_error());
					echo "Successfully created new user";
					header('Location: http://www.matchandserve.com');
				}
				else
				{
					echo "Passwords did not match.";
				}
			} else
			{
			echo "Username already exists.";
			}
		}
	}
}
}

?>