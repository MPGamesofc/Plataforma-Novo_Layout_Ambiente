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
  
  require '../database.php';
  
 /**
  * Require Get Class
  */
  
  require '../get.class.php';
  
  $get = new Get;
   
 /**
  * Process Requests
  */
  
  header("Content-type: text/javascript");
  
  if(isset($_SESSION["lang_code"])){
  	$lang = json_decode(file_get_contents("../../languages/".$_SESSION["lang_code"].".lang"));
  } else {
  	$lang = json_decode(file_get_contents("../../languages/".$get->system("default_lang").".lang"));  	
  }
  
  foreach($lang as $language => $value){
  	echo 'var lang_'.$language.' = "'.$value.'";';
  	echo "\n";	  	
  }
	
/* End */
?>