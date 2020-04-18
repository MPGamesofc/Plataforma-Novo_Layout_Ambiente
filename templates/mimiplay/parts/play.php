<?php
$rating = $get->gameStars($game["plays"]);
$author = $get->gameAuthor($game["uid"]);
if ($secure->isUrl($game["source"])) {
    $source = $game["source"];
} else {
    $source = $get->system("site_url") . "/uploads/games/" . $game["source"];
}
if ($game["status"] == 1) {
    $status = '<span class="label label-success"><i class="fa fa-check"></i> ' . $lang["label_published"] . '</span>';
} else {
    $status = '<span class="label label-danger"><i class="fa fa-clock-o"></i> ' . $lang["label_pending"] . '</span>';
}
?>

<div class="single">
    <div class="game-body single-arcadia col-md-12">
        <div class="game-frame" style="min-height:<?php if($game['height'] > 854){ echo 640; } else { echo $game["height"]; } ?>px;">
            <div class="game-ads">
                <div class="game-ad1">
				<?php if($get->system("game_banner_top") !== ""){ ?>
                <?php echo htmlspecialchars_decode($get->system("game_banner_top")); ?>
				<?php } ?>
                </div>

                <h1 class="timer"><?php echo $get->system("game_ad_duration"); ?></h1>

                <div class="game-ad2">
				<?php if($get->system("game_banner_bottom") !== ""){ ?>
                <?php echo htmlspecialchars_decode($get->system("game_banner_bottom")); ?>
				<?php } ?>				  
                </div>
            </div>

            <embed src="<?php echo $source; ?>" class="embed-frame" allowfullscreen style="width: 100%;height:<?php echo $game["height"];  ?>px;border:0;display:none; "></embed>

        </div>

       
    </div>
	
	<?php if($get->system("widget_banner_play") !== ""){ ?>
	<div class="clearfix"></div>
	<div class="home-banner text-center">
	<?php echo htmlspecialchars_decode($get->system("widget_banner_play")); ?> 
	</div> 	
	<?php } ?>

    <div class="single-play col-md-12">
        <h3 class="page-heading"><?php echo $game["name"]; ?><?php echo " " . $status; ?></h3>


 <div class="game-options">
            <div class="left-game-options">
                <div class="pull-left">
                    <?php if (in_array($user["position"], array(1, 2)) OR $user["id"] == $game["uid"] && $user["position"] == 3) { ?>
                    <a href="<?php echo $get->system('site_url'); ?>/game/edit/<?php echo $game['id']; ?>"><span class="btn btn-danger btn-sm" title="<?php echo $lang['editgame_title']; ?>"><i class="fa fa-edit fa-2x"></i></span></a>
                    <span class="btn btn-danger btn-sm delete-game" title="<?php echo $lang['deletegame_title']; ?>"><i class="fa fa-trash fa-2x"></i></span>
                    <?php } ?>
					<?php if ($check->isLogged()) { ?>
                    <span class="btn btn-danger btn-sm favorite-btn">
                    <?php if ($check->isFavorite($game["id"], $user["id"])) { ?>
                    <i class="fa fav-heart fa-heart fa-2x" title="<?php echo $lang['removefavorite_title']; ?>"></i>
                    <?php } else { ?>
                    <i class="fa fav-heart fa-heart-o fa-2x" title="<?php echo $lang['addfavorite_title']; ?>"></i>  
                    <?php } ?>
                    </span>
					<?php } ?>                   
                </div>
            </div>

            <div class="pull-right">
                <?php if ($get->system("fullscreen") == 1 && !$check->isMobile()) { ?>
                <span class="btn btn-primary btn-sm fullscreen-btn" title="<?php echo $lang['fullscreen_title']; ?>"><i class="fa fa-arrows fa-2x"></i></span>
                <span class="btn btn-danger btn-sm fullscreen-close" title="<?php echo $lang['fullscreen_close_title']; ?>" style="display:none"><i class="fa fa-arrows fa-2x"></i></span>
                <?php } ?>
                <span class="right-game-options">				
                <span class="btn btn-info btn-sm game-help" title="<?php echo $lang['instructions_title']; ?>"><i class="fa fa-question-circle fa-2x"></i></span>
                <span class="btn btn-warning btn-sm embed-game" title="<?php echo $lang['embed_title']; ?>"><i class="fa fa-code fa-2x"></i></span>
				<span class="btn btn-danger btn-sm report-game" title="<?php echo $lang['report_title']; ?>"><i class="fa fa-exclamation-circle fa-2x"></i></span>
                </span>
            </div>
        </div>


        <div class="pr-single">
            <p class="reduced"><?php echo $lang["parts_by_play"]; ?> <?php echo ucfirst($author); ?> <span class="stars"><?php echo $rating; ?></span>
            </p>
        </div>        

        <p class="in-pa">
            <?php echo $secure->strip($secure->printData($game["description"])); ?>
        </p>

        <ul class="social-top social-share">
            <li>
                <a href="http://www.facebook.com/sharer.php?u=<?php echo $sys->shareEncode($get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'); ?>&t=<?php echo $sys->shareEncode(ucfirst($game['name'])); ?>" class="icon facebook" title="<?php echo $lang['sharefb_title']; ?>"><i class="fa fa-facebook"></i><span></span></a>
            </li>
            <li>
                <a href="https://plus.google.com/share?url=<?php echo $sys->shareEncode($get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'); ?>" class="icon google" title="<?php echo $lang['sharegp_title']; ?>"><i class="fa fa-google"></i><span></span></a>
            </li>            
            <li>
                <a href="https://twitter.com/intent/tweet?text=<?php echo $sys->shareEncode('Lets\'s play '.$game['name'].'! Only on '.$get->system('site_name').'! Click here: '.$get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'); ?>" class="icon twitter" title="<?php echo $lang['sharetw_title']; ?>"><i class="fa fa-twitter"></i><span></span></a>
            </li>
            <li>
                <a href="http://reddit.com/submit?url=<?php echo $sys->shareEncode($get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'); ?>;title=<?php echo $sys->shareEncode(ucfirst($game['name'])); ?>" class="icon reddit" title="<?php echo $lang['sharetw_title']; ?>"><i class="fa fa-reddit"></i><span></span></a>
            </li>            
            <li>
                <a href="http://www.tumblr.com/share?v=3&u=<?php echo $sys->shareEncode($get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'); ?>&t=<?php echo $sys->shareEncode(ucfirst($game['name'])); ?>" class="icon tumblr" title="<?php echo $lang['sharetw_title']; ?>"><i class="fa fa-tumblr"></i><span></span></a>
            </li>
            <li>
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo $sys->shareEncode($get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'); ?>&description=<?php echo $sys->shareEncode($game['description']); ?>" class="icon pinterest" title="<?php echo $lang['sharetw_title']; ?>"><i class="fa fa-pinterest"></i><span></span></a>
            </li>                                    
        </ul>
    </div>

    <div class="product">
        <div class="row">
            <div class="col-md-8">
                <h4 class="comment-header text-center"><i class="fa fa-comments"></i> <?php echo $lang["parts_comments_play"]; ?></h4>
				<p class="comment-p text-center"><?php echo $lang["parts_comments_desc"]; ?></p>		

                <div class="clearfix"></div>
             
                <div class="comments-list">
					<div class="tab-head">
						<nav class="nav-sidebar comment-tabs">
							<ul class="nav tabs">
							  <?php if($get->system("default_comments") == 1){ ?>
							  <li class="active"><a href="#default" data-toggle="tab"><i class="fa fa-gamepad"></i> <?php echo $lang["parts_comments_community"]; ?></a></li>
							  <?php } ?>
							  <?php if($get->system("fb_comments") == 1 && $get->system("fb_id") !== ""){ ?>
							  <li><a href="#fb" data-toggle="tab"><i class="fa fa-facebook"></i> <?php echo $lang["parts_comments_fb"]; ?></a></li> 
							  <?php } ?>
							  <?php if($get->system("disqus_comments") == 1 && $get->system("disqus") !== ""){ ?>
							  <li><a href="#disqus" data-toggle="tab"><i class="fa fa-comments"></i> <?php echo $lang["parts_comments_disqus"]; ?></a></li>  
							  <?php } ?>
							</ul>
						</nav>
				
						<div class="tab-content">				
							
							<?php if($get->system("default_comments") == 1){ ?>
							<div class="tab-pane active" id="default">	
								<?php if ($check->isLogged()) { ?>
									<div class="comment-form">
										<form id="add-comment">
											<textarea class="form-control" name="message" id="comment" placeholder="<?php echo $lang['placeholder_comment']; ?>"></textarea>
											<button type="submit" class="btn btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["parts_postcomment_play"]; ?></button>
										</form>
									</div>
									<div class="clearfix"></div>
								<?php } ?>	
								<div class="comments-dock"></div>
								<?php require 'templates/'.$get->system("template").'/parts/comments.php'; ?>								
							</div>
							<?php } ?>
							
							<?php if($get->system("fb_comments") == 1 && $get->system("fb_id") !== ""){ ?>
							<div class="tab-pane<?php if($get->system("default_comments") == 0){ echo " active"; } ?>" id="fb">
								<div class="fb-comments" data-width="100%" data-numposts="10" data-colorscheme="light" data-href="<?php echo $get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'; ?>"></div>
							</div>
							<?php } ?>
							
							<?php if($get->system("disqus_comments") == 1 && $get->system("disqus") !== ""){ ?>
							<div class="tab-pane<?php if($get->system("default_comments") == 0 && $get->system("fb_comments") == 0){ echo " active"; } ?>" id="disqus">
								<div id="disqus_thread"></div>
								<script>
									var disqus_config = function() {
										this.page.url = "<?php echo $get->system('site_url').'/play/'.$secure->washName($game['name']).'-'.$game['id'].'.html'; ?>";
										this.page.identifier = "<?php echo $game["id"]; ?>";
									};
									(function() {
										var d = document,
											s = d.createElement('script');
										s.src = 'https://<?php echo $get->system("disqus"); ?>.disqus.com/embed.js';
										s.setAttribute('data-timestamp', +new Date());
										(d.head || d.body).appendChild(s);
									})();
								</script>
							</div>
							<?php } ?>

						</div>					
					</div>				
                </div>     
            </div>

            <div class="col-md-4 hidden-xs hidden-sm">
			
			<div class="sidebar-play">
			 <?php require 'templates/'.$get->system("template").'/parts/search_form.php'; ?>
			 <div class="side-ad text-center">
			 <?php
			 if($get->system("widget_sidebar_play") !== ""){
				echo htmlspecialchars_decode($get->system("widget_sidebar_play")); 	
			 }	
			 ?>
			 </div>
             <?php require 'templates/'.$get->system("template").'/parts/recent_players.php'; ?>
			</div>

            </div>

        </div>
    </div>
</div>