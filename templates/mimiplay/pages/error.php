<?php $code = rand(); ?>
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
			<h3><?php echo $lang["page_head_error"]; ?></h3>
		</div>
	</div>
		
	<div class="alert alert-danger text-center">
		<?php if (isset($_GET["type"]) && $_GET["type"] == "mobile") { ?>
		<h3><?php echo $lang["page_content_error1"]; ?></h3>
		<p class="lead"><?php echo $lang["page_content_error1_desc"]; ?></p>
		<?php } else if (isset($_GET["type"]) && $_GET["type"] == "login") { ?>
		<h3><?php echo $lang["page_content_error2"]; ?></h3> 		
		<p class="lead"><?php echo $lang["page_content_error2_desc"]; ?></p> 		
		<?php } else if (isset($_GET["type"]) && $_GET["type"] == "notfound") { ?>
		<h3><?php echo $lang["page_content_error3"]; ?></h3> 		
		<p class="lead"><?php echo $lang["page_content_error3_desc"]; ?></p> 		
		<?php } else if (isset($_GET["type"]) && $_GET["type"] == "permission") { ?>
		<h3><?php echo $lang["page_content_error4"]; ?></h3> 		
		<p class="lead"><?php echo $lang["page_content_error4_desc"]; ?></p> 		
		<?php } else { ?> 		 		
		<h3><?php echo $lang["page_content_error5"]; ?></h3> 		
		<p class="lead"><?php echo $lang["page_content_error5_desc"]; ?></p> 		
		<?php } ?>
	</div>
	
	<?php if($get->system("widget_banner_bottom") !== ""){ ?>
	<?php require 'templates/'.$get->system("template").'/parts/banner_bottom.php'; ?>
	<?php } ?>
</div>