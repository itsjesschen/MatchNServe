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
	public static function getCauses($CauseID, $Description){
	}
	public static function getOrganization($OrgID, $Name){
	}
	public static function getOrgProject($OrgID, $ProjectID){
	}
	public static function getProjects($arguments){
		$query =  DB::table('projects')
    	->where('id', '=', $id)
	    ->or_where(function($query)
	    {
	        $query->where('Skills', '=', $skills);
	        $query->where('Date', '=', $date);
	    })
    	->get();
		return $query;
	}
	public static function getProjectTime(){
	}
	public static function getSkills(){
	}
	public static function getTimeSlot(){
	}
	public static function getUserProject(){
	}
	public static function getUser(){
	}
	public static function getAdmin($pagelink){
	}
}