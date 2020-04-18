<div class="header">
    <?php require 'templates/'.$get->system("template").'/parts/header.php'; ?>

    <div class="nav-top nav-static">
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

    <?php require 'templates/'.$get->system("template").'/parts/new_games.php'; ?>
	
	<div class="clearfix"></div>
	
	<?php if($get->system("widget_banner_top") !== ""){ ?>
	<?php require 'templates/'.$get->system("template").'/parts/home_banner.php'; ?>
	
	<div class="clearfix"></div>
	<?php } ?>
		
    <div class="row">
		
		<?php require 'templates/'.$get->system("template").'/parts/featured_tabs.php'; ?>
		
        <div class="col-md-8">		

            <?php require 'templates/'.$get->system("template").'/parts/featured_games.php'; ?>

        </div>

        <div class="col-md-4 hidden-xs hidden-sm">
			<?php
			require 'templates/'.$get->system("template").'/parts/search_form.php'; 
			?>
			<div class="side-ad text-center">			
			<?php
			if($get->system("widget_sidebar_global") !== ""){
				echo htmlspecialchars_decode($get->system("widget_sidebar_global")); 	
			} 
			?>
			</div>		
			<?php			
			require 'templates/'.$get->system("template").'/parts/recent_played.php'; 			
			require 'templates/'.$get->system("template").'/parts/recent_comments.php';
			require 'templates/'.$get->system("template").'/parts/top_exp.php'; 			
			require 'templates/'.$get->system("template").'/parts/recent_users.php';
			?>              
        </div>
    </div>
</div>

<?php if($get->system("widget_banner_top") !== ""){ ?>
<div class="clearfix"></div>

<?php require 'templates/'.$get->system("template").'/parts/banner_top.php'; ?>
<?php } ?>

<div class="container mid-wrapper">
    <div class="row">
        <div class="col-md-12">		

            <?php require 'templates/'.$get->system("template").'/parts/popular_games.php'; ?>

        </div>
    </div>
</div>


<div class="container mid-wrapper">
    <div class="row">
        <div class="col-md-12">		

            <?php require 'templates/'.$get->system("template").'/parts/random_games.php'; ?>

        </div>
    </div>
</div>

<?php if($get->system("widget_banner_bottom") !== ""){ ?>
<div class="clearfix"></div>

<?php require 'templates/'.$get->system("template").'/parts/banner_bottom.php'; ?>
<?php } ?>

<div class="container mid-wrapper">
    <div class="row">
        <div class="col-md-12">		

            <?php require 'templates/'.$get->system("template").'/parts/top_users.php'; ?>

        </div>
    </div>
</div>