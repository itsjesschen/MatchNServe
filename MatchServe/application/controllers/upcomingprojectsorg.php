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

}
?>