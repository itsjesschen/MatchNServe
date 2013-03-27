<?php

class DashboardVol_Controller extends Base_Controller{

	public function action_index(){
		//if user selects personal account from the account selection, display the personal dashboard
		//if user selects organization account, display organization account instead
		return View::make('dashboardvol');
	}
	
	public function action_initoptions(){
		//query database and return a list of skills/causes
		$table = $_GET['table'];
		if ($table === "skills"){
			 $data = Database::getSkills();
			 $data = json_encode($data);
			 return $data;
		}else if($table === "causes"){
			 $data = Database::getCauses();
			 $data = json_encode($data);
			 return $data;
		}else{
			echo "ERROR";
			//error
		}
	}
	
	public function action_getprojects(){
		$arguments = array();
		$searchterm = null;
		$zipcode = null;
		//assumes number for zipcode
		 // if( isset($_GET['zipcode']) && ("zip code" != $_GET['zipcode']) ) {
		 //  	$zipcode = $_GET['zipcode'];
		 // }
			 if( isset($_GET['distance']) ){
			 	$distance = $_GET['distance'];
			 	$arguments['Location'] = $distance;
			 }
			 if( isset($_GET['skill']) ){
			 	$arguments['Skills'] = $_GET['skill'];
			 }
			  // dd( isset($_GET['cause']) );
			 if( isset($_GET['cause']) ){

	 			$arguments['Cause'] = $_GET['cause'];

			 }
			 if( isset($_GET['time']) ){
				$arguments['Time'] = $_GET['time'];
			 }
			  // dd($arguments);
		 //DATABASE CALL that goes to models/Database.php
		 $data = Database::getProjects($searchterm, $zipcode, $arguments);
		 $data = json_encode($data);
		 return $data;	
	}
	
	public function action_getrecentprojects() {
		$dbLocalhost = mysql_connect("localhost", "root", "root")
		or die("Could not connect: " . mysql_error());
		mysql_select_db("matchserve", $dbLocalhost)
		or die("Could not find database: " . mysql_error());
		$name = Cookie::get('name');
		$query = mysql_query('SELECT projects.*,organizations.Name as orgname FROM orgproject, organizations, projects, userproject, users WHERE users.Name="'.$name.'" AND userproject.UserID=users.UserID AND userproject.ProjectID=projects.ProjectID AND projects.ProjectID=orgproject.ProjectID AND orgproject.OrganizationID=organizations.OrganizationID', $dbLocalhost);
		$rows = array();
		while($r = mysql_fetch_assoc($query)) {
		    $rows[] = $r;
		}
		echo(json_encode($rows));
	}
	
	public function action_getcheckins() {
		$dbLocalhost = mysql_connect("localhost", "root", "root")
		or die("Could not connect: " . mysql_error());
		mysql_select_db("matchserve", $dbLocalhost)
		or die("Could not find database: " . mysql_error());
		$projectId = $_GET['project'];
		$query = mysql_query('SELECT users.Name,userproject.ProjectID FROM userproject, users WHERE userproject.ProjectID='.$projectId.' AND userproject.UserID = users.UserID');
		$rows = array();
		while($r = mysql_fetch_assoc($query)) {
		    $rows[] = $r;
		}
		echo(json_encode($rows));
	}
	
	public function action_deleteProject() {
		$dbLocalhost = mysql_connect("localhost", "root", "root")
		or die("Could not connect: " . mysql_error());
		mysql_select_db("matchserve", $dbLocalhost)
		or die("Could not find database: " . mysql_error());
		$projectId = $_GET['project'];
		$name = Cookie::get('name');
		$query = mysql_query('DELETE FROM userproject WHERE userproject.ProjectID='.$projectId.' AND EXISTS (SELECT users.UserID FROM users WHERE userproject.UserID=users.UserID AND users.Name="'.$name.'")');
	}
}
?>