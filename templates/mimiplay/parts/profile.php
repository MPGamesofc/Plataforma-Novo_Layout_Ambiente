<div class="single">
   <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<div class="profile-userpic text-center">
				<?php echo $data["avatar"]; ?>
				</div>

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $data["username"]; ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $data["position"]; ?>
					</div>
				</div>

				<div class="profile-userbuttons">
				 <?php echo $data["status"]; ?>
				 <span class="btn btn-sm btn-warning profile-btn" title="<?php echo $lang['exp_title']; ?>"><i class="fa fa-bolt"></i> <?php echo $data["exp"]; ?></span>
				 <?php if($check->isAdmin() OR $check->isModerator()){ ?>
				 <a href="<?php echo $get->system('site_url'); ?>/panel/edit/user/<?php echo $data["id"]; ?>" class="btn btn-sm btn-danger profile-btn" target="_blank" title="<?php echo $lang['label_edituser']; ?>"><i class="fa fa-edit"></i> <?php echo $lang["edit_btn"]; ?></a>
				 <?php } ?>
				 <?php if(!empty($data["fb_link"]) OR !empty($data["gp_link"]) OR !empty($tw_link))	{ ?>
				 <div class="profile-social">
				 <?php if(!empty($data["fb_link"])){ ?>
				 <a href="<?php echo $data['fb_link']; ?>" class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
				 <?php } ?>
				 <?php if(!empty($data["gp_link"])){ ?>
				 <a href="<?php echo $data['gp_link']; ?>" class="btn btn-social-icon btn-google"><span class="fa fa-youtube-play"></span></a>
				 <?php } ?>
				 <?php if(!empty($data["tw_link"])){ ?>
				 <a href="<?php echo $data['tw_link']; ?>" class="btn btn-social-icon btn-twitter"><span class="	fa fa-globe"></span></a> 
				 <?php } ?>
				 </div>
				 <?php } ?>
				</div>

				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#overview" data-toggle="tab">
							<i class="fa fa-user"></i>
							<?php echo $lang["parts_overview_profile"]; ?></a>
						</li>
						<li>
							<a href="#favorites" data-toggle="tab">
							<i class="fa fa-heart"></i>
							<?php echo $lang["parts_favorites_profile"]; ?></a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
				
		<div class="col-md-8 profile-content"<?php echo $data["cover"]; ?>>
		<div class="tab-content profile-cover-box<?php if (!empty($data['cover'])) { echo ' profile-state-covered'; } else { echo ' profile-state-uncovered'; } ?>">
		<div class="tab-pane active animated fadeInUp" id="overview">
      
               <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center profile-name-top"><strong><?php echo $data["fullname"]; ?></strong></h2>
                    <h3 class="text-center profile-position"><i class="fa fa-star"></i> <?php echo $data["rank"]; ?></h3>                    
                    <h3 class="text-center profile-website"><i class="fa fa-globe"></i> <?php echo $data["website"]; ?></h3>                    
					
                    <div class="title-divider">
                        <span class="hr-divider col-xs-5"></span>
                        <span class="icon-separator col-xs-2"><i class="fa fa-star"></i></span>
                        <span class="hr-divider col-xs-5"></span>
                    </div>
					
               </div>
                
                <div class="col-md-8 col-md-offset-2 text-center">
                <p class="profile-caption"><?php echo $data["about"]; ?></p>
                <hr>
                <h3 class="profile-quote">"<?php echo $data["quote"]; ?>"</h3>
                <hr>
                <div class="btn-group">
				          <span class="btn btn-md btn-success" title="<?php echo $lang['exp_title']; ?>"><i class="fa fa-bolt"></i> <?php echo $data["exp"]; ?></span>
						  <span class="btn btn-md btn-warning" title="<?php echo $lang['posts_title']; ?>"><i class="fa fa-gamepad"></i> <?php echo $data["posts"]; ?></span>
						<span class="btn btn-md btn-danger" title="<?php echo $lang['comments_title']; ?>"><i class="fa fa-comments"></i> <?php echo $data["comments"]; ?></span>
						</div>
                </div>
     
      </div>
      
      <div class="tab-pane animated fadeInUp" id="favorites">
      
      <?php require 'templates/'.$get->system("template").'/parts/profile_favorites.php'; ?>
      
      </div>
      
      <div class="tab-pane animated fadeInUp" id="submitted">
      
      <?php require 'templates/'.$get->system("template").'/parts/profile_games.php'; ?>
	  
      </div>          
     </div> 
		</div>
	</div>
</div>