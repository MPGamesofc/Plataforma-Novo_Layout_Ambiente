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

	<?php if (isset($_SESSION["socialcode"], $_GET["type"], $_GET["code"]) && $_GET["type"] == "newsocial") { ?>
		
	<div class="product">
		<div class="spec">
			<h4><?php echo $lang["page_head_sociallogin"]; ?></h4>
		</div>
		
	<?php } else { ?>
		
	<div class="product">
		<div class="spec">
			<h4><?php echo $lang["page_head_login"]; ?></h4>
		</div>
	
	<?php } ?>	
	
	<?php if (isset($_SESSION["socialcode"], $_GET["type"], $_GET["code"]) && $_GET["type"] == "newsocial" && $secure->isNumber($_GET["code"])) { ?>
	
		<div class="main-arcadia">
				<div class="form-arcadia">		
					<form id="newsocial">
					<div class="form-group">
					<div class="alert alert-info">
					<i class="fa fa-info-circle"></i> <?php echo $lang["parts_infonewsocial_login"]; ?>
					</div>
					</div> 					 					
						<div class="input-group">
						 <span class="input-group-addon">
							<i class="fa fa-user"></i>
						 </span>
							<input type="text" name="username" class="form-control input-lg username" placeholder="<?php echo $lang['placeholder_username']; ?>">
						</div>
						<button type="submit" class="btn btn-lg btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
					</form>
				</div>
			</div> 	
			</div>
			
	<?php } else { ?>	
	
		<div class="main-arcadia">
				<div class="form-arcadia">						
					<form id="login">
					<div class="form-group">
					<div class="alert alert-info">
					<i class="fa fa-info-circle"></i> <?php echo $lang["parts_info_login"]; ?>
					</div>
					</div> 					 					 					
						<div class="input-group">
						 <span class="input-group-addon">
							<i class="fa fa-user"></i>
						 </span>
							<input type="text" class="form-control username" name="username" placeholder="<?php echo $lang['placeholder_username']; ?>">
						</div>
						<div class="input-group">
						 <span class="input-group-addon">
							<i class="fa fa-lock"></i>
						 </span>
							<input type="password" class="form-control password" name="password" placeholder="<?php echo $lang['placeholder_password']; ?>">
						</div>
						<button type="submit" class="btn btn-md btn-success submit-btn pull-left"><i class="fa fa-check"></i> <?php echo $lang["login_btn"]; ?></button>
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
					<a href="<?php echo $get->system('site_url'); ?>/register" class="btn btn-md btn-info pull-left"><i class="fa fa-edit"></i> <?php echo $lang["register_btn_auth"]; ?></a>
					<a href="<?php echo $get->system('site_url'); ?>/forgot" class="btn btn-md btn-warning pull-right"><i class="fa fa-question"></i> <?php echo $lang["forgot_btn_auth"]; ?></a>
				<div class="clearfix"></div> 				
			</div>
			</div>
			
		<?php } ?>
		
	<?php if($get->system("widget_banner_bottom") !== ""){ ?>
	<?php require 'templates/'.$get->system("template").'/parts/banner_bottom.php'; ?>
	<?php } ?>
	
</div>		