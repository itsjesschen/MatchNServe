<?php 
class Facebook_Controller extends Base_Controller{
     
    function action_index(){
//First part
   $app_id = "458481030884800";
   $app_secret = "dc456813c7fd466e7c9866b8d37682";
   $my_url = "http://matchandserve.com";
  
   session_start();
    
//second part
    $code = $_REQUEST["code"];
  
   if(empty($code)) {
     $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id="
       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
       . $_SESSION['state'] . "&scope=email,read_stream";
  
     echo("<script> top.location.href='" . $dialog_url . "'</script>");
   }
     
    //Sixth part
       if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
     $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
       . "&client_secret=" . $app_secret . "&code=" . $code;
  
     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);
  
     $_SESSION['access_token'] = $params['access_token'];
  
     $graph_url = "https://graph.facebook.com/me?access_token="
       . $params['access_token'];
  
     $user = json_decode(file_get_contents($graph_url));
     echo("Hello " . $user->name);
   }
   else {
     echo("The state does not match. You may be a victim of CSRF.");
   }
   }
   }
 ?>
