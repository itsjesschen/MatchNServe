<?php

class ProjectCreation_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('projectcreation');
	}

	public function action_getAdmin(){
		//query database and return a list of skills/causes
		$table = $_GET['table'];
		if ($table === "admins")
		{
			 $data = Database::getAdmin(1);
			 dd($data);
			 $data = json_encode($data);
			 return $data;
		}
		else
		{
			echo "ERROR";
			//error
		}
	}

	public function action_create()
	{
		/*
		First test on controller
		echo "Hello ";
		echo $_GET['name'];
		echo ". Your age is ";
		echo $_GET['age'];
		*/
	}

}
?>