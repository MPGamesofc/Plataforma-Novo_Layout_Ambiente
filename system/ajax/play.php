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
 * System Class
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
 * Language Variable
 */

$lang = $get->language($get->system("default_lang"), "../../languages/");

/**
 * Process Requests
 */

$user = $get->userData($get, $lang, "../../cache/users/");

if (isset($_GET["do"], $_POST["game_id"], $_SESSION["logged"]) && $_GET["do"] == "favorite" && $secure->isNumber($_POST["game_id"])) {
    $uid = $_SESSION["logged"];
    $gid = $secure->purify($_POST["game_id"]);
    $check_game = $db->query("SELECT id FROM games WHERE id = $gid LIMIT 1");
    if ($check_game->num_rows > 0) {
        $find = $db->query("SELECT id FROM favorites WHERE id = $gid AND uid = $uid LIMIT 1");
        if ($find->num_rows > 0) {
            $remove = $db->query("DELETE FROM favorites WHERE id = $gid AND uid = $uid LIMIT 1");
            if ($remove) {
                die('remove');
            } else {
                die('error');
            }
        } else {
            $add = $db->query("INSERT INTO favorites (id, uid) VALUES ('$gid', '$uid');");
            if ($add) {
                die('add');
            } else {
                die('error');
            }
        }
        
    } else {
        die('error');
    }
} else if (isset($_GET["do"], $_POST["game_id"], $_POST["problem"]) && $secure->isNumber($_POST["game_id"]) && $_GET["do"] == "report") {
    $gid = $secure->purify($_POST["game_id"]);
    $problem = $secure->purify($_POST["problem"]);
    if (isset($_SESSION["logged"])) {
        $uid = $_SESSION["logged"];
    } else {
        $uid = 0;
    }
    $check_game = $db->query("SELECT id FROM games WHERE id = $gid LIMIT 1");
    if ($check_game->num_rows > 0) {
        $create = $db->query("INSERT INTO reports (gid, uid, problem) VALUES ('$gid', '$uid', '$problem');");
        if ($create) {
            die("success");
        } else {
            die("error");
        }
    } else {
        die('error');
    }
} else if (isset($_GET["do"], $_POST["game_id"], $_SESSION["logged"]) && $_GET["do"] == "delete" && $secure->isNumber($_POST["game_id"])) {
    $gid = $secure->purify($_POST["game_id"]);
    if ($user["position"] == 4) {
        die("error");
    }
    if (!in_array($user["position"], array(1, 2)) && $user["position"] == 3) {
        $find_user = $db->query("SELECT uid FROM games WHERE id = $gid LIMIT 1");
        if ($find_user->num_rows > 0) {
            $gdata = $find_user->fetch_assoc();
            if ($user["id"] !== $gdata["uid"]) {
                die("error");
            }
        } else {
            die("error");
        }
    }
    $check_game = $db->query("SELECT unique_id, thumb, source FROM games WHERE id = '$gid' LIMIT 1");
    if ($check_game->num_rows > 0) {
        $game_data = $check_game->fetch_assoc();
        @unlink("../../uploads/thumbs/" . $game_data["thumb"]);
        @unlink("../../uploads/games/" . $game_data["source"]);
		$dump = $db->query("INSERT INTO dump (unique_id) VALUES ('".$game_data["unique_id"]."');"); 		
        $delete = $db->query("DELETE FROM games WHERE id = $gid LIMIT 1");
        $delete = $db->query("DELETE FROM lastplayers WHERE gid = $gid");
        $delete = $db->query("DELETE FROM favorites WHERE id = $gid");
        $delete = $db->query("DELETE FROM reports WHERE gid = $gid");
        $delete = $db->query("DELETE FROM comments WHERE gid = $gid");
        $delete = $db->query("DELETE FROM lastplayed WHERE gid = $gid"); 
        if ($delete && $dump) {
            die('success');
        } else {
            die("error");
        }
    } else {
        die("error");
    }
} else if (isset($_GET["do"], $_SESSION["logged"], $_GET["gid"], $_POST["message"]) && $_GET["do"] == "comment" && $secure->isNumber($_GET["gid"])) {
    $game_id = $secure->purify($_GET["gid"]);
    $uid = $_SESSION["logged"];
    $message = $secure->purify($secure->strip($_POST["message"]));
    if (strlen($message) < 5) {
        die("error");
    }
    $find_game = $db->query("SELECT id FROM games WHERE id = $game_id LIMIT 1");
    if ($find_game->num_rows > 0) {
        $add = $db->query("INSERT INTO comments (gid, uid, message) VALUES ('$game_id', '$uid', '$message');");
        if ($add) {
            $cdata_get = $db->query("SELECT date FROM comments WHERE id = " . $db->insert_id . " LIMIT 1");
            $cdata = $cdata_get->fetch_assoc();
            $get_user = $db->query("SELECT id, position, username, exp, avatar, robohash FROM users WHERE id = " . $uid . " LIMIT 1");
            $udata = $get_user->fetch_assoc();
            $position = $get->position($udata["position"], $lang);
            $rank = $get->userRank($udata["exp"], $get->system("exp_game") + $get->system("exp_time"), $lang);
            if (!empty($udata["avatar"])) {
                $avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="' . $get->system("site_url") . '/uploads/avatars/' . $udata["avatar"] . '" class="lazy-avatar b-radius">';
            } else {
                $avatar = $get->avatar($secure->hashed($udata["id"]), $udata["username"], $udata["robohash"], $get->system("default_avatar"), "b-radius", $get);
            }
            $new_exp = $udata["exp"] + $get->system("exp_comment");
            $db->query("UPDATE users SET exp = $new_exp WHERE id = $uid LIMIT 1");
            die(json_encode(array("username" => ucfirst($udata["username"]), "position" => $position, "rank" => $rank, "exp" => $udata["exp"], "date" => $sys->timeAgo($cdata["date"], $lang), "avatar" => $avatar, "message" => base64_encode($secure->strip($secure->printData($sys->smileyCompile($message, $get->system("site_url"))))))));
        } else {
            die("error");
        }
    }
} else if (isset($_GET["do"], $_GET["cid"], $_SESSION["logged"]) && $_GET["do"] == "deletecomment" && $secure->isNumber($_GET["cid"])) {
    $cid = $secure->purify($_GET["cid"]);
    if ($user["position"] == 4) {
        die("error");
    }
    if (!in_array($user["position"], array(1, 2)) && $user["position"] == 3) {
        $find_comment = $db->query("SELECT gid FROM comments WHERE id = $cid LIMIT 1");
        if ($find_comment->num_rows > 0) {
            $cdata = $find_comment->fetch_assoc();
            if ($user["id"] !== $cdata["uid"]) {
                die("error");
            }
        } else {
            die("error");
        }
    }
    $delete = $db->query("DELETE FROM comments WHERE id = $cid LIMIT 1");
    if ($delete) {
        die("success");
    } else {
        die("error");
    }
} else if (isset($_GET["do"], $_SESSION["logged"], $_POST["cid"], $_POST["message"]) && $_GET["do"] == "editcomment" && $secure->isNumber($_POST["cid"])) {
    if ($_SESSION["logged"] == $user["id"] OR in_array($user["position"], array(1, 2))) {
        $cid = $secure->purify($_POST["cid"]);
        $message = $secure->purify($secure->strip($_POST["message"]));
        if (empty($cid) || empty($message)) {
            die("empty");
        }
        $edit = $db->query("UPDATE comments SET message = '$message' WHERE id = $cid LIMIT 1");
        if ($edit) {
            die(json_encode(array("comment" => base64_encode($secure->strip($secure->printData($sys->smileyCompile($message, $get->system("site_url"))))))));
        } else {
            die("error");
        }
    } else {
        die("error");
    }
} else if (isset($_GET["do"], $_SESSION["logged"], $_GET["gid"]) && $_GET["do"] == "newplayer" && $secure->isNumber($_GET["gid"])) {
    $game_id = $secure->purify($_GET["gid"]);
    $find_old = $db->query("SELECT id FROM lastplayers WHERE gid = $game_id AND uid = " . $user["id"] . " LIMIT 1");
    if ($find_old->num_rows > 0) {
        $remove = $db->query("DELETE FROM lastplayers WHERE gid = $game_id AND uid = " . $user["id"] . " LIMIT 1");
        if ($remove) {
            $db->query("INSERT INTO lastplayers (gid, uid) VALUES ($game_id, " . $user["id"] . ");");
        }
    } else {
        $db->query("INSERT INTO lastplayers (gid, uid) VALUES ($game_id, " . $user["id"] . ");");
    }
} else {
    die('error');
}

/* End */
?>