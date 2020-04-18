<div id="topusers">
			<div class="spec">
				<h4><i class="fa fa-trophy"></i> <?php echo $lang["home_head_topusers"]; ?></h4>
				<p><?php echo $lang["home_topusers_desc"]; ?></p>
			</div>
			
				<?php
				
				$limit = $get->system("topusers_limit");
				
				$fetch_topusers = $db->query("SELECT id, username, avatar, robohash FROM users ORDER BY exp DESC LIMIT $limit");
				
				while($top_user = $fetch_topusers->fetch_assoc()){					
					if(!empty($top_user["avatar"])){
						$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$top_user["avatar"].'" class="lazy-avatar b-radius avatar-img">';						
					} else {
						$avatar = $get->avatar($secure->hashed($top_user["id"]), $top_user["username"], $top_user["robohash"], $get->system("default_avatar"), "avatar-img", $get);
					} 					
					 					
					echo '<div class="col-md-3 pro-1 wow bounceIn">
								<div class="col-m col-users text-center">
								<a href="'.$get->system("site_url")."/user/".$top_user["username"].'">
										'.$avatar.'
									</a>
									<div class="mid-1">
											<h6 class="uc top_users"><i class="fa fa-user"></i> <a href="'.$get->system("site_url")."/user/".$top_user["username"].'">'.$sys->limitString($top_user["username"], 10).'</a></h6>					 										 		
									</div>
								</div>
							</div>';
							
							$start++;
				}					
				?>
					
	</div>