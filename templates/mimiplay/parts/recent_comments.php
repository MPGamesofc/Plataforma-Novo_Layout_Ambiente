<?php
$limit = $get->system("recent_comments_limit");
$get_comments = $db->query("SELECT gid, uid, message FROM comments ORDER BY id DESC LIMIT $limit");
if($get_comments->num_rows > 0){
?>
				<div class="side-widget">
				<h3 class="widget-header"><i class="fa fa-comments"></i> <?php echo $lang["home_sidebarhead_newcomments"]; ?></h3>
                    <ul class="media-list recent-container">
                    <?php
                    	while($comment = $get_comments->fetch_assoc()){
                    		$game = $get->game($comment["gid"], $get->system("smart_cache"));
                    		$get_user = $db->query("SELECT id, username, exp, avatar, robohash FROM users WHERE id = ".$comment["uid"]." LIMIT 1");
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
                                    <br>
                                    <small><i class="fa fa-comment"></i> '.$lang["parts_commentedon_recentcomments"].' <a href="'.$get->system("site_url").'/play/'.$secure->washName($game["name"]).'-'.$game["id"].'.html">'.$game["name"].'</a></small>
                                </h4>
                                <p>'.$sys->smileyCompile($sys->limitString($comment["message"], 50), $get->system("site_url")).'</p>
                            </div>
                        </li>';
                    	} ?>
                    </ul> 
				</div>
<?php } ?>                    