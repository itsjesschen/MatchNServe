<?php
$dbLocalhost = mysql_connect("localhost", "root", "")
or die("Could not connect: " . mysql_error());
mysql_select_db("matchserve", $dbLocalhost)
or die("Could not find database: " . mysql_error());
    if (isset($_POST['userName']))
	{
		$userName = $_POST['userName'];
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
			echo "<html>";
			echo "<form id='myform' action='../views/accountSelection.php' method='post'>";
			echo "<input type='hidden' name='userName' value='$userName' />";
			echo $temp;
			echo "</form>";
			echo "<script type='text/javascript'>";
			echo "document.getElementById('myform').submit();";
			echo "</script>";
			echo "</html>";
		}
		else
		{
			header('Location: http://www.matchandserve.com');
		}
	}
?>