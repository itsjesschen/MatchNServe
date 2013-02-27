<?php

class Login_Controller extends Base_Controller{

	function action_index(){
		return View::make('login');
	}

function action_login(){

 	$dbLocalhost = mysql_connect("localhost", "root", "")
 or die("Could not connect: " . mysql_error());
 mysql_select_db("matchserve", $dbLocalhost)
 or die("Could not find database: " . mysql_error());

    if (isset($_POST['submit']))
	{
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$newPassword = $_POST['newPassword'];
		$emailExp = '/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/';
		$newEmail = $_POST['newEmail'];

		if ($userName != null && $userName !="" && ($newPassword == null || $newPassword ==""))
		{
			if ($password != null && $password !="") 
			{
				$result = mysql_query("SELECT Password FROM users WHERE Name='$userName'", $dbLocalhost);
				$count = 0;
					while($row = mysql_fetch_array($result))
					  {
					  $count++;
					  $encryptPassword = md5($password);
						if ($encryptPassword == $row['Password'])
						{
							Cookie::put('name', $userName, 7200);
							/* echo "Successful Login";
							echo "<html>";
							echo "<form id='myform' action='<?php return Redirect::to('accountselection/accountselection'); ?>' method='post'>";
							echo "<input type='hidden' name='userName' value='$userName' />";
							echo "</form>";
							echo "<script type='text/javascript'>";
							echo "document.getElementById('myform').submit();";
							echo "</script>";
							echo "</html>"; */
							return Redirect::to_action('accountselection/accountselection')->with('userName', $userName);
						}
						else
						{
							echo "Incorrect password!";
							$count = 2;
						}
					  }
					  if($count <= 0)
					  {
						echo "Your record does not exist.";
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
					$temp=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
					$email = $row['Email'];
					// The message
					$message = "Dear $userName,\nYour new password is $temp. Please login with the new credentials.\nThank you.";

					// In case any of our lines are larger than 70 characters, we should use wordwrap()
					$message = wordwrap($message, 70);

					// Send
					mail('$email', 'Match and Serve: Forgot Password', $message);
					echo "Email sent";
				}
				 if($count <= 0)
			     {
					echo "Your record does not exist.";
				 }
			}
		}
		else if(!preg_match($emailExp, $newEmail, $m))
		{
			echo "Invalid Email<br/>";
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
					$encryptPassword = md5($newPassword);
					$sql="insert into users(Name, Email, Password) values('$userName','$email','$encryptPassword')";
					$result = mysql_query($sql, $dbLocalhost)
					or die("Problem writing to table: " . mysql_error());
					Cookie::put('name', '$userName', 7200);
					echo "Successfully created new user";
					return Redirect::home();
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