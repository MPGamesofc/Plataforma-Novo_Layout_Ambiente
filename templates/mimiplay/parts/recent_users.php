<?php
$limit = $get->system("recent_users_limit");
$get_users = $db->query("SELECT id FROM users ORDER BY id DESC LIMIT $limit");
if($get_users->num_rows > 0){
?>
				<div class="side-widget">
				<h3 class="widget-header"><i class="fa fa-users"></i> <?php echo $lang["home_sidebarhead_newusers"]; ?></h3>
                    <ul class="media-list recent-container">
                    <?php
                    	while($uget = $get_users->fetch_assoc()){
                    		$get_user = $db->query("SELECT id, username, exp, avatar, robohash, registered FROM users WHERE id = ".$uget["id"]." LIMIT 1");
                    		$udata = $get_user->fetch_assoc();
                    		if(!empty($udata["avatar"])){
                    			$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$udata["avatar"].'" class="lazy-avatar b-radius recent-avatar">';                    			
                    		} else {
                    			$avatar = $get->avatar($secure->hashed($udata["id"]), $udata["username"], $udata["robohash"], $get->system("default_avatar"), "recent-avatar b-radius", $get);   
                    		}
                    		echo '<li class="widget-content media wow bounceIn">
                            <div class="media-left">
                                <a href="'.$get->system("site_url").'/user/'.$udata["username"].'">'.$avatar.'</a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                  <a href="'.$get->system("site_url").'/user/'.$udata["username"].'">'.ucfirst($udata["username"]).'</a>
                                </h4>
								<small><i class="fa fa-clock-o"></i> '.$lang["parts_registered_recentusers"].' '.$sys->timeAgo($udata["registered"], $lang).'</small>
                            </div>
                        </li>';
                    	} ?>
                    </ul>       
				</div>
<?php } ?>                    