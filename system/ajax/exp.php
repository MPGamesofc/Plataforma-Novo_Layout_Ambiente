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

if (isset($_GET["do"], $_SESSION["logged"]) && $get->system("timer_exp") == 1 && $_GET["do"] == "time") {
    $get_user = $db->query("SELECT exp FROM users WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    $user_data = $get_user->fetch_assoc();
    $user_exp = $user_data["exp"];
    $add_exp = $get->system("exp_time");
    $new_exp = $user_exp + $add_exp;
    $add = $db->query("UPDATE users SET exp = $new_exp WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    if ($add) {
        die("success");
    } else {
        die("error");
    }
} else if (isset($_GET["do"], $_GET["gid"], $_GET["aid"], $_SESSION["logged"]) && $_GET["do"] == "play" && $secure->isNumber($_GET["gid"]) && $secure->isNumber($_GET["aid"])) {
    if ($get->system("gaming_exp") == 1) {
        $game_id = $secure->purify($_GET["gid"]);
        $aid = $secure->purify($_GET["aid"]);
        if (isset($_SESSION["last_game"], $_SESSION["logged"]) && $_SESSION["last_game"] !== $game_id OR !isset($_SESSION["last_game"]) && isset($_SESSION["logged"])) {
            $_SESSION["last_game"] = $game_id;
            $pquery = $db->query("SELECT exp FROM users WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            $pdata = $pquery->fetch_assoc();
            $pnew_exp = $pdata["exp"] + $get->system("exp_game");
            $padd = $db->query("UPDATE users SET exp = $pnew_exp WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            if ($padd) {
                die("success");
            }
            if ($aid !== $_SESSION["logged"]) {
                $aquery = $db->query("SELECT exp FROM users WHERE id = $aid LIMIT 1");
                $adata = $aquery->fetch_assoc();
                $aexp = $get->system("exp_game") / 4;
                $anew_exp = $adata["exp"] + $aexp;
                $aadd = $db->query("UPDATE users SET exp = $anew_exp WHERE id = $aid LIMIT 1");
                if ($aadd) {
                    die("success");
                }
            }
        } else {
            die("error");
        }
    } else {
        die("error");
    }
} else {
    die("error");
}
/* End */
?>