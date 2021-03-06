<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Match & Serve | Dashboard Page</title>

  <!--SUPER IMPORTANT: MAKE SURE TO COPY AND PASTE THIS IN EVERY HEADER SO ALL THE INCLUDES CAN TAKE EFFECT IN THE PAGE-->
  <?php echo Asset::container('bootstrap')->styles();?>
  <?php echo Asset::scripts();?>
  <?php echo Asset::styles();?>
  <?php echo Asset::container('dashboardorg')->scripts();?>

  <script>
  </script>

  <style>
  .newdraft{
    padding-left:5px;
    padding-top:10px;
  }
  .upcomingprevious{
    padding-right:4px;
    padding-top:10px;

  }
  </style>

</head>

<!--BEGINNING OF BODY-->
<body>
  <div class="header">
    <?php echo render('elements.header'); ?>
  </div>

  <div class="dashboard">
    <ul style="display: inline-block" class="nav nav-tabs">
      <li class="active"><a href="#upcoming" data-toggle="tab"><img src="img/NextGray.png"></img></br></br>Upcoming</a></li>
      <li><a href="#previous" data-toggle="tab"><img src="img/PreviousGray.png"></img></br></br>Previous</a></li>
      <li><a href="#new" data-toggle="tab"><img src="img/NewGray.png"></img></br></br>New</a></li>
    </ul>
  </div>

  <div class="subDashboard">
  </div>
  <!--
  The important thing here is knowing that each tab calls a different page
-->
<div class="workspace">
  <div class="tab-content">
    <div class="tab-pane active" id="upcoming">
      <?php echo render('upcomingprojectsorg'); ?>
    </div>
    <div class="tab-pane" id="previous">
      <?php echo render('previousprojects'); ?>
    </div>
    <div class="tab-pane" id="new">
      <?php echo render('projectcreation'); ?>
    </div>
  </div>

</div>

<div class="footer">
  <?php echo render('elements.footer'); ?>
</div>
</body>
</html>