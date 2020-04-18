<?php
/**
 * Arcadia - Arcade Gaming Platform
 * @author Norielle Cruz <http://noriellecruz.com>
 */
 
 /**
  * Start Session
  */
  
  session_start();
  
 /**
  * Require Database
  */
  
  require '../../../../database.php';   
 
 /**
  * Require System Class
  */
  
  require '../../../../sys.class.php';
  
  $sys = new System;
  
 /**
  * Require Get Class
  */
  
  require '../../../../get.class.php';
  
  $get = new Get;  
  
 /**
  * Facebook SDK
  */ 
  
  if(!isset($_SESSION["app"]) OR isset($_SESSION["logged"])){
  	session_unset();  	
  	die($sys->go($get->system("site_url")));
  } else {
  	if($_SESSION["app"] !== "facebook"){
  		session_unset();  		
  		die($sys->go($get->system("site_url")."/warning"));
  	}
  }  
  
  if($get->system("fb_id") == "" || $get->system("fb_secret") == ""){
  	session_unset();
  	die($sys->go($get->system("site_url")."/warning"));
  }
  
  require_once 'autoload.php';    
  use Facebook\FacebookSession; 
  use Facebook\FacebookRedirectLoginHelper; 
  use Facebook\FacebookRequest;
  use Facebook\GraphUser;
  use Facebook\FacebookRequestException;
  
  FacebookSession::setDefaultApplication($_SESSION['fb_appid'], $_SESSION['fb_appsecret']);
	
	$_SESSION['ssa_return_url'] = (isset($_SESSION['ssa_return_url']) ? $_SESSION['ssa_return_url'] : null);
	if( !isset($_SESSION['ssa_return_url'])){
		$_SESSION['ssa_return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	
	}
	
	$helper = new FacebookRedirectLoginHelper($_SESSION['ssa_return_url']);
	
	if(isset($_SESSION['app'])){
		if($_SESSION['app'] == 'facebook'){
			try {
				$session = $helper->getSessionFromRedirect();				
			} catch(FacebookRequestException $ex){
				
			} catch( Exception $ex ) {
			// When validation fails or other local issues			
			}			
		} else {
			die($sys->go($get->system("site_url") . "/warning"));			
		}		
	} else {
		die($sys->go($get->system("site_url") . "/warning"));		
	}
	
	if(isset($session)){
		try {
			$request = new FacebookRequest($session, 'GET', '/me?fields=id, name');
			$response = $request->execute();
			$user = $response->getGraphObject()->asArray();
			$_SESSION["userprofile"] = $user;
			$_SESSION["oauth_name"] = "facebook";
			unset($_SESSION['ssa_return_url']);
			unset($_SESSION['fb_appid']);
			unset($_SESSION['fb_appsecret']);
			die($sys->go($get->system("site_url") . "/system/external/OAuth/process.php"));			
		} catch(FacebookRequestException $e){
			echo "Exception occured, code: " . $e->getCode();
			echo " with message: " . $e->getMessage();	
		}		
	} else {
		die($sys->go($helper->getLoginUrl(array('email'))));		
	}
	
/* End */
?>