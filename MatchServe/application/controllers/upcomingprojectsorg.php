<?php

class UpcomingProjectsOrg_Controller extends Base_Controller{
	
	public function action_index()
	{
		return View::make('upcomingprojectsorg');
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

	public function action_deleteProject() 
	{	
		$projectID = $_GET['project'];
		$data = Database::deleteProject($projectID);
		$data = json_encode($data);
		return $data;	
	}

	public function action_approveUser() 
	{	
		$userID = $_GET['user'];
		$projectID = $_GET['project'];
		$data = Database::approveUser($userID, $projectID);
		$data = json_encode($data);
		return $data;	
	}

}
?>