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
 * Password Hash
 */

require '../external/password.php';

/**
 * Process Requests
 */
 
if (isset($_GET["do"], $_POST["username"], $_POST["password"]) && !isset($_SESSION["logged"]) && $_GET["do"] == "login") {
    $username = $secure->purify($_POST["username"]);
    $password = $_POST["password"];
    $find = $db->query("SELECT id, password, banned FROM users WHERE username = '$username' AND oauth_name = '' AND oauth_id = '' LIMIT 1");
    if ($find->num_rows < 1) {
        die("notfound");
    } else {
        $data = $find->fetch_assoc();
        if ($data["banned"] == 1) {
            die("banned");
        } else {
            if (password_verify($password, $data["password"])) {
                $_SESSION["logged"] = $data["id"];
                $db->query("UPDATE users SET status = 1 WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
                if(isset($_SESSION["plugin_callback"])){
                	die($_SESSION["plugin_callback"]);
                } else {
                	die("success");
                }
            } else {
                die("incorrect");
            }
        }
    }
} else if (!isset($_SESSION["logged"]) && isset($_GET["do"], $_POST["username"], $_SESSION["socialcode"], $_SESSION["userprofile"]) && $_GET["do"] == "social") {
    $username = $secure->purify($_POST["username"]);
    $oauth_name = $_SESSION["oauth_name"];
    $social = $_SESSION["userprofile"];
    $socialname = $secure->purify($social["name"]);
    $socialid = $secure->purify($social["id"]);
    $robohash = $get->robohash();
    if (!$secure->checkUsername(str_replace(" ", "#", $username))) {
        die("invalid");
    }
    $check_user = $db->query("SELECT username FROM users WHERE username = '$username' LIMIT 1");
    if ($check_user->num_rows < 1) {
        $social_new = $db->query("INSERT INTO users (position, username, fullname, robohash, language, oauth_name, oauth_id) VALUES (4, '$username', '$socialname', $robohash, '" . $get->system("default_lang") . "', '$oauth_name', '$socialid');");
        if ($social_new) {
            $get_user = $db->query("SELECT id FROM users WHERE id = " . $db->insert_id . " LIMIT 1");
            $udata = $get_user->fetch_assoc();
            $_SESSION["logged"] = $udata["id"];
            $db->query("UPDATE users SET status = 1 WHERE id = " . $_SESSION["logged"] . " LIMIT 1");
            unset($_SESSION["userprofile"]);
            unset($_SESSION["oauth_name"]);
            unset($_SESSION["socialcode"]);
            die("success");
        } else {
            die("error");
        }
    } else {
        die("username");
    }
} else if (!isset($_SESSION["logged"]) && isset($_GET["do"], $_POST["username"], $_POST["fullname"], $_POST["password"], $_POST["email"], $_POST["captcha"]) && $_GET["do"] == "register") {
    $username = $secure->purify($_POST["username"]);
    $fullname = $secure->purify($_POST["fullname"]);
    $email = $secure->purify($secure->washEmail($_POST["email"]));
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $captcha = $secure->purify(str_replace(" ", "", $_POST["captcha"]));
    $robohash = $get->robohash();
    if (isset($_POST["ref"]) && $secure->checkUsername(str_replace(" ", "#", $username))) {
        $ref_username = $secure->purify($_POST["ref"]);
    }
    if (!$secure->checkUsername(str_replace(" ", "#", $username))) {
        die("invalid");
    }
    $check_1 = $db->query("SELECT username FROM users WHERE username = '$username' LIMIT 1");
    $check_2 = $db->query("SELECT email FROM users WHERE email = '$email' LIMIT 1");
    if (empty($username) || empty($fullname) || empty($password) || empty($email) || !isset($_SESSION["captchaCode"])) {
        die("error");
    } else if (isset($_SESSION["captchaCode"]) && strtolower($captcha) !== strtolower($_SESSION["captchaCode"]) OR empty($captcha)) {
        die("captchawrong");
    } else if (!$secure->isEmail($email)) {
        die("notemail");
    } else {
        if ($check_1->num_rows > 0) {
            die("username");
        } else if ($check_2->num_rows > 0) {
            die("email");
        } else {
            $new = $db->query("INSERT INTO users (position, username, password, email, fullname, language, robohash) VALUES (4, '$username', '$password', '$email', '$fullname', '" . $get->system("default_lang") . "', $robohash);");
            $get_new = $db->query("SELECT id FROM users WHERE id = " . $db->insert_id . " LIMIT 1");
            if (isset($_POST["ref"]) && $secure->checkUsername(str_replace(" ", "#", $username))) {
                $ref_user = $db->query("SELECT exp, ref FROM users WHERE username = '$ref_username' LIMIT 1");
                if ($ref_user->num_rows > 0) {
                    $rdata = $ref_user->fetch_assoc();
                    $newexp = $rdata["exp"] + $get->system("exp_ref");
                    $newref = $rdata["ref"] + 1;
                    $db->query("UPDATE users SET exp = $newexp WHERE username = '$ref_username' LIMIT 1");
                    $db->query("UPDATE users SET ref = $newref WHERE username = '$ref_username' LIMIT 1");
                }
            }
            if ($new && $get_new->num_rows > 0) {
                $user_data = $get_new->fetch_assoc();
                $_SESSION["logged"] = $user_data["id"];
                $db->query("UPDATE users SET status = 1 WHERE id = " . $user_data["id"] . " LIMIT 1");
                if(isset($_SESSION["plugin_callback"])){
                	die($_SESSION["plugin_callback"]);
                } else {
                	die("success");
                }
            } else {
                die("error");
            }
        }
    }
} else if (isset($_GET["do"], $_POST["email"], $_POST["captcha"]) && !isset($_SESSION["logged"]) && $_GET["do"] == "forgot") {
    $email = $secure->purify($secure->washEmail($_POST["email"]));
    $captcha = $secure->purify($_POST["captcha"]);
    if (strtolower($captcha) !== strtolower($_SESSION["captchaCode"])) {
        die("captcha");
    }
    if (!$secure->isEmail($email)) {
        die("notemail");
    } else {
        $find = $db->query("SELECT email FROM users WHERE email = '$email' LIMIT 1");
        if ($find->num_rows < 1) {
            die("notfound");
        } else {
            $user = $find->fetch_assoc();
            $_SESSION["forgot_code"] = rand();
            $to = $email;
            $subject = $get->system("site_name") . " Account Retrieval";
            $content = "
				<h3>You requested retrieval for an account with email: " . $email . "</h3>
				<p>To change your password, please go to this link: <a href='" . $get->system("site_url") . "/forgot/new/" . $_SESSION["forgot_code"] . "/" . base64_encode($email) . "'>" . $get->system("site_url") . "/forgot/new/" . $_SESSION["forgot_code"] . "/" . base64_encode($email) . "</a></p>
				<p>If this wasn't requested by you, please feel free to ignore this email.</p>
				<p>Regards, " . $get->system("site_name") . " Team</p>
			";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers.= 'From:' . $get->system("site_name") . ' <do_not_reply_to_this_email>' . "\r\n";
            @mail($to, $subject, $content, $headers);
            die("success");
        }
    }
}
if (isset($_GET["do"], $_POST["email"], $_POST["password"]) && !isset($_SESSION["logged"]) && $_GET["do"] == "forgotnew") {
    $email = $secure->washEmail(base64_decode($_POST["email"]));
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    if (empty($email)) {
        die("error");
    }
    $update = $db->query("UPDATE users SET password = '$password' WHERE email = '$email' LIMIT 1");
    if ($update) {
        $find_user = $db->query("SELECT id FROM users WHERE email = '$email' LIMIT 1");
        $udata = $find_user->fetch_assoc();
        $_SESSION["logged"] = $udata["id"];
        unset($_SESSION["forgot_code"]);
        die("success");
    } else {
        die("error");
    }
} else {
    die("error");
}
/* End */
?>