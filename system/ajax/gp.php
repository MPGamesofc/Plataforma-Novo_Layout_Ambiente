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
 * Require System Class
 */

require '../sys.class.php';
$sys = new System;

/**
 * Require Security Class
 */

require '../security.class.php';
$secure = new Security;

/**
 * Require Get Class
 */

require '../get.class.php';
$get = new Get;

/**
 * Process Requests
 */

if (isset($_SESSION["logged"], $_GET["gid"])) {
	$id = $_SESSION["logged"];
	$game_id = $_GET["gid"];
	$gp = $get->system("challenge_gp");
	if($get->system("challenge_daily") == 1){
		$get_dgp = $db->query("SELECT dgp FROM users WHERE id = $id LIMIT 1");
		$data = $get_dgp->fetch_assoc();
		$new_dgp = $data["dgp"] + $gp;
		$db->query("UPDATE users SET dgp = $new_dgp WHERE id = $id LIMIT 1");			
	}
	if($get->system("challenge_weekly") == 1){
		$get_wgp = $db->query("SELECT wgp FROM users WHERE id = $id LIMIT 1");
		$data = $get_wgp->fetch_assoc();
		$new_wgp = $data["wgp"] + $gp;
		$db->query("UPDATE users SET wgp = $new_wgp WHERE id = $id LIMIT 1"); 					
	}
	if($get->system("challenge_monthly") == 1){
		$get_mgp = $db->query("SELECT mgp FROM users WHERE id = $id LIMIT 1");
		$data = $get_mgp->fetch_assoc();
		$new_mgp = $data["mgp"] + $gp;
		$db->query("UPDATE users SET mgp = $new_mgp WHERE id = $id LIMIT 1"); 					
	} 	
	die("success");		
} else {
    die("error");
}
/* End */
?>