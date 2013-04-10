<?php
class header_Controller extends Base_Controller 
{

	public function action_index()
	{
		return View::make('header');
	}
	
	public function action_header()
	{
		echo "<script> alert('In here'); window.location.href = \"header\";</script>";
		echo "LAlALA";
		$admins = Database::getAdmins();
		$data = json_encode($data);
		//echo "Data is".$data."";
		dd($data);
		//return $data;	
	}
}
?>