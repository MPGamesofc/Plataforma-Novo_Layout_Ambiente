<?php
$limit = $get->system("comments_limit");
$queryNum = $db->query("SELECT COUNT(*) as commentNum FROM comments WHERE gid = " . $game["id"] . " ORDER BY id DESC");
$resultNum = $queryNum->fetch_assoc();
$rowCount = $resultNum['commentNum'];
$config = array('baseURL' => $get->system('site_url') . '/templates/'.$get->system("template").'/ajax/comments.php?gid=' . $game["id"] . '&limit=' . $limit, 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'comments_list');
$pagination = new Pagination($config);
$query = $db->query("SELECT * FROM comments WHERE gid = " . $game["id"] . " ORDER BY id DESC LIMIT $limit");
if ($query->num_rows > 0) {
 echo	'<div id="comments_list">'; 
    while ($comment = $query->fetch_assoc()) {
        $get_user = $db->query("SELECT id, username, position, avatar, exp, robohash FROM users WHERE id = " . $comment["uid"] . " LIMIT 1");
        $udata = $get_user->fetch_assoc();
        $position = $get->position($udata["position"], $lang);
        $rank = $get->userRank($udata["exp"], $get->system("exp_game") + $get->system("exp_time"), $lang);
        if (!empty($udata["avatar"])) {
            $avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="' . $get->system("site_url") . '/uploads/avatars/' . $udata["avatar"] . '" class="lazy-avatar b-radius">';
        } else {
            $avatar = $get->avatar($secure->hashed($udata["id"]), $udata["username"], $udata["robohash"], $get->system("default_avatar"), "b-radius", $get);
        }
        if ($check->isLogged() && in_array($user["position"], array(1, 2)) OR $check->isLogged() && $user["position"] == 3 && $user["id"] == $comment["uid"]) {
            $delete = '<span class="btn btn-danger btn-xs btn-edit-comment-' . $comment["id"] . '" onclick="deleteComment(' . $comment["id"] . ')" title="'.$lang["deletecomment_title"].'"><i class="fa fa-trash"></i></span>';
        } else {
            $delete = NULL;
        }
        if ($check->isLogged() && $user["id"] == $comment["uid"] OR $check->isLogged() && in_array($user["position"], array(1, 2))) {
            $edit = '<span class="btn btn-success btn-xs edit-btn btn-edit-comment-' . $comment["id"] . '" onclick="editComment(' . $comment["id"] . ', $(\'.comment-bbcode-' . $comment["id"] . '\').val())" title="'.$lang["editcomment_title"].'"><i class="fa fa-edit"></i></span>';
        } else {
            $edit = NULL;
        }
        echo '<div class="comment-item comment-' . $comment["id"] . ' wow bounceIn">
						<div class="comment-inner">
							<div class="comment-head">
							 <div class="comment-avatar">
								<div class="pull-left"><a href="'.$get->system("site_url").'/user/'.$udata["username"].'">' . $avatar . '</a></div>
								</div>
								<div class="user-detail">
									<h5 class="handle"><a href="'.$get->system("site_url").'/user/'.$udata["username"].'">' . ucfirst($udata["username"]) . '</a> <small class="text-muted">(' . $position . ')</small></h5>
									<div class="comment-meta">
										<div class="asker-meta">
											<span class="comment-user">
												<span class="comment-user-data">
												<span class="label label-info" title="' . $lang["rank_title"] . '"><i class="fa fa-star"></i> ' . $rank . '</span> 
												<span class="label label-warning" title="' . $lang["exp_title"] . '"><i class="fa fa-bolt"></i> ' . number_format($udata["exp"]) . '</span>						
												' . $edit . ' 												
												' . $delete . '				 								  
												</span>
											</span> 		 												
										</div>
									</div>
								</div>
							</div>
							<div class="comment-content comment-message-' . $comment["id"] . '">
								' . $sys->smileyCompile($secure->strip($secure->printData($comment["message"])), $get->system("site_url")) . '
								<div class="clearfix"></div>
								<br />
								<span class="text-muted"><i class="fa fa-clock-o"></i> ' . $sys->timeAgo($comment["date"], $lang) . '</span>
							</div>
							<input type="hidden" value="' . base64_encode($secure->printData($comment["message"])) . '" class="comment-bbcode-' . $comment["id"] . '">
					</div>
			</div>';
    } 							
							
				echo	'<div class="clearfix"></div>
							
						<div class="text-center">	
						'.$pagination->createLinks().'
						</div> 	 												
						
						</div>';
							
 
} else { ?>
  
				<div class="alert alert-warning text-center no-comments">
				 <h3><?php echo $lang["parts_nocomments_comments"]; ?></h3>
				 <?php if ($check->isLogged()) { ?>
				 <p class="lead"><?php echo $lang["parts_nocomments_comments_desc1"]; ?></p>
				 <?php } else { ?>
				 <p class="lead"><?php echo $lang["parts_nocomments_comments_desc2"]; ?></p>
				 <?php } ?>
				</div>
  
<?php } ?>