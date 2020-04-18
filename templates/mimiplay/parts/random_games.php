	<div id="random">
			<div class="spec">
				<h4><i class="fa fa-random"></i> <?php echo $lang["home_head_randomgames"]; ?></h4>
				<p><?php echo $lang["home_randomgames_desc"]; ?></p>
			</div>

				<?php
				
				$limit = $get->system("random_limit");
				
				if($check->isMobile()){
					$fetch_random = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 ORDER BY RAND() LIMIT $limit");
				} else {
					$fetch_random = $db->query("SELECT id FROM games WHERE status = 1 ORDER BY RAND() LIMIT $limit");
				}				
				
				while($data = $fetch_random->fetch_assoc()){
				$game = $get->game($data["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($game["plays"], "short");
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
				$category = $get->category($game["category"]);
					echo '<div class="col-md-2 pro-1 wow bounceIn gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="'.$get->system("site_url")."/play/".$secure->washName($game["name"])."-".$game["id"].'.html" class="game-img">								
									'.$thumb.'
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-cube"></i> '.ucfirst($category).'</span></p></div> 	 					 									
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="'.$get->system("site_url")."/play/".$secure->washName($game["name"])."-".$game["id"].'.html">'.$game["name"].'</a></h6>							
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