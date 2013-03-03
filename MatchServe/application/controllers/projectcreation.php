<?php

class ProjectCreation_Controller extends Base_Controller 
{

	public function action_index()
	{
		return View::make('projectcreation');
	}

	public function action_getAdmins()
	{
		//query database and return a list of admins related to the org
		$table = $_GET['table'];
		if ($table === "admins")
		{
			 $data = Database::getAdmin("1"); //TODO, use cookie to find out what the orgID is
			 $data = json_encode($data);
			 return $data;
		}
		else
		{
			echo "ERROR";
			//error
		}
	}

	public function action_getSkills()
	{
		//query database and return a list of skills
		$table = $_GET['table'];
		if ($table === "skills")
		{
			 $data = Database::getSkills(); 
			 $data = json_encode($data);
			 return $data;
		}
		else
		{
			echo "ERROR";
			//error
		}
	}

	public function action_getProjectGoodFors()
	{
		//query database and return a list of things the project is good for
		$table = $_GET['table'];
		if ($table === "projectgoodfor")
		{
			 $data = Database::getPGF(); 
			 $data = json_encode($data);
			 return $data;
		}
		else
		{
			echo "ERROR";
			//error
		}
	}

	public function action_checkSubmit()
	{
		//initialize all the arguments
		$name = null;
		$headline = null;
		$details = null;
		$location = null;
		$spots = null;
		$admin = null;
		$startTime = null;
		$endTime = null;
		$skills = array();
		$pgfs = array();
		$requirements = null;
		$status = null;

		//check to see if Save button was pressed (if it is, it's a draft!)
		if (isset($_GET['SaveButton'])) 
		{
		    $status = 'Draft';
		} 
		else if (isset($_GET['FinishButton']))
		{
			$status = 'Open';
		}
		else
		{
			//if somehow both the finish and save button wasn't pressed, throw the error
			echo "ERROR";
		}

		//gets the project name
	    if( isset($_GET['projectName']) && ("Give your project a name" != $_GET['projectName']))
	    {
	  		$name = $_GET['projectName'];
	  	}
	  	//gets the project headline 
	  	if( isset($_GET['projectHeadline']) && ("What's the jist?" != $_GET['projectHeadline']))
	    {
	  		$headline = $_GET['projectHeadline'];
	  	}
	  	//gets the project description
	  	if( isset($_GET['projectDescription']) && ("Full project description" != $_GET['projectDescription']))
	    {
	  		$details = $_GET['projectDescription'];
	  	}
	  	//gets project location
	  	if( isset($_GET['projectLocation']) && ($_GET['projectLocation'] == '2'))
	    {
	  		$location = $_GET['projectLocation'];
	  	}
	  	//get the max number of volunteers 
	  	if( isset($_GET['projectVolunteerNumber']) && ("How many volunteers are needed?" != $_GET['projectVolunteerNumber']))
	    {
	  		$temp = (int)$_GET['projectVolunteerNumber'];
	  		if(is_int($temp))
	  		{
	  			$spots = $temp;
	  		}
	  	}
	  	//get the admin responsible for this project
	  	if( isset($_GET['admin']))
	    {
	  		$admin = $_GET['admin'];
	  	}
	  	//get the start and ending times
	  	if( isset($_GET['projectStartTime']) && ("Start Time" != $_GET['projectStartTime']))
	    {
	  		$startTime = $_GET['projectStartTime'];
	  	}
	  	if( isset($_GET['projectEndTime']) && ("End Time" != $_GET['projectEndTime']))
	    {
	  		$endTime = $_GET['projectEndTime'];
	  	}
	  	//get the skills associated with this project
		if( isset($_GET['skill']) )
		{
			$skills = $_GET['skill'];
		}
		 //get who the project is good for
		if( isset($_GET['pgf']) )
		{
			$pgfs = $_GET['pgf'];
		}		  	
	  	//get the requirements associated with this project
	  	if( isset($_GET['projectRequirements']) && ("Any requirements?" != $_GET['projectRequirements']))
	    {
	  		$requirements = $_GET['projectRequirements'];
	  	}

		
		 //DATABASE CALL that goes to models/Database.php
		 $success = Database::addProject($name, $headline, $details, $location, $spots, $admin, $startTime, $endTime, $skills, $pgfs, $requirements, $status );
		 echo $success;
	}

}
?>