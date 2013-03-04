<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php echo Asset::container('bootstrap')->styles();?>
	<?php echo Asset::container('projectcreation')->scripts();?>
	<?php echo Asset::scripts();?>
	<title></title>

	<style type="text/css">

	#presentationtitle{
    text-align: center;
  }

  #tableinformation,
  #projectCreationForm{
    margin:0 auto;
    text-align: center;
  }
  .inputBox{
    width:450px;
  }

  #mission{
    width:450px;
    height:100px;
  }
  .dropdown{
    text-align: left;
    margin-left:310px;
  }

  </style>

</head>

<body>
  <div class="header">
    <?php echo render('elements.header'); ?>
  </div>

  <div class="dashboard">
    
  </div>

  <div class="subDashboard">
    <p id="presentationtitle">Welcome to the Organization Creation. To get started, please fill out the form below</p>
  </div>

  <div class="workspace">
    <form id="projectCreationForm" action=<?php echo URL::to('createorg/checkSubmit'); ?> method="get">
     <table id="tableinformation" border = "0">
       <tr>
        <td><input id="name" type="text" name="name" value = "Organization Name" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)" class="inputBox"/> </td>
      </tr>
      <tr> <td> <input id="address" type="text" name="address" value = "Address" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"  class="inputBox"> </td> </tr>
      <tr>
        <td> <input id="zipcode" type="text" name="zipcode" value = "Zip Code" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"  class="inputBox"/> </td>
      </tr>
      <tr>  <td> <input id="phone" type="text" name="phone" value = "Phone" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"  class="inputBox"/>  </td> </tr>
      <tr>  <td> <input id="website" type="text" name="website" value = "Website" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"  class="inputBox"/> </td> </tr>
      <tr>  <td> <textarea id="mission" type="text" name="mission"  value = "Mission" onclick="fieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"   class="inputBox">Mission </textarea> </td> </tr>
    </table>


    <div id="project-creation-causes-dropdown">
     <div class="dropdown">
       <a class="projectSkillSelector dropdown-toggle" data-toggle="dropdown" href="#"> Select the major cause your organization is associated with
        <span class="caret"></span>
      </a>
      <ul class = "dropdown-menu">
      </ul>
    </div>    
  </div>
  <br/>
  <input type="submit" name="FinishButton" class="btn" value="Submit"/>

</form>
</div>

<div class="footer">
  <?php echo render('elements.footer'); ?>
</div>

</body>
</html>