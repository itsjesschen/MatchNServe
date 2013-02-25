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
	public static function getAdmin($OrgID){
		$query = DB::table('users')->get();
		return $query;
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
		$sep = "', '";
		$temp = '%'.$searchterm.'%';
		$temp = '\''.$temp.'\'';
		if ($zipcode != null) 
		{
			$query = DB::query('SELECT projects.Name as Name, projects.Details as Details, projects.Location as Location, projects.Date as Date, 
			projects.Spots as Spots, projects.Requirements as Requirements, projects.Headline as Headline, group_concat(DISTINCT causes.Description SEPARATOR 
			'.$sep.') as Cause, organizations.Name as Organization, group_concat(DISTINCT skills.Description SEPARATOR '.$sep.') as Skills, 
			group_concat(DISTINCT timeslot.Time SEPARATOR '.$sep.') as Time, group_concat(DISTINCT timeslot.Day SEPARATOR '.$sep.') as Day, 
			group_concat(DISTINCT projectgoodfor.Description SEPARATOR '.$sep.') as ProjectGoodFor FROM projects, projectcause, causes, orgproject,
			organizations, projectskill, skills, projecttime, timeslot, pgfjoin, projectgoodfor WHERE projects.ProjectID=projectcause.ProjectID and 
			projectcause.CauseID=causes.CauseID and projects.ProjectID=orgproject.ProjectID and orgproject.OrganizationID=organizations.OrganizationID 
			and projects.ProjectID=projectskill.ProjectID and projectskill.SkillID=skills.SkillID and projects.ProjectID=projecttime.ProjectID and 
			projecttime.TS_ID=timeslot.TS_ID and projects.ProjectID=pgfjoin.ProjectID and pgfjoin.PGF_ID=projectgoodfor.PGF_ID and (projects.Name LIKE 
			'.$temp.' or projects.Details LIKE '.$temp.') and projects.Location = '.$zipcode.' GROUP BY projects.ProjectID');
		} else
		{
			$query = DB::query('SELECT projects.Name as Name, projects.Details as Details, projects.Location as Location, projects.Date as Date, 
			projects.Spots as Spots, projects.Requirements as Requirements, projects.Headline as Headline, group_concat(DISTINCT causes.Description SEPARATOR 
			'.$sep.') as Cause, organizations.Name as Organization, group_concat(DISTINCT skills.Description SEPARATOR '.$sep.') as Skills, 
			group_concat(DISTINCT timeslot.Time SEPARATOR '.$sep.') as Time, group_concat(DISTINCT timeslot.Day SEPARATOR '.$sep.') as Day, 
			group_concat(DISTINCT projectgoodfor.Description SEPARATOR '.$sep.') as ProjectGoodFor FROM projects, projectcause, causes, orgproject,
			organizations, projectskill, skills, projecttime, timeslot, pgfjoin, projectgoodfor WHERE projects.ProjectID=projectcause.ProjectID and 
			projectcause.CauseID=causes.CauseID and projects.ProjectID=orgproject.ProjectID and orgproject.OrganizationID=organizations.OrganizationID 
			and projects.ProjectID=projectskill.ProjectID and projectskill.SkillID=skills.SkillID and projects.ProjectID=projecttime.ProjectID and 
			projecttime.TS_ID=timeslot.TS_ID and projects.ProjectID=pgfjoin.ProjectID and pgfjoin.PGF_ID=projectgoodfor.PGF_ID and (projects.Name LIKE 
			'.$temp.' or projects.Details LIKE '.$temp.') GROUP BY projects.ProjectID');
		}
		/*$query = DB::table('projects');
		$query = $query->join('projectcause', 'projects.ProjectID', '=', 'projectcause.ProjectID');
		$query = $query->join('causes', 'projectcause.CauseID', '=', 'causes.CauseID');
		$query = $query->join('orgproject', 'projects.ProjectID', '=', 'orgproject.ProjectID');
		$query = $query->join('organizations', 'orgproject.OrganizationID', '=', 'organizations.OrganizationID');
		$query = $query->join('projectskill', 'projects.ProjectID', '=', 'projectskill.ProjectID');
		$query = $query->join('skills', 'projectskill.SkillID', '=', 'skills.SkillID');
		$query = $query->join('projecttime', 'projects.ProjectID', '=', 'projecttime.ProjectID');
		$query = $query->join('timeslot', 'projecttime.TS_ID', '=', 'timeslot.TS_ID');
		$query = $query->join('pgfjoin', 'projects.ProjectID', '=', 'pgfjoin.ProjectID');
		$query = $query->join('projectgoodfor', 'pgfjoin.PGF_ID', '=', 'projectgoodfor.PGF_ID');
		if ($zipcode!=null){
			$query = $query->where('projects.Location', '=', $zipcode);
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
			$query = $query->where('projects.Name', 'LIKE','%'.$searchterm.'%')
			->or_where('projects.Details','LIKE','%'.$searchterm.'%');
 		}
		//$query = $query->where('projects.Status', '=', 'Open');
		//$query = $query->get(array('projects.Name as Name', 'projects.Details as Details', 'projects.Location as Location', 'projects.Date as Date', 'projects.Spots as Spots', 'projects.Requirements as Requirements', 'projects.Headline as Headline'));
		//$query = $query->get(array('projects.Name as Name', 'projects.Details as Details', 'projects.Location as Location', 'projects.Date as Date', 'projects.Spots as Spots', 'projects.Requirements as Requirements', 'projects.Headline as Headline', 'causes.Description as Cause', 'organizations.Name as Organization', 'skills.Description as Skills'));
		$query = $query->get(array('projects.Name as Name', 'projects.Details as Details', 'projects.Location as Location', 'projects.Date as Date', 'projects.Spots as Spots', 'projects.Requirements as Requirements', 'projects.Headline as Headline', 'causes.Description as Cause', 'organizations.Name as Organization', 'skills.Description as Skills', 'timeslot.Time as Time', 'timeslot.Day as Day', 'projectgoodfor.Description as ProjectGoodFor'));
		//$query = $query->get();*/
		
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