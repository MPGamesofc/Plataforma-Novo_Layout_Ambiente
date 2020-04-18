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
  * Process Requests
  */
  
  if(isset($_SESSION["logged"])){
  	die($sys->go($get->system("site_url")));
  } else {
  	if(isset($_SESSION["userprofile"])){
  		$sdata = $_SESSION["userprofile"];
  		$check_user = $db->query("SELECT * FROM users WHERE oauth_id = '".$sdata["id"]."' LIMIT 1");
  		if($check_user->num_rows > 0){
  			$udata = $check_user->fetch_assoc();
  			$_SESSION["logged"] = $udata["id"];
  			$db->query("UPDATE users SET status = 1 WHERE id = ".$_SESSION["logged"]." LIMIT 1");
  			unset($_SESSION["userprofile"]);
  			unset($_SESSION["oauth_name"]); 			
  			if(isset($_SESSION["plugin_callback"])){
  				die($sys->go($_SESSION["plugin_callback"]));
  			} else {
  				die($sys->go($get->system("site_url")));  				
  			}
  		} else {
  			$_SESSION["socialcode"] = rand();
  			die($sys->go($get->system("site_url") . "/login/newsocial/" . $_SESSION["socialcode"]));
  		}
  	} else {
  		die($sys->go($get->system("site_url") . "/warning"));
  	}
  }
  
/* End */
?>