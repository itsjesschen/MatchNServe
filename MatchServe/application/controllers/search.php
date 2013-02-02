<?php

class Search_Controller extends Base_Controller{
	
	public function action_index(){

		return View::make('search');
	}
	public function action_initoptions(){
		//query database and return a list of skills/causes
		// echo "GOT INTO INIT";
		// echo "help";
		// $dataArray = array();
		// $data = Database::getSkills();
		// $data = json_encode($data);
		// $dataArray.array_push($data);
		// $data = Database::getCauses();
		// $data = json_encode($data);
		// $dataArray.array_push($data);
		// $dataArray.array_push( json_encode($data) );
		$table = $_GET['table'];
		// return $dataArray;
		if ($table === "skills"){
			 $data = Database::getSkills();
			 $data = json_encode($data);
			 return $data;
		}else if($table === "causes"){
			//TODO
			 $data = Database::getCauses();
			 $data = json_encode($data);
			 return $data;
		}else{
			echo "ERROR";
			//error
		}
	}
}