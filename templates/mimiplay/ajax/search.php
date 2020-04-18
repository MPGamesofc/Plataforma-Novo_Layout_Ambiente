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
    $search = $_GET["s"];
    $limit = $get->system("search_limit");
    if ($check->isMobile()) {
        $queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games WHERE status = 1 AND mobile = 1 AND name LIKE '%".$search."%'");
    } else {
        $queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games WHERE status = 1 AND name LIKE '%".$search."%'");
    }
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['gameNum'];
    $config = array('baseURL' => $get->system("site_url") . '/templates/'.$get->system("template").'/ajax/search.php?s=' . $search, 'totalRows' => $rowCount, 'currentPage' => $start, 'perPage' => $limit, 'contentDiv' => 'games-list');
    $pagination = new Pagination($config);
    if ($check->isMobile()) {
        $query = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 AND name LIKE '%".$search."%' ORDER BY name DESC LIMIT $start, $limit");
    } else {
        $query = $db->query("SELECT id FROM games WHERE status = 1 AND name LIKE '%".$search."%' ORDER BY name DESC LIMIT $start, $limit");
    }
    if ($query->num_rows > 0) {
        while ($data = $query->fetch_assoc()) {
            $game = $get->game($data["id"], $get->system("smart_cache"), "../../../cache/games/");
            $rating = $get->gameStars($game["plays"], "short");
			$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
            echo '<div class="col-md-3 pro-1 wow bounceIn gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
										' . $thumb . '
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html">' . $game["name"] . '</a></h6>							
										</div>
										<div class="mid-2">
										  	<div class="text-center stars">
												<i class="fa fa-star"></i> ' . $rating . '&nbsp;
												<i class="fa fa-area-chart"></i> ' . number_format($game["plays"]) . '
											</div>
											<div class="clearfix"></div>
										</div>
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
  <div class="alert alert-danger text-center">
  <h3>'.$lang["error_nogames_search"].'</h3>
  <p class="lead">'.$lang["error_nogames_search_desc"].'</p>
  </div>
  </div>';
    }
} else {
    die("error");
} ?>