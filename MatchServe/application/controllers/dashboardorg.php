<?php

class DashboardOrg_Controller extends Base_Controller{
	
	public function action_index(){
		//if user selects personal account from the account selection, display the personal dashboard
		//if user selects organization account, display organization account instead
		return View::make('dashboardorg');
	}
}
?>