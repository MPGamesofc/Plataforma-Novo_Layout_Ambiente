<div class="wrapper">

    <?php require 'parts/sidebar.php'; ?>

    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                    <a class="navbar-brand" href="<?php echo $get->system('site_url'); ?>/panel"><i class="fa fa-cogs"></i> <?php echo $lang["panel_headerbrand"]; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo $get->system('site_url'); ?>" target="_blank">
									<i class="fa fa-eye"></i> <?php echo $lang["panel_viewsite"]; ?>
								</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user"></i> <?php echo ucfirst($user["username"]); ?>
							</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $get->system('site_url'); ?>/profile"><i class="fa fa-user"></i> <?php echo $lang["panel_user_profile"]; ?></a></li>
                                <li><a href="<?php echo $get->system('site_url'); ?>/favorites"><i class="fa fa-heart"></i> <?php echo $lang["panel_user_favorites"]; ?></a></li>
                                <li><a href="<?php echo $get->system('site_url'); ?>/settings"><i class="fa fa-cogs"></i> <?php echo $lang["panel_user_settings"]; ?></a></li>
                                <li><a href="<?php echo $get->system('site_url'); ?>/logout"><i class="fa fa-close"></i> <?php echo $lang["panel_user_logout"]; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

			<?php
			if(isset($_GET["show"]) && $_GET["show"] == "system"){
				require 'pages/system.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "import"){
				require 'pages/import.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "games"){
				require 'pages/games.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "users"){
				require 'pages/users.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "widgets"){
				require 'pages/widgets.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "languages"){
				require 'pages/languages.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "categories"){
				require 'pages/categories.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "pages"){
				require 'pages/pages.php';
			} else if(isset($_GET["show"]) && $_GET["show"] == "reports"){
				require 'pages/reports.php';
			} else if (isset($_GET["page"], $_GET["type"])) {
				require 'templates/panel/pages/option.php';
			} else {
				require 'pages/dashboard.php';
			}
			?>

            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright text-center">
                        <?php echo $lang["foot_allrights"]; ?> &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="<?php echo $get->system('site_url'); ?>"><?php echo ucfirst($get->system('site_name')); ?></a>
                    </p>
                </div>
            </footer>
    </div>
</div>