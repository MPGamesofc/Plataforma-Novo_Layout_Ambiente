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
  * Twitter SDK
  */
  
  if(!isset($_SESSION["app"]) OR isset($_SESSION["logged"])){
  	session_unset();  	
  	die($sys->go($get->system("site_url")));
  } else {
  	if($_SESSION["app"] !== "twitter"){
  		session_unset();  		
  		die($sys->go($get->system("site_url")."/warning"));
  	}
  }  
  
  if($get->system("tw_id") == "" || $get->system("tw_secret") == ""){
  	session_unset();
  	die($sys->go($get->system("site_url")."/warning"));
  }
  
  require_once 'twitteroauth/twitteroauth.php';
  
  $_SESSION['ssa_return_url'] = (isset($_SESSION['ssa_return_url']) ? $_SESSION['ssa_return_url'] : null);
  if(!isset($_SESSION['ssa_return_url'])){
  	$_SESSION['ssa_return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  	
  }
  
  define('OAUTH_CALLBACK', $_SESSION['ssa_return_url']);
  
  if(isset($_SESSION['oauth_token']) && isset($_SESSION['oauth_token_secret'])){
  	
  	/* If the oauth_token is old redirect to the connect page. */
  	if(isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']){
  		$_SESSION['oauth_status'] = 'oldtoken';
  		die($sys->go($get->system("site_url") . "/system/external/OAuth/logout.php"));  		
  	}
  	
  	/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
  	$connection = new TwitterOAuth($_SESSION['tt_key'], $_SESSION['tt_secret'], $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
  	
  	/* Save the access tokens. Normally these would be saved in a database for future use. */
  	$_SESSION['access_token'] = $connection->getAccessToken($_REQUEST['oauth_verifier']);
  	
  	/* Remove no longer needed request tokens */
  	unset($_SESSION['oauth_token']);
  	unset($_SESSION['oauth_token_secret']);
  	
  	/* If HTTP response is 200 continue otherwise send to connect page to retry */
  	if(200 == $connection->http_code){
  		
  		/* Create a TwitterOauth object with consumer/user tokens. */
  		$connection = new TwitterOAuth($_SESSION['tt_key'], $_SESSION['tt_secret'], $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
  		
  		/* If method is set change API call made. Test is called by default. */
  		$user = $connection->get('account/verify_credentials');  	
  		$_SESSION["userprofile"] = (array) $user;
			$_SESSION["oauth_name"] = "twitter";  		
  		unset($_SESSION['ssa_return_url']);
  		unset($_SESSION['tt_key']);
  		unset($_SESSION['tt_secret']);
  		die($sys->go($get->system("site_url") . "/system/external/OAuth/process.php"));		 		
  	} else {
  		die($sys->go($get->system("site_url") . "/system/external/OAuth/logout.php"));  		
  	}  	
  } else {
  	
  	/* Build TwitterOAuth object with client credentials. */
  	
  	$connection = new TwitterOAuth($_SESSION['tt_key'], $_SESSION['tt_secret']);
  	
  	/* Get temporary credentials. */
  	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);
  	
  	/* Save temporary credentials to session. */
  	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
  	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
  	
  	/* If last connection failed don't display authorization link. */
  	switch($connection->http_code){
  		case 200:
  		
  		/* Build authorize URL and redirect user to Twitter. */
  		die($sys->go($connection->getAuthorizeURL($token)));
  	
  	break;
		default:
		
			/* Show notification if something went wrong. */
			echo 'Could not connect to Twitter. Refresh the page or try again later.';			
		}		
	}
	
/* End */
?>