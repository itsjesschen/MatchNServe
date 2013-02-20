<?php
class Logout_Controller extends Base_Controller{
function action_index(){
		return View::make('logout');
	}
function action_logout()
{
	Cookie::forget('name');
	echo "Cookie nom nom";
	return Redirect::to_action('home');
}
}
?>