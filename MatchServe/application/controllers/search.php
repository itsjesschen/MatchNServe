<?php

class Search_Controller extends Base_Controller{
	
	public function action_index(){

		$search_term = Input::get('search-term');
		$search_term = urlencode($search_term);

		$data = array(
			'zip_code' => $search_term
		);

		return View::make('search', $data);
	}
	// public function action_initoptions(){
	// 	//query database and return a list of skills/causes
	// 	$table = $_GET['table'];
	// 	if ($table === "skills"){
	// 		 $data = Database::getSkills();
	// 		 $data = json_encode($data);
	// 		 return $data;
	// 	}else if($table === "causes"){
	// 		 $data = Database::getCauses();
	// 		 $data = json_encode($data);
	// 		 return $data;
	// 	}else{
	// 		echo "ERROR";
	// 		return;
	// 		//error
	// 	}
	// }
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
		}else if ($table === "both"){
			 $data = Database::getCauses();
			 $data = json_encode($data);
			 $data = Database::getSkills();
			 return $data;
		}else{
			echo "ERROR";
			return;
		}
	}
	public function action_signup(){
		$user = $_POST['uID'];
		$project = $_POST['pID'];
		$data = Database::signup($user, $project);
		return $data;
	}
	public function action_getprojects(){
		$arguments = array();
		$searchterm = null;
		$skills = null;
		$causes = null;
		$times = null;
		//$zipcode = null;
		 if( isset($_GET['searchterm']) && ("search for" != $_GET['searchterm'])){
		  	$searchterm = $_GET['searchterm'];
		  }
			 if( isset($_GET['skill']) ){
			 	$skills = $_GET['skill'];
			 }
			  // dd( isset($_GET['cause']) );
			 if( isset($_GET['cause']) ){
	 			$causes = $_GET['cause'];

			 }
			 if( isset($_GET['time']) ){
				$times = $_GET['time'];
			 } 
		//$searchterm = 'a';
		//$skills = array(1,2,3,4,5,6,7,8,9);
		//$causes = array(9,14);
		 //DATABASE CALL that goes to models/Database.php
		 $data = Database::getProjects($searchterm, $skills, $causes, $times);
		 $data = json_encode($data);
		 return $data;	
	}

}
?>