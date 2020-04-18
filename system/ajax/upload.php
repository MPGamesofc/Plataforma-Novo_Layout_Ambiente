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
 * Security Class
 */

require '../security.class.php';
$secure = new Security;

/**
 * Get Class
 */

require '../get.class.php';
$get = new Get;

/**
 * Process Requests
 */

$user = $get->userData($get, "../../cache/users/");

if (isset($_SESSION["logged"], $_GET["do"], $_POST["name"], $_POST["category"], $_POST["description"], $_POST["help"], $_POST["width"], $_POST["height"], $_POST["type"], $_POST["mobile"]) && $_GET["do"] == "addgame") {
    $name = $secure->purify($_POST["name"]);
    $category = $secure->purify($_POST["category"]);
    $description = $secure->purify($_POST["description"]);
    $help = $secure->purify($_POST["help"]);
    if (isset($_POST["thumb_url"]) && !empty($_POST["thumb_url"])) {
        $thumb = $secure->washURL($_POST["thumb_url"]);
    }
    if (isset($_POST["source_url"]) && !empty($_POST["source_url"])) {
        $source = $secure->washURL($_POST["source_url"]);
    }
    if ($secure->isNumber(str_replace("px", "", $_POST["width"]))) {
        if (str_replace("px", "", $_POST["width"]) < 450) {
            $width = 450;
        } else {
            $width = $secure->purify(str_replace("px", "", $_POST["width"]));
        }
    } else {
        die("error");
    }
    if ($secure->isNumber(str_replace("px", "", $_POST["height"]))) {
        if (str_replace("px", "", $_POST["height"]) < 350) {
            $height = 350;
        } else {
            $height = $secure->purify(str_replace("px", "", $_POST["height"]));
        }
    } else {
        die("error");
    }
    $type = $secure->purify($_POST["type"]);
    $mobile = $secure->purify($_POST["mobile"]);
    if (!in_array($type, array(1, 2))) {
        die("error");
    }
    if (!in_array($mobile, array(0, 1))) {
        die("error");
    }
    if (empty($name) || empty($category) || empty($description) || empty($help) || empty($width) || empty($height)) {
        die("empty");
    }
    if (!$secure->isNumber($category) || !$secure->isNumber($mobile)) {
        die("error");
    }
    if (isset($_POST["thumb_url"]) && empty($_POST["thumb_url"]) && isset($_FILES["thumb_file"])) {
        $tdirectory = "../../uploads/thumbs/";
        $tname = strtolower(rand(10000, 1000000) . "_" . basename($_FILES["thumb_file"]["name"]));
        $tfile = $tdirectory . $tname;
        $textension = strtolower(pathinfo($tfile, PATHINFO_EXTENSION));
        $isImage = getimagesize($_FILES["thumb_file"]["tmp_name"]);
        if (!$isImage) {
            die("invalidtfile");
        } else {
            if ($_FILES["thumb_file"]["size"] > $get->system("thumb_size")) {
                die("invalidtsize");
            } else if (!in_array($textension, explode(",", str_replace(" ", "", $get->system("thumb_allowed"))))) {
                die("invalidttype");
            } else {
                if (move_uploaded_file($_FILES["thumb_file"]["tmp_name"], $tdirectory.sha1($tname).".".$textension)) {
                    $thumb = sha1($tname).".".$textension;
                } else {
                    die("error");
                }
            }
        }
    }
    if (isset($_POST["source_url"]) && empty($_POST["source_url"]) && isset($_FILES["source_file"])) {
        $gdirectory = "../../uploads/games/";
        $gname = strtolower(rand(10000, 1000000) . "_" . basename($_FILES["source_file"]["name"]));
        $gfile = $gdirectory . $gname;
        $gextension = strtolower(pathinfo($gfile, PATHINFO_EXTENSION));
        if ($_FILES["source_file"]["size"] > $get->system("game_size")) {
            die("invalidgsize");
        } else if (!in_array($gextension, array("html"))) {
            die("invalidgtype");
        } else {
            if (move_uploaded_file($_FILES["source_file"]["tmp_name"], $gdirectory.sha1($gname).".".$gextension)) {
                $source = sha1($gname).".".$gextension;
            } else {
                die("error");
            }
        }
    }
    if (in_array($user["position"], array(1, 2, 3))) {
        $new = $db->query("INSERT INTO games (unique_id, uid, name, status, category, source, description, thumb, width, height, type, mobile, help, plays) VALUES ('" . rand(1000, 1000000) . "_" . strtolower($get->system("site_name")) . "', " . $_SESSION["logged"] . ", '$name', 1, $category, '$source', '$description', '$thumb', '$width', '$height', '$type', '$mobile', '$help', 0);");
    } else {
        $new = $db->query("INSERT INTO games (unique_id, uid, name, status, category, source, description, thumb, width, height, type, mobile, help, plays) VALUES ('" . rand(1000, 1000000) . "_" . strtolower($get->system("site_name")) . "', " . $_SESSION["logged"] . ", '$name', 0, $category, '$source', '$description', '$thumb', '$width', '$height', '$type', '$mobile', '$help', 0);");
    }
    if ($new) {
        die("success");
    } else {
        die("error");
    }
} else if (isset($_SESSION["logged"], $_GET["do"], $_POST["name"], $_POST["category"], $_POST["description"], $_POST["help"], $_POST["width"], $_POST["height"], $_POST["type"], $_POST["mobile"], $_POST["gid"]) && in_array($user["position"], array(1, 2, 3)) && $_GET["do"] == "editgame") {
    $name = $secure->purify($_POST["name"]);
    $category = $secure->purify($_POST["category"]);
    $description = $secure->purify($_POST["description"]);
    $help = $secure->purify($_POST["help"]);
    if (isset($_POST["thumb_url"]) && !empty($_POST["thumb_url"])) {
        $thumb = $secure->washURL($_POST["thumb_url"]);
    }
    if (isset($_POST["source_url"]) && !empty($_POST["source_url"])) {
        $source = $secure->washURL($_POST["source_url"]);
    }
    if ($secure->isNumber(str_replace("px", "", $_POST["width"]))) {
        if (str_replace("px", "", $_POST["width"]) < 450) {
            $width = 450;
        } else {
            $width = $secure->purify(str_replace("px", "", $_POST["width"]));
        }
    } else {
        die("error");
    }
    if ($secure->isNumber(str_replace("px", "", $_POST["height"]))) {
        if (str_replace("px", "", $_POST["height"]) < 350) {
            $height = 350;
        } else {
            $height = $secure->purify(str_replace("px", "", $_POST["height"]));
        }
    } else {
        die("error");
    }
    $type = $secure->purify($_POST["type"]);
    $mobile = $secure->purify($_POST["mobile"]);
    $game_id = $secure->purify($_POST["gid"]);
    if ($user["position"] == 3) {
        $find_game = $db->query("SELECT uid FROM games WHERE id = $game_id LIMIT 1");
        if ($find_game->num_rows > 0) {
            $gdata = $find_game->fetch_assoc();
            if ($user["id"] !== $gdata["uid"]) {
                die("error");
            }
        } else {
            die("error");
        }
    }
    if (!in_array($type, array(1, 2))) {
        die("error");
    }
    if (!in_array($mobile, array(0, 1))) {
        die("error");
    }
    if (empty($name) || empty($category) || empty($description) || empty($help) || empty($width) || empty($height)) {
        die("empty");
    }
    if (!$secure->isNumber($category) || !$secure->isNumber($mobile) || !$secure->isNumber($game_id)) {
        die("error");
    }
    if (isset($_POST["thumb_url"]) && empty($_POST["thumb_url"]) && isset($_FILES["thumb_file"])) {
        $tdirectory = "../../uploads/thumbs/";
        $tname = strtolower(rand(10000, 1000000) . "_" . basename($_FILES["thumb_file"]["name"]));
        $tfile = $tdirectory . $tname;
        $textension = strtolower(pathinfo($tfile, PATHINFO_EXTENSION));
        $isImage = getimagesize($_FILES["thumb_file"]["tmp_name"]);
        if (!$isImage) {
            die("invalidtfile");
        } else {
            if ($_FILES["thumb_file"]["size"] > $get->system("thumb_size")) {
                die("invalidtsize");
            } else if (!in_array($textension, explode(",", str_replace(" ", "", $get->system("thumb_allowed"))))) {
                die("invalidttype");
            } else {
                if (move_uploaded_file($_FILES["thumb_file"]["tmp_name"], $tdirectory.sha1($tname).".".$textension)) {
                    $thumb = sha1($tname).".".$textension;
                } else {
                    die("error");
                }
            }
        }
    }
    if (isset($_POST["source_url"]) && empty($_POST["source_url"]) && isset($_FILES["source_file"])) {
        $gdirectory = "../../uploads/games/";
        $gname = strtolower(rand(10000, 1000000) . "_" . basename($_FILES["source_file"]["name"]));
        $gfile = $gdirectory . $gname;
        $gextension = strtolower(pathinfo($gfile, PATHINFO_EXTENSION));
        if ($_FILES["source_file"]["size"] > $get->system("game_size")) {
            die("invalidgsize");
        } else if (!in_array($gextension, array("html"))) {
            die("invalidgtype");
        } else {
            if (move_uploaded_file($_FILES["source_file"]["tmp_name"], $gdirectory.sha1($gname).".".$gextension)) {
                $source = sha1($gname).".".$gextension;
            } else {
                die("error");
            }
        }
    }
    $edit = $db->query("UPDATE games SET name = '$name', category = $category, description = '$description', help = '$help', thumb = '$thumb', source = '$source', width = $width, height = $height, type = $type, mobile = $mobile WHERE id = $game_id LIMIT 1");
    if ($edit) {
    	   if($get->system("smart_cache") == 1){
        	$sys->clearCache("game", "../../cache/games/", $secure->hashed($game_id));
    	   }
        die("success");
    } else {
        die("error");
    }
} else if (isset($_SESSION["logged"], $_GET["do"], $_FILES["avatar"]) && $_GET["do"] == "avatar") {
    $adirectory = "../../uploads/avatars/";
    $aname = strtolower(rand(10000, 1000000) . "_" . basename($_FILES["avatar"]["name"]));
    $afile = $adirectory . $aname;
    $aextension = strtolower(pathinfo($afile, PATHINFO_EXTENSION));
    $isImage = getimagesize($_FILES["avatar"]["tmp_name"]);
    if (!$isImage) {
        die("invalidafile");
    } else {
        if ($_FILES["avatar"]["size"] > $get->system("avatar_size")) {
            die("invalidasize");
        } else if (!in_array($aextension, explode(",", str_replace(" ", "", $get->system("avatar_allowed"))))) {
            die("invalidatype");
        } else {
            $get_user = $db->query("SELECT avatar FROM users WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            $udata = $get_user->fetch_assoc();
            @unlink($adirectory . $udata["avatar"]);
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $adirectory.sha1($aname).".".$aextension)) {
                $avatar = sha1($aname).".".$aextension;
            } else {
                die("error");
            }
        }
    }
    $new = $db->query("UPDATE users SET avatar = '$avatar' WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    if ($new) {
		$sys->clearCache("user", "../../cache/users/", $secure->hashed($_SESSION["logged"]));
        die(json_encode(array("avatar" => $get->system("site_url") . "/uploads/avatars/" . $avatar)));
    } else {
        die("error");
    }
} else if (isset($_SESSION["logged"], $_GET["do"], $_FILES["cover"]) && $_GET["do"] == "cover") {
    $cdirectory = "../../uploads/covers/";
    $cname = strtolower(rand(10000, 1000000) . "_" . basename($_FILES["cover"]["name"]));
    $cfile = $cdirectory . $cname;
    $cextension = strtolower(pathinfo($cfile, PATHINFO_EXTENSION));
    $isImage = getimagesize($_FILES["cover"]["tmp_name"]);
    if (!$isImage) {
        die("invalidcfile");
    } else {
        if ($_FILES["cover"]["size"] > $get->system("cover_size")) {
            die("invalidcsize");
        } else if (!in_array($cextension, explode(",", str_replace(" ", "", $get->system("cover_allowed"))))) {
            die("invalidctype");
        } else {
            $get_user = $db->query("SELECT cover FROM users WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            $udata = $get_user->fetch_assoc();
            @unlink($cdirectory . $udata["cover"]);
            if (move_uploaded_file($_FILES["cover"]["tmp_name"], $cdirectory.sha1($cname).".".$cextension)) {
                $cover = sha1($cname).".".$cextension;
            } else {
                die("error");
            }
        }
    }
    $new = $db->query("UPDATE users SET cover = '$cover' WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
    if ($new) {
		$sys->clearCache("user", "../../cache/users/", $secure->hashed($_SESSION["logged"]));
        die("success");
    } else {
        die("error");
    }
} else {
    die("error");
}
/* End */
?>