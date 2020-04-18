				<?php
				
				$id = $game["category"];
				
				$limit = $get->system("related_limit");
				
				if($check->isMobile()){
					$fetch_popular = $db->query("SELECT id FROM games WHERE id != ".$game["id"]." AND status = 1 AND category = $id AND mobile = 1 ORDER BY RAND() DESC LIMIT $limit");
				} else {
					$fetch_popular = $db->query("SELECT id FROM games WHERE id != ".$game["id"]." AND status = 1 AND category = $id ORDER BY RAND() DESC LIMIT $limit"); 					
				}
				
				if($fetch_popular->num_rows > 0){	
				?>
				
				<div class="spec">
				<h4><i class="fa fa-cubes"></i> <?php echo $lang["parts_related_play"]; ?></h2>	
				<p><?php echo $lang["parts_related_play_desc"]; ?></p>
				</div>
				
				<?php
				while($data = $fetch_popular->fetch_assoc()){
				$related = $get->game($data["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($related["plays"], "short"); 					 					
				$thumb = $get->thumb($related["thumb"], $related["name"], $secure, $get, $sys);
					echo '<div class="col-md-2 pro-1 wow bounceIn gameDesc" data-tipso="'.$related["description"].'">
								<div class="col-m">
								<a href="'.$get->system("site_url")."/play/".$secure->washName($related["name"])."-".$related["id"].'.html" class="game-img">
										'.$thumb.'
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="'.$get->system("site_url")."/play/".$secure->washName($related["name"])."-".$related["id"].'.html">'.$related["name"].'</a></h6>	
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
						}
				?>