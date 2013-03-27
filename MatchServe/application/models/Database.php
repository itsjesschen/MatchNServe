<?php

class Database {
	/**********************************ADDERS**************************************/
	public static function addAdmin($org, $user){
		$user1 = '\''.$user.'\'';
		$org1 = '\''.$org.'\'';
		$userid = null;
		$orgid = null;
		$query = DB::query('SELECT UserID as userid FROM users WHERE Name = '.$user1);
		foreach($query as $obj) {
			$userid = $obj->userid;
		}
		$query = DB::query('SELECT OrganizationID as orgid FROM organizations WHERE Name = '.$org1);
		foreach($query as $obj) {
			$orgid = $obj->orgid;
		}
		if ($userid != null && $orgid!=null) {
		//add admin
			$userid = '\''.$userid.'\'';
			$orgid = '\''.$orgid.'\'';
			DB::query('INSERT INTO admins VALUES ('.$orgid.', '.$userid.')');
			return true;
		}
		else {
			//Username not found
			return false;
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
	public static function addProject($name, $headline, $details, $location, $spots, $admin, $startTime, $endTime, $skills, $pgfs, $requirements, $status, $orgName){
		//get the orgID		
		$orgID = DB::table('organizations')
			->where('organizations.Name', '=', $orgName)
			->only('OrganizationID');

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

		//insert into orgproject to keep track of which org owns it
		DB::table('orgproject')->insert(array(
				'OrganizationID' => $orgID,
				'ProjectID' => $newProjectID
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
	public static function signup($user, $project){
		$uID = DB::table('users')->where('name', '=', $user)->only('UserID');
		DB::table('userproject')->insert(array('UserID' => $uID,'ProjectID' => $project ));
		return $uID;
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
	public static function getNumAdmin($org){
		$org1 = '\''.$org.'\'';
		$num = null;
		$query = DB::query('SELECT COUNT(admins.UserID) AS num FROM admins, organizations WHERE organizations.OrganizationID = admins.OrganizationID 
		AND organizations.Name = '.$org1);
		foreach($query as $obj) {
			$num = $obj->num;
		}
		return $num;
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
			$query = DB::query('SELECT projects.ProjectID as pID, projects.Name as Name, projects.Details as Details, projects.Location as Location,  
			projects.Spots as Spots, projects.Requirements as Requirements, projects.Headline as Headline, group_concat(DISTINCT causes.Description SEPARATOR 
			'.$sep.') as Cause, organizations.Name as Organization, group_concat(DISTINCT skills.Description SEPARATOR '.$sep.') as Skills, 
			projects.StartTime as StartTime, projects.EndTime as EndTime, 
			group_concat(DISTINCT projectgoodfor.Description SEPARATOR '.$sep.') as ProjectGoodFor FROM projects, causes, orgproject,
			organizations, projectskill, skills, pgfjoin, projectgoodfor WHERE  
			organizations.CauseID=causes.CauseID and projects.ProjectID=orgproject.ProjectID and orgproject.OrganizationID=organizations.OrganizationID 
			and projects.ProjectID=projectskill.ProjectID and projectskill.SkillID=skills.SkillID and projects.ProjectID=pgfjoin.ProjectID and 
			pgfjoin.PGF_ID=projectgoodfor.PGF_ID and (projects.Name LIKE '.$temp.' or projects.Details LIKE '.$temp.') and 
			projects.Location = '.$zipcode.' GROUP BY projects.ProjectID');
		} else
		{
			$query = DB::query('SELECT projects.ProjectID as pID, projects.Name as Name, projects.Details as Details, projects.Location as Location,  
			projects.Spots as Spots, projects.Requirements as Requirements, projects.Headline as Headline, group_concat(DISTINCT causes.Description SEPARATOR 
			'.$sep.') as Cause, organizations.Name as Organization, group_concat(DISTINCT skills.Description SEPARATOR '.$sep.') as Skills, 
			projects.StartTime as StartTime, projects.EndTime as EndTime, 
			group_concat(DISTINCT projectgoodfor.Description SEPARATOR '.$sep.') as ProjectGoodFor FROM projects, causes, orgproject,
			organizations, projectskill, skills, pgfjoin, projectgoodfor WHERE  
			organizations.CauseID=causes.CauseID and projects.ProjectID=orgproject.ProjectID and orgproject.OrganizationID=organizations.OrganizationID 
			and projects.ProjectID=projectskill.ProjectID and projectskill.SkillID=skills.SkillID and projects.ProjectID=pgfjoin.ProjectID and 
			pgfjoin.PGF_ID=projectgoodfor.PGF_ID and (projects.Name LIKE '.$temp.' or projects.Details LIKE '.$temp.') GROUP BY projects.ProjectID');
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
		}
		else {
		$temp = '\'\'';
		$organization = '\''.$account.'\'';
		$query = DB::query('SELECT users.Name as Name, users.Email as Email, users.Password as Password FROM users WHERE users.Name = '.$name.'
		UNION
		SELECT users.Name as adminName, '.$temp.', '.$temp.' FROM users, organizations, admins
		WHERE organizations.Name = '.$organization.' and users.UserID = admins.UserID and admins.OrganizationID = organizations.OrganizationID');
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
	public static function getUpcomingProjects($orgName){
		//get orgID from name

		$orgID = DB::table('organizations')
			->where('organizations.Name', '=', $orgName)
			->only('OrganizationID');

		$query = DB::table('projects')
		    ->left_join('orgproject', 'projects.ProjectID', '=', 'orgproject.ProjectID')
		    ->left_join('organizations', 'orgproject.OrganizationID', '=', 'organizations.OrganizationID')
			->where('organizations.OrganizationID', '=', $orgID)
		    ->get(array('projects.ProjectID', 'orgproject.OrganizationID', 'projects.Name as ProjectName', 'projects.StartTime', 'projects.Spots', 'organizations.Name as OrgName'));
		return $query;
	}
	public static function getUserProject(){
	}
	public static function getUser(){
	}
	
	public static function removeAdmin($account, $admin) {
		$account = '\''.$account.'\'';
		$admin = '\''.$admin.'\'';
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