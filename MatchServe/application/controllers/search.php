<?php

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
		$arguments = array();
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
		 dd($arguments);
		 // $arguments = array(
		 // 	'Location' => $distance,
		 // 	'Skills' => $skills,
		 // 	'Cause' => $causes,
		 // 	'Time' => $availability
		 // );
		 //DATABASE CALL that goes to models/Database.php
		 $data = Database::getProjects(null, $arguments);
		 dd($data);
		 //DEBUGGING PHP for laravel, it might come in handy
		// dd($var_to_debug);

		
	}

}
?>