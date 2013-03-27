<html>
<head>
	<title>Match & Serve | Karma Pagee</title>

  <?php echo Asset::container('bootstrap')->styles();?>
  <?php echo Asset::scripts();?>
</head>
<body>
<div class="header">
    <?php echo render('elements.header'); ?>
</div>

<div class="workspace" style="text-align: center">
	<div id="pointsdisplay">
Karma points: <?php 
if ($karma == null){
	echo "0";
}
else{
	echo $karma; 
}?>
</div>

</div>

<div class="footer">
	<?php echo render('elements.footer'); ?>
</div>

</body>
</html>