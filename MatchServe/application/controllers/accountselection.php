<?php
$dbLocalhost = mysql_connect("localhost", "root", "")
or die("Could not connect: " . mysql_error());
mysql_select_db("matchserve", $dbLocalhost)
or die("Could not find database: " . mysql_error());
    if (isset($_POST['userName']))
	{
		$userName = $_POST['userName'];
		$results = mysql_query("SELECT organizations.Name FROM organizations, admins, users WHERE (users.Name='$userName' AND admins.UserID=users.UserID AND organizations.OrganizationID=admins.OrganizationID)");
			$text = "<html>";
			$text = $text . "<style type='text/css'>";
			$text = $text . ".button {";
			$text = $text . "background-color:rgb(204,204,204);color:rgb(119,119,119);padding:15px;padding-right:20px;padding-left:20px;";
			$text = $text . "}";
			$text = $text . "</style>";
			$text = $text . "<form id='myform' action='http://www.matchandserve.com' method='post'>";
			$text = $text . "<table cellspacing='10px'>";
			$count = 0;
			$text = $text . "<tr><td class='button' onclick=\"clicked('personal')\" align='center'>PERSONAL ACCOUNT</td></tr>";
			while($row = mysql_fetch_assoc($results)) 
			{
				$name = $row['Name'];
				$text = $text . "<tr><td class='button' onclick=\"clicked('$name')\" align='center'>$name</td></tr>";
				$count++;
			}
			if ($count > 0)
			{
				echo $text;
				echo "<tr><td><input type='hidden' name='account' id='account' value=''/></td></tr>";
				echo "<tr><td><input type='hidden' name='name' value='$name'/></td></tr>";
				echo "</table>";
				echo "</form>";
				echo "<script type='text/javascript'>";
				echo "function clicked(name) {";
				echo "document.getElementById('account').value = name;";
				echo "document.getElementById('myform').submit();";
				echo "}";
				echo "</script>";
				echo "</html>";
			}
			else
			{
				header('Location: http://www.matchandserve.com');
			}
		}
?>