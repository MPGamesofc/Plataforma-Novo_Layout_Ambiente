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
  
  require '../../database.php';  
 
 /**
  * Require System Class
  */
  
  require '../../sys.class.php';
  
  $sys = new System;
  
 
 /**
  * Require Get Class
  */
  
  require '../../get.class.php';
  
  $get = new Get;  
 
 /**
  * Procest Requests
  */  
  
  $index = $get->system("site_url");    
  unset($_SESSION["ssa_return_url"]);
  
  if(isset($_SESSION["userprofile"])){
  	$sys->go($get->system("site_url"));  	
  } else {
  	$_SESSION['app'] = $_GET['app'];
  	
  	require_once 'appconf.php';
  	
  	if(!empty($_SESSION['app'])){
  		if($_SESSION['app'] == 'facebook'){
  			$sys->go($get->system("site_url") . "/system/external/OAuth/platforms/facebook/auth.php");  			
  		} else if($_SESSION['app'] == 'twitter'){
  			$sys->go($get->system("site_url") . "/system/external/OAuth/platforms/twitter/auth.php");  			  			
  		} else if($_SESSION['app'] == 'google'){
  			$sys->go($get->system("site_url") . "/system/external/OAuth/platforms/google/auth.php");  			  			
  		} else {
  			$sys->go($get->system("site_url") . "/warning");			
			}			
		} else {
			$sys->go($get->system("site_url") . "/warning");			
		}		
	}
	
/* End */
?>