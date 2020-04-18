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
 * Require Autoloader
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
 
if(isset($_GET["do"]) && $_GET["do"] == "online"){
	$find_online = $db->query("SELECT status FROM users WHERE status = 1");
	$online_now = $find_online->num_rows;	    				
	echo $online_now;    	
} else if (isset($_GET["do"]) && $_GET["do"] == "kill") {
    $get_users = $db->query("SELECT id, activity FROM users WHERE status = 1");
    while ($victim = $get_users->fetch_assoc()) {
		$v_activity = time() - $victim["activity"];
        if ($v_activity > (3000)) {
            $db->query("UPDATE users SET status = 0 WHERE id = " . $victim["id"] . " LIMIT 1");
        }
    }
    die("killed");
} else if (isset($_SESSION["logged"], $_SESSION["status"])) {
    if (isset($_GET["do"]) && $_GET["do"] == "new") {
        $_SESSION["status"] = time();
        die("online");
    } else {
        if (time() - $_SESSION["status"] <= (300)) {
            $time = time();
            $db->query("UPDATE users SET status = 1 WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            $db->query("UPDATE users SET activity = $time WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            die("online");
        } else {
            $db->query("UPDATE users SET status = 0 WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            die("offline");
        }
    }
} else {
	die("error");
}

/* End */
?>