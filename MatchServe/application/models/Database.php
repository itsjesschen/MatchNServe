<?php

class Database {
	/**********************************ADDERS**************************************/
	public static function addAdmin($org, $user){
		$user = '\''.$user.'\'';
		$org = '\''.$org.'\'';
		$userid = null;
		$orgid = null;
		$query = DB::query('SELECT UserID as userid FROM users WHERE Name = '.$user);
		foreach($query as $obj) {
			$userid = $obj->userid;
		}
		$query = DB::query('SELECT OrganizationID as orgid FROM organizations WHERE Name = '.$org);
		foreach($query as $obj) {
			$orgid = $obj->orgid;
		}
		if ($userid != null && $orgid!=null) {
			$userid = '\''.$userid.'\'';
			$orgid = '\''.$orgid.'\'';
			DB::query('INSERT INTO admins VALUES ('.$orgid.', '.$userid.')');
		}
		else {
			echo "Username not found";
		}
		//echo "UserID: ".$userid ." OrgID: ".$orgid; 
	}
	public static function addCauses($CauseID, $Description){
	}
	public static function addOrganization($OrgID, $Name){
	}
	public static function addOrg($name, $address, $zipcode, $phone, $website, $mission, $causes)
	{
		$userName = Cookie::get('name');
		if ($name != null && $address!=null && $zipcode != null && $phone != null && $mission != null && $causes != null) {
			$name = '\''.$name.'\'';
			$address = '\''.$address.'\'';
			$zipcode = '\''.$zipcode.'\'';
			$phone = '\''.$phone.'\'';
			$mission = '\''.$mission.'\'';
			//$causes = '\''.$causes.'\'';
			//echo "Causes is".$causes." ";
		    //DB::query('INSERT INTO organizations VALUES ('', '.$name.', '1', '.$address.', '.$zipcode', '.$phone.', '.$website.', '.$mission.')');
		   $orgId = DB::table('organizations')->insert_get_id(array('name' => $name, 'causeId' => $causes[0], 'address' => $address, 'zipcode' => $zipcode, 'website' => $website, 'mission' => $mission  ));
		   $userId = DB::table('users')->where('Name', '=', $userName)->only('UserID');
		   //echo "OrgID and UserIDs are " .$orgId. " " .$userId;
		   DB::table('admins')->insert(array('OrganizationID' => $orgId, 'UserID' => $userId)); 
	}
	}
	public static function addOrgProject($OrgID, $ProjectID){
	}
	public static function addProject($name, $headline, $details, $location, $spots, $admin, $startTime, $endTime, $skills, $pgfs, $requirements, $status){
		//insert new project
		$newProjectID = DB::table('projects')->insert_get_id(array(
				'Name' => $name,
				'Details' => $details,
				'Location' => $location,
				'StartTime' => $startTime,
				'EndTime' => $endTime,
				'Spots' => $spots,
				'Admin' => $admin,
				'Status' => $status,
				'Requirements' => $requirements,
				'Headline' => $headline
			));
		//insert skills associated with that project
		foreach($skills as $newSkill)
		{
			DB::table('projectskill')->insert(array(
					'ProjectID' => $newProjectID,
					'SkillID' => $newSkill
			    ));
		}
		//insert pgfs
		foreach($pgfs as $newPGF)
		{
			DB::table('pgfjoin')->insert(array(
					'ProjectID' => $newProjectID,
					'PGF_ID' => $newPGF
			    ));
		}

		return $newProjectID;
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
	public static function getAdmin($orgName){
		$OrgID = DB::table('organizations')
			->where('organizations.Name', '=', $orgName)
			->only('OrganizationID');

		$query = DB::table('admins')
			->join('users', 'admins.UserID', '=', 'users.UserID')
			->where('OrganizationID', '=', $OrgID)
			->get();
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
	public static function getPGF(){
		$query =  DB::table('projectgoodfor')->get();
		return $query;
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
	
	public static function getSettings($username, $account) {
		$name = '\''.$username.'\'';
		if ($account == 'personal' || $account == null) {
			$query = DB::query('SELECT * FROM users WHERE Name = '.$name);
			//print_r($query);
		}
		else {
		$temp = '\'\'';
		//$name = '\''.$username.'\'';
		$organization = '\''.$account.'\'';
		$query = DB::query('SELECT users.Name as Name, users.Email as Email, users.Password as Password FROM users WHERE users.Name = '.$name.'
		UNION
		SELECT users.Name as adminName, '.$temp.', '.$temp.' FROM users, organizations, admins
		WHERE organizations.Name = '.$organization.' and users.UserID = admins.UserID and admins.OrganizationID = organizations.OrganizationID');
		}
		//print_r($query);
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
	
	public static function removeAdmin($account, $admin) {
		$account = '\''.$account.'\'';
		$admin = '\''.$admin.'\'';
		echo "GETS HERE Account: ".$account." Admin: ".$admin;
		DB::query('DELETE FROM admins WHERE UserID IN (SELECT UserID FROM users WHERE users.Name = '.$admin.') AND OrganizationID IN (SELECT 
		OrganizationID FROM organizations WHERE organizations.Name = '.$account.')');
	}
	
	public static function setSettings($name, $newname, $newpassword, $newemail) {
		$name = '\''.$name.'\'';
		if ($newpassword != null) {
			$newpassword = '\''.$newpassword.'\'';
			DB::query('UPDATE users SET Password='.$newpassword.' WHERE Name='.$name);
		}
		if ($newemail != null) {
			$newemail = '\''.$newemail.'\'';
			DB::query('UPDATE users SET Email='.$newemail.'	WHERE Name='.$name);
		}
		if ($newname != null) {
			$newname = '\''.$newname.'\'';
			DB::query('UPDATE users SET Name='.$newname.' WHERE Name='.$name);
		}
	}
}