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

	public function action_deleteProject() 
	{
		$dbLocalhost = mysql_connect("localhost", "root", "root")
		or die("Could not connect: " . mysql_error());
		mysql_select_db("matchserve", $dbLocalhost)
		or die("Could not find database: " . mysql_error());
		$projectId = $_GET['project'];
		$name = Cookie::get('name');
		$query = mysql_query('DELETE FROM projects WHERE projects.ProjectID='.$projectId.);
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