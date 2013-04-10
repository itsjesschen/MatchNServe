<html>
<head>
	<?php echo Asset::scripts();?>
	<style type='text/css'>
	body 
	{ 
		font-family:Arial;
	}
	.button 
	{
		padding:25px;
		padding-right:60px;
		padding-left:60px;
		cursor: pointer;
		background-color: #777777;
		color:white;
		margin:0 auto;
	}
	.dashboard p{
		font-size: 30px;
		color:white;
		text-align: center;
		margin:25px 80px;
		line-height: 30px;
	}
	.subDashboard p{
		text-align: center;
		margin-top:10px;
	}
	table{
		margin: 0 auto;
	}
	</style>
</head>
<body>
	<div class="header">
		<?php echo render('elements.header'); ?>
	</div>
	<div class="dashboard"><p>Please select an account to continue</p></div>
	<div class="subDashboard"><p>You can change these accounts later on. Just pick one for now</p></div>
	<div class="workspace">
	</br>
	</br>
		<table cellspacing='10px'>
			<form id='myform' action=<?php echo URL::to('user/accountselected'); ?> method='get'>
				<table cellspacing='10px'>
					<tr><td class='button' onclick="clicked('personal')" align='center'>My Personal Account</td></tr>
					<?php 
					$userName = Session::get('userName');
					$names = Session::get('names');
					$names = json_decode($names);
					if (is_array($names))
					{
						foreach($names as $name)
						{
							echo "<tr><td class='button' onclick=\"clicked('$name->name')\" align='center'>$name->name</td></tr>";
						}   
					}
					?>
					<tr><td><input type='hidden' name='account' id='account' value=''/></td></tr>
					<tr><td><input type='hidden' name='userName' value='$userName'/></td></tr>
				</table>
			</form>
		</td></tr></table>
		<script type='text/javascript'>
		function clicked(name) {
			document.getElementById('account').value = name;
			document.getElementById('myform').submit();
		}
		</script>
	</div>
	<div class="footer">
		<?php echo render('elements.footer'); ?>
	</div>

</body>
</html>
