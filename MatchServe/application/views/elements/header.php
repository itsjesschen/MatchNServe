<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- header containing all the bootstrap calls -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <?php echo Asset::container('bootstrap')->styles();?>
  
</head>

<body>
  <div class="header">
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <a href="<?php echo URL::to('home')?>" class="brand">
            <?php echo HTML::image('img/Title.png', 'Title') ?>
          </a>
          <div class="navheader">
              <ul class="nav">
              
              <?php
                $name = Cookie::get('name');
                if(isset($name))
                {

                    echo "<li class='dropdown'>
  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>" .$name. "<span class='caret'> </span></a>
  <ul class='dropdown-menu' role= 'menu' aria-labelledby= 'dLabel'>
                          <li> <a href = '#'> My Profile </a> </li>
                          <li> <a href = '#'> Karma Points </a> </li>
                          <li> <a href = '#'>History </a> </li>
                          <li> <a href = ".URL::to('settings').">Settings </a> </li>
                          <li> <a href = " . URL::to('user/accountselectioncontroller'). ">Accounts </a> </li>
                          <li> <a href = ". URL::to('createorg').">Add An Org</a> </li>
                          <li> <a href = " . URL::to('user/logout'). ">Logout </a> </li>
                          </ul>
                          </div>
      
                          ";
                }
                else
                {
                  echo "<li> <a href = " .URL::to('user/login'). "> Login/Register </a>";
                }
              ?>
            </li> 
          </ul>
          </div>
      </div>
  </div>
</body>
</html>