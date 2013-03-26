<?php

class UpcomingProjectsOrg_Controller extends Base_Controller{
	
	public function action_index()
	{
		return View::make('upcomingprojectsorg');
	}

	public function action_getprojects()
	{
		 $data = Database::getUpcomingProjects();
		 $data = json_encode($data);
		 return $data;	
	}

}
?>