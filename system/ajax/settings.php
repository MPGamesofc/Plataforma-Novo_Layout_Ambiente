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
 * Get Class
 */

require '../get.class.php';
$get = new Get;

/**
 * Security Class
 */

require '../security.class.php';
$secure = new Security;

/**
 * Password Function
 */

require '../external/password.php';

/**
 * Process Requests
 */

$user = $get->userData($get, "../../cache/users/");

if (isset($_SESSION["logged"], $_GET["do"], $_POST["fullname"], $_POST["website"], $_POST["quote"], $_POST["fb_link"], $_POST["gp_link"], $_POST["tw_link"], $_POST["about"]) && $_GET["do"] == "settings") {
    $fullname = $secure->purify($_POST["fullname"]);
    $website = $secure->washUrl($_POST["website"]);
    $quote = $secure->purify($_POST["quote"]);
    $fb_link = $secure->purify($_POST["fb_link"]);
    $gp_link = $secure->purify($_POST["gp_link"]);    
    $tw_link = $secure->purify($_POST["tw_link"]);    
    $about = $secure->purify($_POST["about"]);
    if (empty($fullname)) {
        die("fullname");
    }
    $save = $db->query("UPDATE users SET fullname = '$fullname' WHERE id = " . $user["id"] . " LIMIT 1");
    $save = $db->query("UPDATE users SET website = '$website' WHERE id = " . $user["id"] . " LIMIT 1");
    $save = $db->query("UPDATE users SET quote = '$quote' WHERE id = " . $user["id"] . " LIMIT 1");
    $save = $db->query("UPDATE users SET fb_link = '$fb_link' WHERE id = " . $user["id"] . " LIMIT 1");    
    $save = $db->query("UPDATE users SET gp_link = '$gp_link' WHERE id = " . $user["id"] . " LIMIT 1");
    $save = $db->query("UPDATE users SET tw_link = '$tw_link' WHERE id = " . $user["id"] . " LIMIT 1");        
    $save = $db->query("UPDATE users SET about = '$about' WHERE id = " . $user["id"] . " LIMIT 1");
    if ($save) {
    	   if($get->system("smart_cache") == 1){
        	$sys->clearCache("user", "../../../cache/users/", $secure->hashed($_SESSION["logged"]));    	   	
    	   }
        die("success");
    } else {
        die("error");
    }
} else if (isset($_SESSION["logged"], $_GET["do"], $_POST["old_password"], $_POST["new_password"], $_POST["c_new_password"]) && $_GET["do"] == "password") {
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $c_new_password = $_POST["c_new_password"];
    $find_user = $db->query("SELECT password FROM users WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    $get_data = $find_user->fetch_assoc();
    if (!password_verify($old_password, $get_data["password"])) {
        die("oldpassword");
    }
    if ($new_password !== $c_new_password) {
        die("notmatch");
    }
    $new = $db->query("UPDATE users SET password = '" . password_hash($c_new_password, PASSWORD_DEFAULT) . "' WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    if ($new) {
        die("success");
    } else {
        die("error");
    }
} else if (isset($_SESSION["logged"], $_GET["do"], $_POST["new_email"], $_POST["c_new_email"]) && $_GET["do"] == "email" && $secure->isEmail($_POST["new_email"]) && $secure->isEmail($_POST["c_new_email"])) {
    $new_email = $secure->washEmail($_POST["new_email"]);
    $c_new_email = $secure->washEmail($_POST["c_new_email"]);
    if ($new_email !== $c_new_email) {
        die("notmatch");
    }
    $find_email = $db->query("SELECT email FROM users WHERE email = '$c_new_email' LIMIT 1");
    if ($find_email->num_rows > 0) {
        die("notavailable");
    }
    $new = $db->query("UPDATE users SET email = '$c_new_email' WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    if ($new) {
    	   if($get->system("smart_cache") == 1){
        	$sys->clearCache("user", "../../../cache/users/", $secure->hashed($_SESSION["logged"]));    	   	
    	   }    	
        die("success");
    } else {
        die("error");
    }
} else {
    die("error");
}
/* End */
?>