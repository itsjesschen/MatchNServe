<?php

class Search_Controller extends Base_Controller{
	
	public function action_index(){

		$search_term = Input::get('search-term');
		$search_term = urlencode($search_term);

		$data = array(
			'search_term' => $search_term
		);

		return View::make('search', $data);
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
		 if( isset($_GET['searchterm']) && ("search for" != $_GET['searchterm'])){
		  	$searchterm = $_GET['searchterm'];
		  }

		//assumes number for zipcode
		// if( isset($_GET['zipcode']) && ("zip code" != $_GET['zipcode']) ) {
		//  	$searchterm = $_GET['zipcode'];
		// }
			 if( isset($_GET['distance']) ){
			 	$distance = $_GET['distance'];
			 	$arguments['Location'] = $distance;
			 }
			 if( isset($_GET['skill']) ){
			 	$arguments['Skills'] = $_GET['skill'];
			 }
			 if( isset($_GET['cause']) ){
	 			$arguments['Cause'] = $_GET['cause'];
			 }
			 if( isset($_GET['time']) ){
				$arguments['Time'] = $_GET['time'];
			 }
		 //DATABASE CALL that goes to models/Database.php
		 $data = Database::getProjects($searchterm, $arguments);
		 dd($data);		
	}

}
?>