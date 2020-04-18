<div class="header">
    <?php require 'templates/'.$get->system("template").'/parts/header.php'; ?>

    <div class="nav-top">
        <div class="container">
            <nav class="navbar navbar-default">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#nav-main">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php require 'templates/'.$get->system("template").'/parts/nav.php'; ?>

            </nav>

            <?php require 'templates/'.$get->system("template").'/parts/nav_profile.php'; ?>

        </div>
    </div>
</div>

<div class="container wrapper">
	<?php if($get->system("widget_banner_top") !== ""){ ?>
	<?php require 'templates/'.$get->system("template").'/parts/banner_top.php'; ?>
	<?php } ?>

	<div class="product">
		<div class="spec">
		<?php if (isset($_GET["do"], $_SESSION["forgot_code"], $_GET["forgotcode"], $_GET["email"]) && $_GET["do"] == "new" && $secure->isNumber($_GET["forgotcode"]) && $secure->isEmail(base64_decode($_GET["email"]))) { ?>
			<h4><?php echo $lang["page_head_forgotnew"]; ?></h4>
			<?php } else { ?>
			<h4><?php echo $lang["page_head_forgot"]; ?></h4>
			<?php } ?>
		</div>

	<?php if (isset($_GET["do"], $_SESSION["forgot_code"], $_GET["forgotcode"], $_GET["email"]) && $_GET["do"] == "new" && $secure->isNumber($_GET["forgotcode"]) && $secure->isEmail(base64_decode($_GET["email"]))) { ?>

		<div class="main-arcadia">
				<div class="form-arcadia">
					<form id="new-pass">
					<div class="form-group">
					<div class="alert alert-info">
					<i class="fa fa-info-circle"></i> <?php echo $lang["parts_infonewpass_forgot"]; ?>
					</div>
					</div> 					
					<div class="input-group">
					 <span class="input-group-addon">
							<i class="fa fa-lock"></i>
						</span>
							<input type="password" class="form-control password" name="password" placeholder="<?php echo $lang['placeholder_password_new']; ?>">
						</div>			
						<input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
						<button type="submit" class="btn btn-md btn-success submit-btn pull-left"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>			
					</form>			
				</div>
		</div>
		</div>
		
		<?php } else { ?>

		<div class="main-arcadia">
				<div class="form-arcadia">
					<form id="forgot-pass">
					<div class="form-group">
					<div class="alert alert-info">
					<i class="fa fa-info-circle"></i> <?php echo $lang["parts_info_forgot"]; ?>
					</div>
					</div>
					<div class="input-group">
					 <span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
							<input type="email" class="form-control email" name="email" placeholder="<?php echo $lang['placeholder_email']; ?>">
						</div>
						<div class="form-group">
						 <img src="<?php echo $get->system('site_url'); ?>/system/captcha.png" class="captcha"/>
						 <a href="javascript:void()" onclick="resetCaptcha()" class="btn btn-success btn-sm"><i class="fa fa-refresh fa-2x"></i></a>
						</div>
						<div class="input-group">
					 <span class="input-group-addon">
							<i class="fa fa-code"></i>
						</span>
							<input type="text" class="form-control code" name="captcha" placeholder="<?php echo $lang['placeholder_captcha']; ?>">
						</div> 			 						
						<button type="submit" class="btn btn-md btn-success submit-btn pull-left"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
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
					</form>			
				</div>
				<div class="clearfix"></div>
				<hr>
					<a href="<?php echo $get->system('site_url'); ?>/login" class="btn btn-md btn-info pull-left"><i class="fa fa-user"></i> <?php echo $lang["login_btn_auth"]; ?></a> 				
					<a href="<?php echo $get->system('site_url'); ?>/register" class="btn btn-md btn-warning pull-right"><i class="fa fa-edit"></i> <?php echo $lang["register_btn_auth"]; ?></a>
					<div class="clearfix"></div>
		</div>
		</div>
		
		<?php } ?>
		
	<?php if($get->system("widget_banner_bottom") !== ""){ ?>
	<?php require 'templates/'.$get->system("template").'/parts/banner_bottom.php'; ?>
	<?php } ?>
</div>