<?php

class Settings_Controller extends Base_Controller{

	public function action_index(){
		$name = Cookie::get('name');
		$account = Cookie::get('account');
		$data = Database::getSettings($name, $account);
		$data = json_encode($data); 
		Session::put('data', $data);
		return View::make('settings')->with('data', $data);
	}

	public function action_savesettings(){
		$remove = $_POST['remove'];
		if ($remove == "true")
		{
			$admin = $_POST['admin'];
			return Redirect::to_action('settings/removeadmin')->with('admin', $admin);
		} else if ($remove == "add")
		{
			$admin = $_POST['admin'];
			return Redirect::to_action('settings/addadmin')->with('admin', $admin);
		}
		else
		{
			$name = Cookie::get('name');
			$newname = null;
			$newemail = null;
			$newpassword = null;
			if (isset($_POST['username'])) {
				$newname = $_POST['username'];
				Cookie::forget('name');
				Cookie::put('name', $newname, 7200);
			}
			if (isset($_POST['password'])) {
				$newpassword = $_POST['password'];
				$newpassword = md5($newpassword);
			}
			if (isset($_POST['email']))
				$newemail = $_POST['email'];
			Database::setSettings($name, $newname, $newpassword, $newemail);
			return Redirect::to_action('settings');
		}
	}
	
	public function action_removeadmin(){
		$account = Cookie::get('account');
		$admin = Session::get('admin');
		Database::removeAdmin($account, $admin);
		return Redirect::to_action('settings');
	}
	
	public function action_addadmin() {
		$account = Cookie::get('account');
		$admin = Session::get('admin');
		Database::addAdmin($account, $admin);
		return Redirect::to_action('settings');
	}
}

?>