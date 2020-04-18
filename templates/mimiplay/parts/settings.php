<?php
if (!empty($user["avatar"])) {
	$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="' . $get->system("site_url") . '/uploads/avatars/' . $user["avatar"] . '" class="lazy-avatar b-radius avatar-img">';	
} else {
	$avatar = $get->avatar($secure->hashed($user["id"]), $user["username"], $user["robohash"], $get->system("default_avatar"), "avatar-img-nav b-radius", $get);
}
?>
<div class="product">
		<div class="spec">
			<h3><?php echo $lang["page_head_settings"]; ?></h3>
		</div>
			<div class="tab-head">
				<nav class="nav-sidebar">
					<ul class="nav tabs ">
					  <li class="active"><a href="#settings" data-toggle="tab"><i class="fa fa-cogs"></i> <?php echo $lang["parts_tabs_settings1"]; ?></a></li>
					  <?php if(empty($user["oauth_name"]) && empty($user["oauth_id"])){ ?>
					  <li class=""><a href="#account" data-toggle="tab"><i class="fa fa-user"></i> <?php echo $lang["parts_tabs_settings2"]; ?></a></li> 					 
					  <?php } ?>
					  <li class=""><a href="#avatar" data-toggle="tab"><i class="fa fa-image"></i> <?php echo $lang["parts_tabs_settings3"]; ?></a></li>
					  <li class=""><a href="#cover" data-toggle="tab"><i class="fa fa-tint"></i> <?php echo $lang["parts_tabs_settings4"]; ?></a></li> 					  
					</ul>
				</nav>
				<div class="tab-content tab-content-t">
				
					<div class="tab-pane active text-style" id="settings">
						
		<div class="main-arcadia">
				<div class="form-arcadia">
					<form id="profile-settings">
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings1']; ?>">
						 <i class="fa fa-user"></i>
						</span>
							<input type="name" name="fullname" class="form-control fullname" value="<?php echo ucfirst($user['fullname']); ?>" placeholder="<?php echo $lang['placeholder_fullname']; ?>">
						</div> 						 				
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings2']; ?>">
						 <i class="fa fa-globe"></i>
						</span>
							<input type="url" name="website" class="form-control" value="<?php echo $user['website']; ?>" placeholder="<?php echo $lang['placeholder_website']; ?>">
						</div> 						 				 	
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings3']; ?>">
						 <i class="fa fa-quote-left"></i>
						</span>
							<input type="text" name="quote" class="form-control" value="<?php echo $user['quote']; ?>" placeholder="<?php echo $lang['placeholder_quote']; ?>">
						</div> 	
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_fblink']; ?>">
						 <i class="fa fa-facebook"></i>
						</span>
							<input type="url" name="fb_link" class="form-control" value="<?php echo $user['fb_link']; ?>" placeholder="Facebook Link">
						</div> 						 				
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_gplink']; ?>">
						 <i class="fa fa-youtube-play"></i>
						</span>
							<input type="url" name="gp_link" class="form-control" value="<?php echo $user['gp_link']; ?>" placeholder="Youtube Link"> 
						</div> 					 	 				 					
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_twlink']; ?>">
						 <i class="fa fa-globe"></i>
						</span>
							<input type="url" name="tw_link" class="form-control" value="<?php echo $user['tw_link']; ?>" placeholder="Outro Link">
						</div> 						 				 						 						 										
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings4']; ?>">
						 <i class="fa fa-info-circle"></i>
						</span> 						
						<textarea name="about" rows="4" class="form-control" placeholder="<?php echo $lang['placeholder_about']; ?>"><?php echo $user["about"]; ?></textarea>
						</div> 						 				 	 											
							 <button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
					</form>				
				</div>				
			</div>	
							
					</div>
					
					<?php if(empty($user["oauth_name"]) && empty($user["oauth_id"])){ ?>
					
					<div class="tab-pane text-style" id="account">
							
		<div class="main-arcadia">
				<div class="form-arcadia">
					<form id="profile-password">
					<div class="form-group">
					<h4 class="page-heading"><?php echo $lang["parts_formhead_settings1"]; ?></h4>
					</div> 					
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings5']; ?>">
						 <i class="fa fa-lock"></i>
						</span>
							<input type="password" name="old_password" class="form-control old_password" placeholder="<?php echo $lang['placeholder_password_current']; ?>">
						</div> 						 				
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings6']; ?>">
						 <i class="fa fa-lock"></i>
						</span>
							<input type="password" name="new_password" class="form-control new_password" placeholder="<?php echo $lang['placeholder_password_new']; ?>">
						</div> 						 				 					 		
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings7']; ?>">
						 <i class="fa fa-lock"></i>
						</span>
							<input type="password" name="c_new_password" class="form-control c_new_password" placeholder="<?php echo $lang['placeholder_password_confirmnew']; ?>">
						</div> 						 				 				 		 							 										
							 <button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
					</form>				
				</div>				
			</div>
		
	<div class="login">
		<div class="main-arcadia">
				<div class="form-arcadia">
					<form id="profile-email">
					<div class="form-group">
					<h4 class="page-heading"><?php echo $lang["parts_formhead_settings2"]; ?></h4>
					</div> 					
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings8']; ?>">
						 <i class="fa fa-envelope"></i>
						</span>
							<input type="email" name="new_email" class="form-control new_email" placeholder="<?php echo $lang['placeholder_email_new']; ?>">
						</div> 						 								 			 										
						<div class="input-group">
									<span class="input-group-addon help_btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooltip_settings9']; ?>">
						 <i class="fa fa-envelope"></i>
						</span>
							<input type="email" name="c_new_email" class="form-control c_new_email" placeholder="<?php echo $lang['placeholder_email_confirmnew']; ?>">
						</div> 						 				
							 <button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
					</form>				
				</div>				
			</div>
		</div> 	 		

					</div>
					
					<?php } ?>
					
					<div class="tab-pane text-style" id="avatar">
							
		<div class="main-arcadia">
				<div class="form-arcadia text-center">	
							<form id="avatar-upload">
							 <div class="form-group">
							 <div class="avatar-frame"><?php echo $avatar; ?></div> 							
							 </div>
							 <div class="form-group">
							 <input type="file" name="avatar" class="form-control avatar-upload">
							 </div>
							 <button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-upload"></i> <?php echo $lang["upload_btn"]; ?></button>
							</form>
				</div>		
		</div> 	 		 							
 		
					</div>	 					 					
					
					<div class="tab-pane text-style" id="cover">
							
		<div class="main-arcadia">
				<div class="form-arcadia text-center">	
							<form id="cover-upload">
							 <div class="form-group">
							 <input type="file" name="cover" class="form-control cover">
							 </div>
							 <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-upload"></i> <?php echo $lang["upload_btn"]; ?></button>
							</form>
				</div>		
		</div> 	 		 							
		
					</div>	 					 					 					
				</div>
			</div>		
	</div>
</div>