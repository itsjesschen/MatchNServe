<?php

class PreviousProjects_Controller extends Base_Controller{
	
	public function action_index()
	{
		return View::make('previousprojects');
	}

	public function action_getProjects()
	{
		$table = $_GET['table'];
		if ($table === "projects")
		{
			$orgName = Cookie::get('account');
			$data = Database::getUpcomingProjects($orgName);
			$data = json_encode($data);
			return $data;	
		}
		else
		{
			echo "ERROR";
			//error
		}
	}

	public function action_getSchedule()
	{
		$table = $_GET['table'];
		if ($table === "userproject")
		{
			$data = Database::getSchedule();
			$data = json_encode($data);
			return $data;	
		}
		else
		{
			echo "ERROR";
			//error
		}
	}
}
?>