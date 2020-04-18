<div class="product">
	<div class="spec">
		<h4><?php echo $lang["page_head_pending"]; ?></h4>
		<p><?php echo $lang["parts_pending_desc"]; ?></p>
	</div>
	<?php
	$limit = 12;
	$queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games WHERE status = 0 ORDER BY id DESC");
	$resultNum = $queryNum->fetch_assoc();
	$rowCount = $resultNum['gameNum'];
	$config = array('baseURL' => $get->system('site_url') . '/templates/'.$get->system("template").'/ajax/pending_games.php?limit=' . $limit, 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'games-list');
	$pagination = new Pagination($config);
	$query = $db->query("SELECT id FROM games WHERE status = 0 ORDER BY id DESC LIMIT $limit");
	if ($query->num_rows > 0) {
		echo '<div id="games-list">';
		while ($data = $query->fetch_assoc()) {
			$game = $get->game($data["id"], $get->system("smart_cache"));
			$rating = $get->gameStars($game["plays"]);
			$get_user = $db->query("SELECT * FROM users WHERE id = '" . $game["uid"] . "' LIMIT 1");
			$udata = $get_user->fetch_assoc();
			$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
			echo '<div class="col-md-3 pro-1 wow bounceIn game-' . $game["id"] . '">
									<div class="col-m">
									<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
											' . $thumb . '
										</a>
										<div class="mid-1">
											<div class="text-center">
												<h6><a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html">' . $game["name"] . '</a></h6>			
											</div>
											<div class="mid-2">
											  <div class="text-center">
												<h6><i class="fa fa-user"></i> ' . $lang["parts_by_pending"] . ' ' . ucfirst($udata["username"]) . '</h6>
												</div>
											</div> 										
												<div class="add add-2">
												<div class="btn-group">
												<span class="btn btn-sm btn-success" onclick="publishGame(' . $game["id"] . ', ' . $udata["id"] . ')"><i class="fa fa-check"></i> ' . $lang["publish_btn"] . '</span>
												<span class="btn btn-sm btn-danger" onclick="deleteGame(' . $game["id"] . ')"><i class="fa fa-trash"></i> ' . $lang["delete_btn"] . '</span>
												</div>
											</div>
										</div>
									</div>
								</div>';
		}
		echo '<div class="clearfix"></div>
								
							<div class="text-center">	
							' . $pagination->createLinks() . '
							</div> 	 												
							
							</div>';
	} else {
		echo '<div class="alert alert-warning text-center">
	  <h3>' . $lang["error_nogames_pending"] . '</h3>
	  <p class="lead">' . $lang["error_nogames_pending_desc"] . '</p>
	  </div>';
	} ?>
</div>