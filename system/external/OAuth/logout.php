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
  
  session_unset();  
  die($sys->go($get->system("site_url") . "/warning"));
  
/* End */
?>