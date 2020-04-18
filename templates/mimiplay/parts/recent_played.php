<?php
$limit = $get->system("recent_played_limit");
$get_lastplayed = $db->query("SELECT id, gid, date FROM lastplayed WHERE gid <> 112 ORDER BY id DESC LIMIT $limit");
if($get_lastplayed->num_rows > 0){
?>
				<div class="side-widget">
				<div class="widget-header"><i class="fa fa-futbol-o"></i> <?php echo $lang["parts_played_head"]; ?></div>
                    <ul class="media-list recent-container">
                    <?php
                    	while($lp = $get_lastplayed->fetch_assoc()){
                    		$game = $get->game($lp["gid"], $get->system("smart_cache"));
                    		$rating = $get->gameStars($game["plays"]);
                    		$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
                    		echo '<li class="widget-content media wow bounceIn">
                            <div class="media-left">
                                <a href="'.$get->system("site_url").'/play/'.$secure->washName($game["name"]).'-'.$game["id"].'.html" class="recent-played">'.$thumb.'</a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                  <a href="'.$get->system("site_url").'/play/'.$secure->washName($game["name"]).'-'.$game["id"].'.html">'.$game["name"].'</a>
                                </h4>
                                <div class="stars-played">'.$rating.'</div>
								<small><i class="fa fa-clock-o"></i> '.$sys->timeAgo($lp["date"], $lang).'</small>
                            </div>
                        </li>';
                    	} ?>
                    </ul>    
				</div>					
<?php } ?>                    