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
			$newpicture = null;
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
		$numAdmin = Database::getNumAdmin($account);
		if ($numAdmin > 1) {
			Database::removeAdmin($account, $admin);
			return Redirect::to_action('settings');
		} else
		{
			echo ("<script>
			alert('You cannot remove yourself as an administrator because you are the only administrator presently.  Please add another administrator first.');
			  window.location.href = \"../settings\";
			</script>");
		}
	}
	
	public function action_addadmin() {
		$account = Cookie::get('account');
		$admin = Session::get('admin');
		$result = Database::addAdmin($account, $admin);
		if (!$result) {
			echo ("<script>
			var email=prompt('We were not able to find user. Please enter the email of the administrator you would like to add and we will invite him/her to register.','Email');
			if (email!=null && email!='')
			  {
			  //mail call to go here
			  //<?php mail('?>email<?php', 'Match and Serve: Register', 'Your co-worker  would like to add you to the following organization: . Please register here: www.matchserve.com'); ?>
			  window.location.href = \"../settings\";
			  } else
			  window.location.href = \"../settings\";
			</script>");
		} else {
			return Redirect::to_action('settings');
		}
	}
}

?>