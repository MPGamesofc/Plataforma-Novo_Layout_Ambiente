<div class="featured-container" id="featured">
			<div class="tab-head">				
				<div class="tab-content">
				
					<div class="tab-pane active" id="tab1">					
						<?php
						$category = $cats[0];
						$limit = $get->system("featured_limit");
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
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
						?>						
					</div>
					
					<div class="tab-pane" id="tab2">					
						<?php
						$category = $cats[1];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
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
						?>
					</div>
					
					<div class="tab-pane" id="tab3">		
						<?php
						$category = $cats[2];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
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
						?>
					</div>
					
					<div class="tab-pane" id="tab4">		
						<?php
						$category = $cats[3];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
														<div class="col-m">
														<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
															<span class="gamepad"></span>	
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
						?>		
					</div>		

					<div class="tab-pane" id="tab5">		
						<?php
						$category = $cats[4];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
														<div class="col-m">
														<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
															<span class="gamepad"></span>	
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
						?>		
					</div>		

					<div class="tab-pane" id="tab6">		
						<?php
						$category = $cats[5];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
														<div class="col-m">
														<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
															<span class="gamepad"></span>	
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
						?>		
					</div>		
					
					<div class="tab-pane" id="tab7">		
						<?php
						$category = $cats[6];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
														<div class="col-m">
														<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
															<span class="gamepad"></span>	
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
						?>		
					</div>	
					
					<div class="tab-pane" id="tab8">		
						<?php
						$category = $cats[7];
						if ($check->isMobile()) {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category AND mobile = 1 ORDER BY plays DESC LIMIT $limit");
						} else {
							$fetch_games = $db->query("SELECT id FROM games WHERE status = 1 AND category = $category ORDER BY plays DESC LIMIT $limit");
						}
						while ($data = $fetch_games->fetch_assoc()) {
							$game = $get->game($data["id"], $get->system("smart_cache"));
							$rating = $get->gameStars($game["plays"], "short");
							$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
							echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
														<div class="col-m">
														<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
															<span class="gamepad"></span>	
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
						?>		
					</div>							
			</div>					
	</div>
</div>