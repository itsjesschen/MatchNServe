<?php

class Database {
	/**********************************ADDERS**************************************/
	public static function addAdmin($OrgID, $UserID){
	}
	public static function addCauses($CauseID, $Description){
	}
	public static function addOrganization($OrgID, $Name){
	}
	public static function addOrgProject($OrgID, $ProjectID){
	}
	public static function addProjects(){
	}
	public static function addProjectTime(){
	}
	public static function addSkills(){
	}
	public static function addTimeSlot(){
	}
	public static function addUserProject(){
	}
	public static function addUser(){
	}

	/**********************************GETTERS**************************************/
	public static function getAdmin($OrgID, $UserID){
	}
	public static function getCauses(){
		$query =  DB::table('causes')->get();
		// ->only('Description');
		return $query;
	}
	public static function getOrganization($OrgID, $Name){
	}
	public static function getOrgProject($OrgID, $ProjectID){
	}
	public static function getProjects($queryString, $arguments){
		
		// Build the inital query for name matching
		$query =  DB::table('projects')
		->where('Name', 'LIKE', '%'.$queryString.'%');
		
		// Add any filter additions as necessary
		$timesQuery = NULL;
		if($arguments) {
			// First, we need to remove the times thing
			if($arguments['time'] != NULL) {
				$times = $arguments['time'];
				
				switch($times) {
					case 'Mornings':
					$query->join('projecttime', 'projecttime.ProjectID', '=', 'projects.ProjectID')
					      ->join('timeslot', 'Time', '<=', 12);
					break;
				case 'Afternoons':
					$query->join('projecttime', 'projecttime.ProjectID', '=', 'projects.ProjectID')
					      ->join('timeslot', function($join) {
							$join->on('Time', '<=', 17);
							$join->and_on('Time', '>', 12);
					      });
					break;
				case 'Evenings':
					$query->join('projecttime', 'projecttime.ProjectID', '=', 'projects.ProjectID')
					      ->join('timeslot', function($join) {
							$join->on('Time', '<=', 24);
							$join->and_on('Time', '>', 17);
					      });
					break;
				}
			}
			
			// Now we take care of all the reugularly formatted filters
			foreach($arguments as $i => $value) {
				$query->where($i, '=', $value);
			}
		}
		
		$query->get();
		
		return $query;
	}
	public static function getProjectTime($times) {
		$query = DB::table('timeslot');
		
		switch($times) {
			case 'Mornings':
				$query->where('Time', '<=', 12);
				break;
			case 'Afternoons':
				$query->where('Time', '<=', 17)
				      ->where('Time', '>', 12);
				break;
			case 'Evenings':
				$query->where('Time', '<=', 24)
				      ->where('Time', '>', 17);
				break;
		}
		
		return $query->get();
	}
	public static function getSkills(){
		$query =  DB::table('skills')->get();
		// ->only('Description');
		return $query;
	}
	public static function getTimeSlot(){
	}
	public static function getUserProject(){
	}
	public static function getUser(){
	}
}