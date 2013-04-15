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
    	$data = " ";
    	if ($name != null && $address!=null && $zipcode != null && $phone != null && $mission != null && $causes[0] != null) 
    	{
    		$orgID = Database::checkIfOrgExists($name);
    		if($orgID == null)
    		{
    			$data = Database::addOrg($name, $address, $zipcode, $phone, $website, $mission, $causes);
    		}
    		else
    		{
    			echo "<script> alert('Organization already exists');
    			window.location.href = \"../createorg\";</script>";
    			return;
    		}
    	}
    	else
    	{
    		echo "<script> alert('Make sure you selected a Cause and entered all fields correctly.');
    		window.location.href = \"../createorg\";</script>";
    		return;
    	}
    	
    	echo "<script> alert('Your Information has been succesfully stored!');
    		window.location.href = \"../user/accountselection\";</script>";
    	
}
}
?>