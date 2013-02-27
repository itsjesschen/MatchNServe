<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Match & Serve | Dashboard Page</title>

  <!--SUPER IMPORTANT: MAKE SURE TO COPY AND PASTE THIS IN EVERY HEADER SO ALL THE INCLUDES CAN TAKE EFFECT IN THE PAGE-->
  <?php echo Asset::container('bootstrap')->styles();?>
  <?php echo Asset::scripts();?>

  <script>
  </script>

  <style>
  .projectList{
    width:200px;
  }
  </style>
</head>

<!--BEGINNING OF BODY-->
<body>

  <div class="header">
    <?php echo render('elements.header'); ?>
  </div>

  <div class="dashboard">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#upcoming" data-toggle="tab">Upcoming</a></li>
      <li><a href="#previous" data-toggle="tab">Previous</a></li>
      <li><a href="#new" data-toggle="tab">New</a></li>
      <li><a href="#draft" data-toggle="tab">Draft</a></li>
    </ul>
  </div>

  <div class="subDashboard">
  </div>

  <div class="workspace">
    <div class="tab-content">
      <div class="tab-pane active" id="upcoming">
        <!--this separates the workspace into left and right. The left will contain 
        the projects in a rectangle, and when pressed more information will appear on the right hand side -->
        <div class="projectList">        
        </div>
        <div class="projectInfo">
        </div>
      </div>
      <div class="tab-pane" id="previous">
      </div>
      <div class="tab-pane" id="new">
        <?php echo render('projectcreation'); ?>
      </div>
      <div class="tab-pane" id="draft">
      </div>
    </div>

  </div>

  <div class="footer">
    <?php echo render('elements.footer'); ?>
  </div>
</body>
</html>