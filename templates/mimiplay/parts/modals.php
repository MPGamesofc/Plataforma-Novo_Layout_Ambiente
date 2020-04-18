<?php
if ($check->isLogged()) {
    $rank = $get->userRank($user["exp"], $get->system("exp_game") + $get->system("exp_time"), $lang);
    if (!empty($user["avatar"])) {
        $avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="' . $get->system("site_url") . '/uploads/avatars/' . $user["avatar"] . '" class="lazy-avatar b-radius avatar-img-nav">';
    } else {
        $avatar = $get->avatar($secure->hashed($user["id"]), $user["username"], $user["robohash"], $get->system("default_avatar"), "avatar-img-nav ", $get);
    }
?>
<div class="modal fade" id="profile_nav" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>  
            </div>
            <div class="modal-body modal-spa">
              <div class="row">
                <div class="col-md-5 span-2">
                    <div class="item text-center">
                        <?php echo $avatar; ?>
                    </div>
				</div>
                <div class="col-md-7 span-1">
					<h2 class="profile-name text-center"><i class="fa fa-user"></i> <?php echo ucfirst($user["username"]); ?></h2>
                    <div class="profile-info text-center">
                        <span><i class="fa fa-star"></i> <?php echo $rank; ?></span>
                        <div class="clearfix"></div>
                        <span><i class="fa fa-bolt"></i> <?php echo number_format($user["exp"]); ?></span>
                    </div>                
                    <div class="text-center">
                        <a href="<?php echo $get->system('site_url'); ?>/user/<?php echo ucfirst($user["username"]); ?>"  class="btn btn-success main-btn"><i class="fa fa-user"></i> <?php echo $lang["profile_myprofile_btn"]; ?></a>
                        <a href="<?php echo $get->system('site_url'); ?>/favorites" class="btn btn-success main-btn"><i class="fa fa-heart"></i> <?php echo $lang["profile_favorites_btn"]; ?></a>
                        <a href="<?php echo $get->system('site_url'); ?>/settings" class="btn btn-success main-btn"><i class="fa fa-cogs"></i> <?php echo $lang["profile_settings_btn"]; ?></a>                      
                        <a href="<?php echo $get->system('site_url'); ?>/logout" class="btn btn-success main-btn"><i class="fa fa-close"></i> <?php echo $lang["profile_logout_btn"]; ?></a>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>				
<?php } ?>				

<?php if (!$check->isLogged()) { ?>
<div class="modal fade" id="login_modal" role="dialog">
<div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title"><i class="fa fa-user"></i> <?php echo $lang["parts_modals_login"]; ?></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="well text-center">
                          <form id="login-modal-form">
                              <div class="error-block"></div>                          
                              <div class="input-group">
                               <span class="input-group-addon">
                                 <i class="fa fa-user"></i>
                               </span>
                                  <input type="text" name="username" class="form-control uname" placeholder="<?php echo $lang['placeholder_username']; ?>">
                              </div>
                              <div class="input-group">
                               <span class="input-group-addon">
                                 <i class="fa fa-lock"></i>
                               </span>
                                  <input type="password" name="password" class="form-control upass" placeholder="<?php echo $lang['placeholder_password']; ?>">
                              </div>
                              <button type="submit" class="login-btn btn btn-md btn-success pull-left"><i class="fa fa-check"></i> <?php echo $lang["login_btn"]; ?></button>
                          </form>
                     <?php if($get->system("fb_id") !== "" && $get->system("fb_secret") !== "" OR $get->system("gp_id") !== "" && $get->system("gp_secret") !== "" OR $get->system("tw_id") !== "" && $get->system("tw_secret") !== ""){ ?>                          
                     <div class="btn-group pull-right">
					<?php if($get->system("fb_id") !== "" && $get->system("fb_secret") !== ""){ ?>
						 <a href="<?php echo $get->system('site_url'); ?>/login/facebook" class="btn btn-md btn-facebook" title="<?php echo $lang['loginfb_title']; ?>"><i class="fa fa-facebook"></i></a>
					<?php } ?>
					<?php if($get->system("gp_id") !== "" && $get->system("gp_secret") !== ""){ ?> 
						 <a href="<?php echo $get->system('site_url'); ?>/login/google" class="btn btn-md btn-google" title="<?php echo $lang['logingp_title']; ?>"><i class="fa fa-google-plus"></i></a>
					<?php } ?> 						 
					<?php if($get->system("tw_id") !== "" && $get->system("tw_secret") !== ""){ ?>
						 <a href="<?php echo $get->system('site_url'); ?>/login/twitter" class="btn btn-md btn-twitter" title="<?php echo $lang['logintw_title']; ?>"><i class="fa fa-twitter"></i></a>
					<?php } ?> 						 
                     </div>          
                     <?php } ?>
                     <div class="clearfix"></div>
                      </div>
                  </div>
                  <div class="col-sm-6 hidden-xs">
                   <div class="panel intro-login">
                      <p class="lead"><?php echo $lang["parts_introhead_modals"]; ?></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> <?php echo $lang["parts_intro1_modals"]; ?></li>
                          <li><span class="fa fa-check text-success"></span> <?php echo $lang["parts_intro2_modals"]; ?></li>
                          <li><span class="fa fa-check text-success"></span> <?php echo $lang["parts_intro3_modals"]; ?></li>
                          <li><span class="fa fa-check text-success"></span> <?php echo $lang["parts_intro4_modals"]; ?></li>
                          <li><span class="fa fa-check text-success"></span> <?php echo $lang["parts_intro5_modals"]; ?></li>               
                      </ul>
                      <br />
                      <p><a href="<?php echo $get->system('site_url'); ?>/register" class="btn btn-info btn-block"><i class="fa fa-edit"></i> <?php echo $lang["register_btn"]; ?></a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php } ?>

<div class="modal fade" id="cat_nav" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-cubes"></i> <?php echo $lang["parts_modal_cattitle"];?></h4>
      </div>
      <div class="modal-body modal-spa text-center">
        <?php
		$get_cat = $db->query("SELECT name, seo FROM categories LIMIT 31, 500");
		while($category = $get_cat->fetch_assoc()){
			if(empty($category["seo"])){
				echo '<a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["name"])) . '" class="btn btn-default"><i class="fa fa-cube"></i> '.ucfirst($category["name"]).'</a>&nbsp;&nbsp;';
			} else {
				echo '<a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["seo"])) . '" class="btn btn-default"><i class="fa fa-cube"></i> '.ucfirst($category["name"]).'</a>&nbsp;&nbsp;';
			}		
		}
		?>
      </div>
	  <br /><br />
    </div>
  </div>
</div>