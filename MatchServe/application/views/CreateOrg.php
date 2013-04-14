<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php echo Asset::scripts();?>
	<?php echo Asset::container('createorg')->scripts();?>
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
  #tableinformation{
    margin-left:265px;
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
  .dropdown-menu{
    width:225px;
  }
  .dropdown ul input{
    margin:7px;
  }
	.error 
	{
		color:red;
		visibility: collapse;
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
      <td><input id="name" type="text" name="name" placeholder = "Organization Name" defaultValue = "Organization Name" onblur="validateName()" class="inputBox"/> </td>
        <td><label class = "error" id='nameError'>Required</label></td>
      </tr>
      <tr> <td> <input id="address" type="text" name="address" placeholder = "Address"  onblur="validateAddress()"  class="inputBox"> </td> 
      <td><label class = "error" id='addressError'> Required </label></td>
      </tr> 
      <tr>
        <td> <input id="zipcode" type="text" name="zipcode" placeholder = "Zip Code" onblur="validateZipcode()"  class="inputBox"/> </td>
        <td><label class = "error" id='zipcodeError'> Invalid zipcode </label></td>
      </tr>
      <tr>  <td> <input id="phone" type="text" name="phone" placeholder = "Phone" onblur="validatePhone()"  class="inputBox"/>  </td> 
      <td><label class = "error" id='phoneError'> Invalid phone number (digits only) </label></td>
      </tr>
      <tr>  <td> <input id="website" type="text" name="website" placeholder = "Website" onblur="validateWebsite()"  class="inputBox"/> </td>
      <td><label class = "error" id='websiteError'> Invalid website </label></td>
      </tr>
      <tr>  <td> <textarea placeholder = "Mission" id="mission" type="text" name="mission" onblur="validateMission()"></textarea> </td>
      <td><label class = "error" id='missionError'> Mission is required </label></td>
      </tr>
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