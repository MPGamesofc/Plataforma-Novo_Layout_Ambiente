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

require '../../../system/database.php';

/**
 * Require System Class
 */

require '../../../system/sys.class.php';
$sys = new System;

/**
 * Require Security Class
 */

require '../../../system/security.class.php';
$secure = new Security;

/**
 * Require Get Class
 */

require '../../../system/get.class.php';
$get = new Get;

/**
 * Require Mobile Detect
 */

require '../../../system/external/Mobile_Detect.php';
$device = new Mobile_Detect;

/**
 * Require Check Class
 */

require '../../../system/check.class.php';
$check = new Check;

/**
 * Require Pagination Class
 */

require '../../../system/pagination.class.php';

/**
 * Language Variable
 */

$lang = $get->language($get->system("default_lang"), "../../../languages/");

/**
 * Process Requests
 */

if (isset($_POST['page'])) {
    $start = !empty($_POST['page']) ? $_POST['page'] : 0;
    if ($start > 0) {
        $start2 = $start;
    } else {
        $start2 = 0;
    }
    $limit = $get->system("leaderboard_limit");
    $queryNum = $db->query("SELECT COUNT(*) as userNum FROM users ORDER BY exp DESC");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['userNum'];
    $config = array('baseURL' => $get->system("site_url") . '/templates/'.$get->system("template").'/ajax/leaderboard.php', 'totalRows' => $rowCount, 'currentPage' => $start, 'perPage' => $limit, 'contentDiv' => 'users-list');
    $pagination = new Pagination($config);
    $query = $db->query("SELECT id, username, exp, avatar, robohash FROM users ORDER BY exp DESC LIMIT $start, $limit");
    if ($query->num_rows > 0) {
        while ($user_data = $query->fetch_assoc()) {
            $start2++;
            if ($start2 == 1) {
                $award = "<span class='diamond'><i class='fa fa-trophy'></i> ".$lang["leaderboard_diamond"]."</span> ";
            } else if ($start2 == 2) {
                $award = "<span class='gold'><i class='fa fa-trophy'></i> ".$lang["leaderboard_gold"]."</span> ";
            } else if ($start2 == 3) {
                $award = "<span class='silver'><i class='fa fa-trophy'></i> ".$lang["leaderboard_silver"]."</span> ";
            } else if ($start2 == 4) {
                $award = "<span class='bronze'><i class='fa fa-trophy'></i> ".$lang["leaderboard_bronze"]."</span> ";
            } else {
                $award = "<span>".$lang["leaderboard_top"]." " . $start2 . "</span>";
            }
            if (!empty($user_data["avatar"])) {
                $avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="' . $get->system("site_url") . '/uploads/avatars/' . $user_data["avatar"] . '" class="lazy-avatar b-radius avatar-img">';
            } else {
                $avatar = $get->avatar($secure->hashed($user_data["id"]), $user_data["username"], $user_data["robohash"], $get->system("default_avatar"), "avatar-img b-radius", $get);
            }
            echo '<div class="col-md-2 pro-1 wow bounceIn">
								<div class="col-m col-users text-center">
								<a href="' . $get->system("site_url") . "/user/" . $user_data["username"] . '">
										' . $avatar . '
									</a>
									<div class="mid-1">							
											<h6 class="uc top_users"><i class="fa fa-user"></i> <a href="' . $get->system("site_url") . "/user/" . $user_data["username"] . '">' . $sys->limitString($user_data["username"], 10) . '</a></h6>							
											<h6 class="uc top_users award">' . $award . '</h6>		 	
											<h6 class="uc top_users award" title="'.$lang["exp_title"].'"><i class="fa fa-bolt"></i> ' . number_format($user_data["exp"]) . ' '.$lang["parts_leaderboard_exp"].'</h6>		 	 												 	
									</div>
								</div>
							</div>';
        }
        echo '<div class="clearfix"></div>					
							
						<div class="text-center">	
						' . $pagination->createLinks() . '
						</div>';
    } else {
        echo '<div class="product">
  <div class="alert alert-warning text-center">
  <h3>'.$lang["error_nousers_leaderboard"].'</h3>
  <p class="lead">'.$lang["error_nousers_leaderboard_desc"].'</p>
  </div>
  </div>';
    }
} else {
    die("error");
} ?>