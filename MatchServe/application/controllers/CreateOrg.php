<?php
class CreateOrg_Controller extends Base_Controller 
{

	public function action_index()
	{
		return View::make('createorg');
	}

	public function action_getCauses()
	{
		//query database and return a list of causes
		$table = $_GET['table'];
		if ($table === "causes")
		{
			 $data = Database::getCauses(); 
			 $data = json_encode($data);
			 return $data;
		}
		else
		{
			echo "ERROR";
			//error
		}
	}
	
	public function action_checkSubmit()
	{
		//initialize all the arguments
		$name = null;
		$address = null;
		$zipcode = null;
		$phone = null;
		$website = null;
		$mission = null;
		$causes = array();
		$i = 0;
		
		    $name = $_GET['name']; 
		
			$address = $_GET['address'];
    
    	 	$zipcode = $_GET['zipcode'];
    
    		$phone = $_GET['phone'];
    	
    		$website = $_GET['website'];
    
    		$mission = $_GET['mission'];
    
    		$causes = $_GET['cause'];
    	
    	$data = Database::addOrg($name, $address, $zipcode, $phone, $website, $mission, $causes);
		$data = json_encode($data);
		echo("Your organization's information has been succesfully stored!");
		//return $data;
		
    	
}
}
?>