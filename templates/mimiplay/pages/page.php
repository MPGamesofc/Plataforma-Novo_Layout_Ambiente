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
	
    <div class="row">
        <div class="col-md-8">

			<div class="product">			
				<div class="spec">
					<h4><?php echo $data["name"]; ?></h4>
				</div>
			
				<div class="main-arcadia form-full">
					<p><?php echo $data["content"]; ?></p>
				</div>
			</div>
			
        </div>
        
        <div class="col-md-4 hidden-xs hidden-sm sidebar-global">
			<?php require 'templates/'.$get->system("template").'/parts/search_form.php'; ?>
			<div class="side-ad text-center">
			<?php if($get->system("widget_sidebar_global") !== ""){ ?>
			<?php echo htmlspecialchars_decode($get->system("widget_sidebar_global")); ?>
			<?php } ?>  
			</div>        
        </div>
    </div>
	
	<div class="clearfix"></div>
	
	<?php if($get->system("widget_banner_bottom") !== ""){ ?>
	<?php require 'templates/'.$get->system("template").'/parts/banner_bottom.php'; ?>
	<?php } ?>
</div>		 					