<?php
function generateRandomString($length = 8) {    
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
$dbLocalhost = mysql_connect("localhost", "root", "")
or die("Could not connect: " . mysql_error());
mysql_select_db("database1", $dbLocalhost)
or die("Could not find database: " . mysql_error());

    if (isset($_POST['submit']))
	{
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$newPassword = $_POST['newPassword'];
		if ($userName != null && $userName !="" && ($newPassword == null || $newPassword ==""))
		{
			if ($password != null && $password !="") 
			{
				$result = mysql_query("SELECT Password FROM users WHERE Name='$userName'", $dbLocalhost)
				or die("Your record does not exist." . mysql_error());
				while($row = mysql_fetch_array($result))
				  {
					if ($_POST['password'] == $row['Password'])
					{
					//	cookie::put('name', '$userName', 7200);
						echo "Successful Login";
					}
					else
					{
						echo "Incorrect password!<a href='login.html'>Forgot Password</a>";
					}
				  }
			}
			else 
			{
				$result = mysql_query("SELECT Email FROM users WHERE Name='$userName'", $dbLocalhost)
					or die("Problem reading table: " . mysql_error());
				while($row = mysql_fetch_array($result))
				{
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
			}
		}
		else if ($newPassword!=null && $newPassword !="")
		{
			$email = $_POST['newEmail'];
			$temp1 = mysql_query("SELECT Password FROM users WHERE Name='$userName'", $dbLocalhost)
			if ($temp1 == null) 
			{
				if ($password == $newPassword)
				{
					$sql="insert into users(Name, Email, Password) values('".$userName"','".$email."','".$newPassword."')";
					$result = mysql_query($sql, $dbLocalhost)
					or die("Problem writing to table: " . mysql_error());
					echo "Successfully created new user";
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
?>