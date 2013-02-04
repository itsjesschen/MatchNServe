<?php

/* This provides all of the business logic of the search page */

class Search_Controller extends Base_Controller{
	
	public function action_index(){

		return View::make('search');
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

		 if( isset($_GET['distance']) ){
		 	$distance = $_GET['distance'];
		 }
		 if( isset($_GET['skill']) ){
		 	$skills = $_GET['skill'];
		 }
		 if( isset($_GET['cause']) ){
 			$causes = $_GET['cause'];
		 }
		 if( isset($_GET['time']) ){
			$availability = $_GET['time'];
		 }
		 //DATABASE CALL that goes to models/Database.php
		 // $data = Database::getProjects();

		 //DEBUGGING PHP for laravel, it might come in handy
		// dd($var_to_debug);

		
	}

}

?>