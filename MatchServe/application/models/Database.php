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
		
			//'SELECT * FROM projects WHERE Name LIKE '%'.$queryString.'%'
		// Build the inital query for name matching
		$query =  DB::table('projects')
		->where('Name', 'LIKE', '%'.$queryString.'%');
		
		if($arguments) {
			foreach($arguments as $i => $value) {
				$query->where($i, '=', $value);
			}
		}
		
		$query->get();
		
		return $query;
	}
	public static function getProjectTime(){
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