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
		if (isset($_GET['SaveButton'])) 
		{
		    echo  "SAVE button pressed";
		} 
		else if (isset($_GET['FinishButton'])) 
		{
		    
		} 
		else 
		{
			echo "ERROR";
			//error
		}
	}

}
?>