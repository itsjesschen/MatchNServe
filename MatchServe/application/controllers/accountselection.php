<?php
class Accountselection_Controller extends Base_Controller{

	function action_index(){
		return View::make('accountselection')->with('names', '$names')->with('userName', '$userName');
	}
	
	function action_accountselection(){
$dbLocalhost = mysql_connect("localhost", "root", "")
or die("Could not connect: " . mysql_error());
mysql_select_db("matchserve", $dbLocalhost)
or die("Could not find database: " . mysql_error());
$userName = Session::get('userName');
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
			/* echo "<html>";
			echo "<form id='myform' action='<?php echo URL::to('accountselection') ?>' method='post'>";
			echo "<input type='hidden' name='userName' value='$userName' />";
			echo $temp;
			echo "</form>";
			echo "<script type='text/javascript'>";
			echo "document.getElementById('myform').submit();";
			echo "</script>";
			echo "</html>"; */
			//return Redirect::to('accountselection/accountselection'), array($userName));
			
			return Redirect::to('accountselection')->with('userName', $userName)->with('names', $names);
		}
		else
		{
			return Redirect::home();
		}
	}
	}
	}
?>