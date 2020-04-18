<?php
$game = $get->game($data["gid"], $get->system("smart_cache"));
$get_cat = $db->query("SELECT name FROM categories WHERE id = " . $game["category"] . " LIMIT 1");
$cat_data = $get_cat->fetch_assoc();
?>
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
	<?php require 'templates/'.$get->system("template").'/parts/play.php'; ?>
</div>

<div class="container mid-wrapper">	
	<?php require 'templates/'.$get->system("template").'/parts/related_games.php'; ?>
	<div class="clearfix"></div>
	<div class="product text-center">
	<?php if($get->system("widget_banner_play") !== ""){ ?>
    <?php echo htmlspecialchars_decode($get->system("widget_banner_play")); ?>    
	<?php } ?>
	</div>   
</div>



	  