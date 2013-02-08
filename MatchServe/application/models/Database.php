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
		$query = DB::table('projects');
		if ($zipcode!=null){
			$query = $query->where('Location', '=', $zipcode);
 		}
 		if($arguments){
 			 if( isset($arguments['Location']) ){

			 }
			 if( isset($arguments['Skills']) ){
			 }
			 if( isset($arguments['Cause']) ){
			 	// dd($arguments['Cause']);
			 }
			 if( isset($arguments['Time'] ) ){
			 	// dd($arguments['Time']);
			 }
 			// dd($arguments);
 		}
 		if ($searchterm!=null){
			$query = $query->where('Name', 'LIKE','%'.$searchterm.'%')
			->or_where('Details','LIKE','%'.$searchterm.'%');
 		}
		// $query = $query->where('Name', 'LIKE','%'.$searchterm.'%')
		$query = $query->get();
		
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