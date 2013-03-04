<?php

class User_Controller extends Base_Controller{

function action_index(){
	return View::make('login');
}

function action_login(){
	return View::make('login');
}

function action_processlogin(){

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
							return Redirect::to_action('user/accountselectioncontroller')->with('userName', $userName);
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
					return Redirect::to('dashboardvol');
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


function action_logout()
{
	Cookie::forget('account');
	Cookie::forget('name');
	return Redirect::to_action('home');
}

function action_facebooklogin()
{
	//First part
   $app_id = "458481030884800";
   $app_secret = "dc456813c7fd466e7c9866b8d37682";
   $my_url = "http://matchandserve.com";

   session_start();
   
//second part
	//$code = $_REQUEST['code'];

if(!isset( $_REQUEST["code"] ) ) {
         $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
       . $_SESSION['state'] . "&scope=email,read_stream";

     echo("<script> top.location.href='" . $dialog_url . "'</script>");
} else {
    $code = $_REQUEST["code"];
}
   /*if(empty($code)) {
     $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
       . $_SESSION['state'] . "&scope=email,read_stream";

     echo("<script> top.location.href='" . $dialog_url . "'</script>");
   }*/
	
	//Sixth part
	if(isset( $_REQUEST["code"] ) && isset($_REQUEST['state'] )) {
	    if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) { 
     $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
       . "&client_secret=" . $app_secret . "&code=" . $code;

     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);

     $_SESSION['access_token'] = $params['access_token'];

     $graph_url = "https://graph.facebook.com/me?access_token=" 
       . $params['access_token'];

     $user = json_decode(file_get_contents($graph_url));
     echo("Hello " . $user->name);
   }
   }
   else {
     echo("The state does not match. You may be a victim of CSRF.");
   }
}
function action_accountselection(){
		return View::make('accountselection')->with('names', '$names')->with('userName', '$userName');
	}
	
	function action_accountselectioncontroller(){
		$dbLocalhost = mysql_connect("localhost", "root", "")
		or die("Could not connect: " . mysql_error());
		mysql_select_db("matchserve", $dbLocalhost)
		or die("Could not find database: " . mysql_error());
		$userName = Cookie::get('name');
		if (isset($userName))
		{
			$results = mysql_query("SELECT organizations.Name FROM organizations, admins, users WHERE (users.Name='$userName' AND admins.UserID=users.UserID AND organizations.OrganizationID=admins.OrganizationID)");
			$count = 0;
			$names = array();
			$temp = "";
			while($row = mysql_fetch_assoc($results)) 
			{
				$name = $row['Name'];
				$temp = $temp . "<input type='hidden' name='names[]' value='$name' />";
				$names[$count] = $row['Name'];
				$count++;
			}
			if ($count > 0)
			{				
				return Redirect::to('user/accountselection')->with('userName', $userName)->with('names', $names);
			}
			else
			{
				Cookie::put('account', 'personal', 7200);
				//change to dashboardvolunteer once page is created
				return Redirect::home();
			}
		}
	}
	
	public function action_accountselected(){
		$account = $_GET['account'];
		Cookie::put('account', $account, 7200);
		if ($account == 'personal')
		{
			//change to dashboardvolunteer once page is created
			return Redirect::to('dashboardvol');
		} else {
			return Redirect::to('dashboardorg');
		}
	}

}

?>