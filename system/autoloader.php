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
  * Error Reporting
  */
  
  error_reporting(E_ALL);
  
 /**
  * Require Database
  */
  
  require 'database.php';
  
 /**
  * Require System Class
  */
  
  require 'sys.class.php';
  $sys = new System;
  
 /**
  * Require Security Class
  */
  
  require 'security.class.php';
  $secure = new Security;
  
 /**
  * Require Get Class
  */
  
  require 'get.class.php';
  $get = new Get;
  
 /**
  * Require Mobile Detect Class
  */
  
  require 'external/Mobile_Detect.php';
  $device = new Mobile_Detect;
  
 /**
  * Require Template Class
  */
  
  require 'template.class.php';
  $print = new Template;
  
 /**
  * Language
  */ 
  
  $lang = $get->language($get->system("default_lang"));  
  
 /**
  * User Data
  */ 
  
  $user = $get->userData($get, $lang);
  
 /**
  * Require Checking Class
  */
  
  require 'check.class.php';
  $check = new Check;
  
 /**
  * Require Pagination Class
  */
  
  require 'pagination.class.php';  

/* End */
?>