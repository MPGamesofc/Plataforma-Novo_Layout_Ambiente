<?php
$limit = $get->system("recent_players_limit");
$get_players = $db->query("SELECT uid, date FROM lastplayers WHERE gid = ".$game["id"]." ORDER BY id DESC LIMIT $limit");
if($get_players->num_rows > 0){
?>
				<div class="side-widget">
				<h3 class="widget-header"><i class="fa fa-users"></i> <?php echo $lang["parts_recentplayershead_play"]; ?></h3>
                    <ul class="media-list recent-container">
                    <?php
                    	while($player = $get_players->fetch_assoc()){
                    		$get_user = $db->query("SELECT id, username, exp, avatar, robohash FROM users WHERE id = ".$player["uid"]." LIMIT 1");
                    		$udata = $get_user->fetch_assoc();
                    		$rank = $get->userRank($udata["exp"], $get->system("exp_game") + $get->system("exp_time"), $lang);
                    		if(!empty($udata["avatar"])){
                    			$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$udata["avatar"].'" class="lazy-avatar b-radius recent-avatar">';                    			
                    		} else {
                    			$avatar = $get->avatar($secure->hashed($udata["id"]), $udata["username"], $udata["robohash"], $get->system("default_avatar"), "recent-avatar b-radius", $get);   
                    		}
                    		echo '<li class="widget-content media wow bounceIn">
                            <div class="media-left">
                                '.$avatar.'
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
								<a href="'.$get->system("site_url").'/user/'.$udata["username"].'">'.ucfirst($udata["username"]).'</a> <small class="text-muted">('.$lang["parts_played_recentplayers"].' '.$sys->timeAgo($player["date"], $lang).')</small>
                                </h4>
                                <span class="btn btn-xs btn-info" title="'.$lang["rank_title"].'"><i class="fa fa-star"></i> '.$rank.'</span>    
                                <span class="btn btn-xs btn-warning" title="'.$lang["exp_title"].'"><i class="fa fa-bolt"></i> '.number_format($udata["exp"]).'</span>
                            </div>
                        </li>';
                    	} ?>
                    </ul>   
				</div>
<?php } ?>                    