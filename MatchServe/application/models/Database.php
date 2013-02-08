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
	public static function getProjects($searchterm, $zipcode, $arguments){
		// Build the inital query for name matching

		if ($zipcode!=null){
/* 		    $query = DB::table('projects')
			->where('Location', '=', $zipcode)
			->where(function($query1)
			{
			$query1->where('Name', 'LIKE','%'.$searchterm.'%');
			$query1->or_where('Details','LIKE','%'.$searchterm.'%');
			})
			->get();
			
			// Now we take care of all the reugularly formatted filters
			foreach($arguments as $i => $value) {
				$query->where($i, '=', $value);
			}
 */ 		$query = DB::table('projects')
			->where('Location', 'LIKE', '%'.intval($zipcode/100).'%')
			->where('Name', 'LIKE','%'.$searchterm.'%')
			->or_where('Details','LIKE','%'.$searchterm.'%')
			->get();
 		} else {
			$query =  DB::table('projects')->where('Name', 'LIKE','%'.$searchterm.'%')
			->or_where('Details','LIKE','%'.$searchterm.'%')->get();
		}
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
		
		return $query;
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