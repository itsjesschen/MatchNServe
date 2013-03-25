<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
    <title>Match and Serve - Settings</title>
	<meta name="viewport" content="width=device-width">
    <?php echo Asset::container('bootstrap')->styles();?>
    <?php echo Asset::scripts();?>
    <?php echo Asset::container('settings')->scripts();?>
    <?php echo Asset::styles();?> 

	<style>
    /*If adding css, please designate which file it belongs to by wrapping it in a comment block*/

    /*settings.php START*/

    body {
        margin: 0;
        padding: 0;
    }

    #wrapper{
        width:100%;
        height:auto;
        text-align:center;
        left:50%;
        position:absolute;
        width:1000px;
        min-height:700px;
        margin-left:-500px;
        overflow:hidden;
        padding:10px 0;
    }

    #settings-container {
        width:500px;
        text-align: center;
        margin-left: 40px;
        position:absolute;
        margin-top:-42px;
        padding:3px 0 10px;
        background-color:transparent;
        height:40px;
          /*V1 original, don't delete
            margin-top:-35px;
            background-color:#F5A9A9;
            height:45px;*/
            /*    margin-top:19px;*/
        }

        #settings-query {
            width: 30%;
            color: #888;
        }

        #settings-query, 
        #zip-code{
            margin-top:10px;
        }
        #settings-content{
            height:100px;
        }
        #settings-specifiers-container{
            margin-left:-155px;
            margin-top:15px;
            z-index:1;
            color:#EEEEEE;
            width:1000px;
            height:40px;
            padding:5px;
            float:left;
        }
        /*    border-bottom:1px solid #EEEEEE;*/
    }

    #settings-content {
        width:1000px;
        height:510px;
        margin:0 auto;
        background-color:#FFFFFF;
    }

    #settings-results {
        height:490px;
        width:1000px;
        overflow:auto;
        background-color:#FFFFFF;
    }

    #settingsForm{
        margin:0;
        margin-top:-15px;
        margin-left:250px;
        padding:0;
        height:10px;
        width:1000px;
    }
	h1 {
	font-size:20px;
	font-weight:bold;
	}
	.labelText {
		font-weight: bold;
		width:200px;
	}
	.btnColumn {
		align:right;
	}
table {
  background-color: transparent;
  border-collapse: collapse;
  border-spacing: 0;
  width:90%;
}
#tablestyle {
	width:90%;
}

.table1 {
  margin-bottom: 20px;
  width:90%;
}

.table1 td {
  padding: 8px;
  line-height: 20px;
  text-align: left;
  vertical-align: top;
}
#settingsForm {
	margin-left:0px;
	padding-left:40px;
}
     </style>
	 
	 <script language="javascript">		
			function editUsername() {
				username = document.getElementById('username').innerHTML;
				document.getElementById('username').innerHTML = "<input type='text' class='formElementSpacing' name='username' value='" + username + "'>";
				document.getElementById('usernameLink').innerHTML = "<input type='submit' class='btn' name='save' value='Save'>";
			}
			
			function editEmail() {
				email = document.getElementById('email').innerHTML;
				document.getElementById('email').innerHTML = "<input type='text' class='formElementSpacing' name='email' value='"+ email + "'>";
				document.getElementById('emailLink').innerHTML = "<input type='submit' class='btn' name='save' value='Save'>";
			}
			
			function editPassword() {
				document.getElementById('password').innerHTML = "<input type='password' class='formElementSpacing' name='password'>";
				document.getElementById('passwordLink').innerHTML = "<input type='submit' class='btn' name='save' value='Save'>";
			}
			
			function remove(name){
				document.getElementById('admin').value = name;
				document.getElementById('remove').value = "true";
				alert("Are you sure you want to remove: " + name);
				document.getElementById('settingsForm').submit();
			}
			
			function addadmin() {
				document.getElementById('admintoadd').style.visibility = "visible";
				document.getElementById('add').style.visibility = "visible";
				document.getElementById('empty').style.visibility = "visible";
			}
			
			function add() {
				document.getElementById('remove').value = "add";
				document.getElementById('admin').value = document.getElementById('admintoadd').value;
				document.getElementById('settingsForm').submit();
			}
		</script>
	
</head>
<body>
     <div class="header">
    <?php echo render('elements.header'); ?>
  </div>
    <div class="dashboard">
	</div>
	  <div class="subDashboard">
  </div>
  <div class="workspace">
    <form id="settingsForm" action= <?php echo URL::to('settings/savesettings'); ?> method="post" enctype="multipart/form-data"> 
		<h1>Personal Account Settings</h1>
			<table class="table" id='tablestyle'>
				<?php 
					$data = Session::get('data');
					$data = json_decode($data);
					$account = Cookie::get('account');
					$i = 0;
					if (is_array($data))
					{
						foreach($data as $obj) {
							$name = $obj->name;
							switch($i) {
							case 0:
								$password = $obj->password;
								$email = $obj->email;
								echo "<tr><td class='labelText'>Username</td><td><div id='username'>".$name."</div></td><td><div align='right' id='usernameLink'><a class='link' href='javascript:editUsername()'>Edit</a></div></td></tr>";
								echo "<tr><td class='labelText'>Email</td><td><div id='email'>".$email."</div></td><td><div align='right' id='emailLink'><a class='link' href='javascript:editEmail()'>Edit</a></div></td></tr>";
								echo "<tr><td class='labelText'>Password</td><td><div id='password'></div></td><td><div align='right' id='passwordLink'><a class='link' href='javascript:editPassword()'>Edit</a></div></td></tr>";
								echo "<tr><td></td><td></td><td></td></tr></table>";
								break;
							case 1:
								echo "<h1>".$account ." Account Settings</h1>";
								echo "<table class='table1'><tr class='table'><td class='labelText'>Administrators</td><td>".$name."</td><td><div align='right'><a class='link' href='javascript:void(0)' onclick=\"remove('".$name."')\">Remove</a></div></td></tr>";
								break;
							default:
								echo "<tr><td></td><td>".$name."</td><td class='btnColumn'><div align='right'><a class='link' href='javascript:void(0)' onclick=\"remove('".$name."')\">Remove</a></div></td></tr>";
								break;
							}
							$i++;
						}
						if ($i > 1)
						{
							echo "<tr class='table'><td><a class='link' href='javascript:void(0)' onclick='addadmin()'>Add Administrator</a></td><td></td><td></td></tr>";
							echo "<tr id='add' style='visibility:collapse'><td>Enter the username of the administrator to add:</td><td><input type='text' id='admintoadd'></td><td><div align='right'><a class='link' href='javascript:add()'>Add</a></div></td></tr>";
						}
					}
					?>
					<tr class='table' id='empty' style='visibility:hidden'><td><input type='hidden' name='admin' id='admin' value=''/></td><td></td><td></td></tr>
					<tr><td><input type='hidden' name='remove' id='remove' value='false'/></td></tr>
				</table>	
    </form>
	</div>
	<div class="footer">
  <?php echo render('elements.footer'); ?>
</div>
</body>
</html>