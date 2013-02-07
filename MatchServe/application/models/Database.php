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
	public static function getProjects($searchterm, $arguments){
		// Build the inital query for name matching
	// 	$temp = '%'.$queryString.'%';
	// 	$dbLocalhost = mysql_connect("localhost", "root", "")
 // or die("Could not connect: " . mysql_error());
 // mysql_select_db("matchserve", $dbLocalhost)
 // or die("Could not find database: " . mysql_error());
 // $result = mysql_query("SELECT * FROM projects", $dbLocalhost);
	// 				$count = 0;
	// 				while($row = mysql_fetch_array($result))
	// 				  {
	// 				  $query[$count] = $result['ProjectID'];
	// 				  $count++;
	// 				  }
	// 				  print_r($query);
		$query =  DB::table('projects')->where('Name', 'LIKE','%'.$searchterm.'%')
		->or_where('Details','LIKE','%'.$searchterm.'%')->get();
		//echo 'SELECT * FROM `projects` WHERE `Name` = '$queryString'';
		//$query = DB::query('SELECT * FROM `projects` WHERE `Name` = '.$queryString);
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