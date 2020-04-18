<?php
$limit = $get->system("topexp_limit");
$get_topexp = $db->query("SELECT id, username, exp, avatar, robohash FROM users ORDER BY exp DESC LIMIT $limit");
if($get_topexp->num_rows > 0){
?>
				<div class="side-widget">
				<h3 class="widget-header"><i class="fa fa-bolt"></i> <?php echo $lang["parts_topexp_head"]; ?></h3>
                    <ul class="media-list recent-container">
                    <?php
                    	while($topuser = $get_topexp->fetch_assoc()){
                    		if(!empty($topuser["avatar"])){
                    			$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$topuser["avatar"].'" class="lazy-avatar b-radius recent-avatar">';                    			
                    		} else {
                    			$avatar = $get->avatar($secure->hashed($topuser["id"]), $topuser["username"], $topuser["robohash"], $get->system("default_avatar"), "recent-avatar b-radius", $get);   
                    		}			                    		
                    		echo '<li class="widget-content media wow bounceIn">
                            <div class="media-left">
                                <a href="'.$get->system("site_url").'/user/'.$topuser["username"].'">'.$avatar.'</a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                  <a href="'.$get->system("site_url").'/user/'.$topuser["username"].'">'.ucfirst($topuser["username"]).'</a>
                                </h4>
								<small><i class="fa fa-bolt"></i> '.$lang["parts_topexp_points"].': '.number_format($topuser["exp"]).'</small>
                            </div>
                        </li>';
                    	} ?>
                    </ul>  
				</div>
<?php } ?>                  