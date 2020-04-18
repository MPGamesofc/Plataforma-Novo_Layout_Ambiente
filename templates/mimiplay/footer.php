
<?php 
require 'templates/'.$get->system('template').'/parts/modals.php'; 
if($get->system("enable_chat") == 1){
	if($check->isLogged() OR $get->system("guest_chat") == 1){
		require 'templates/'.$get->system('template').'/parts/shoutbox.php'; 
	}
}
if($data["page"] == "game" && $_GET["do"] == "edit"){
	$game = $get->game($data["gid"], $get->system("smart_cache")); 	
}
?>

<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-grid">
			<p class="foot-header wow bounceIn"><i class="fa fa-users"></i> <?php echo $lang["foot_online"]; ?></p>
			<p class="online"><?php require 'templates/'.$get->system('template').'/parts/online.php'; ?></p>
		</div>
		<div class="col-md-3 footer-grid ">
			<p class="foot-header wow bounceIn"><i class="fa fa-area-chart"></i> <?php echo $lang["foot_statistics"]; ?></p>
			<?php require 'templates/'.$get->system('template').'/parts/statistics.php'; ?>
		</div>
		<div class="col-md-3 footer-grid ">
			<p class="foot-header wow bounceIn"><i class="fa fa-link"></i> <?php echo $lang["foot_links"]; ?></p>
			<ul>
		   <?php
		   $foot_links = explode(",", str_replace(" ", "", $get->system("footer_links")));		   
		   foreach($foot_links as $link){
		   	 $get_link = $db->query("SELECT id, name FROM pages WHERE id = $link");
		   	 if($get_link->num_rows > 0){
		   	 	 $page = $get_link->fetch_assoc();
		   	 	 echo '<li><a href="'.$get->system('site_url').'/page/'.$secure->washName($page["name"]).'-'.$page["id"].'.html"><i class="fa fa-share"></i> '.ucfirst($page["name"]).'</a></li>';
		   	 	 echo "\n";
		   	 }
		   }
		   ?>
		   <?php
			$check_plugin = $db->query("SHOW TABLES LIKE 'plugins'");
				if ($check_plugin->num_rows > 0) {
					$check_codoforum = $db->query("SELECT content FROM plugins WHERE name = 'codoforum' LIMIT 1");
					if ($check_codoforum->num_rows > 0) {
						$codoforum = $check_codoforum->fetch_assoc();
						$cdata = json_decode($codoforum["content"], true);
						echo '<li><a href="' . $cdata["forum_url"] . '"><i class="fa fa-share"></i> ' . $lang["nav_forum"] . '</a></li>';
					}
				}
		    ?>
			</ul>
		</div> 				
		<div class="col-md-3 footer-grid">
			<p class="foot-header wow bounceIn"><i class="fa fa-search"></i> <?php echo $lang["foot_recent_search"]; ?></p>
			<p class="online"><?php require 'templates/'.$get->system('template').'/parts/recent_search.php'; ?></p>
		</div>
		
		<div class="clearfix"></div>
		
			<div class="footer-bottom">
				<h2><a href="<?php echo $get->system('site_url'); ?>">
				<div class="site-name wow bounce">
				<?php if($get->system("logo") !== ""){ ?>
				<img src="<?php echo $get->system('site_url').'/uploads/'.$get->system('logo'); ?>">
				<?php } else { ?>
				<?php echo $get->system('site_name'); ?>
				<?php } ?>
				</div><span class="wow zoomIn">O ESPAÇO INDIE EM UM SÓ LUGAR!</span></a></h2>
				<p class="fo-para"><?php echo $get->system("description"); ?></p>
				<ul class="social-fo">
					<li><a href="https://facebook.com/mpgamesdevelopers" class="face"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://instagram.com/mpg_games" class="insta"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://youtube.com/mpgamesyt" class="youtube"><i class="fa fa-youtube"></i></a></li>
				</ul>
			</div>
		<div class="copy-right">
			<p>&copy; <?php echo date("Y"); ?> <?php echo $get->system("site_name"); ?>. <?php echo $lang["foot_allrights"]; ?>.</p>
		</div>
		<!-- 16:9 aspect ratio -->
<style>.embed-container { position: relative; padding-bottom: 23.25%; height: 50; overflow: hidden; max-width: 250%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://mpgames.online/RollParceiros/index.html' style='border:0' scrolling="no"></iframe></div>
	</div>
</div>

<?php if($get->system("anti_adblock") == 1){ ?>
<script defer src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/ads.min.js"></script>
<?php } ?>
<?php if($get->system("cdn_assets") == 1){ ?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/tipso/1.0.8/tipso.min.js"></script>
<?php } else { ?>
<script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/sweetalert.min.js"></script>
<script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/tipso.min.js"></script>
<?php } ?>
<script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/initial.min.js"></script>
<script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/main.min.js"></script>
<?php if($data["page"] == "game" && $check->isLogged()){ ?>
<?php if($_GET["do"] == "new"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/submit_game.min.js"></script>
<?php } ?>
<?php if($_GET["do"] == "edit"){ ?>
<?php if(in_array($user["position"], array(1, 2)) OR $user["id"] == $game["uid"] && $user["position"] == 3){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/edit_game.min.js"></script>
<?php } ?>
<?php } ?>
<?php } ?>
<?php if($data["page"] == "panel"){ ?>
<script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/panel.min.js"></script>
<?php if($get->system("cdn_assets") == 1){ ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.5/tinymce.min.js"></script>
<?php } else { ?>
<script async src="<?php echo $get->system('site_url'); ?>/system/libs/tinymce/tinymce.min.js"></script>
<?php } ?>
<?php } ?>
<?php if($data["page"] == "play"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/numerator.min.js"></script>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/fullscreen.min.js"></script>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/play.min.js"></script>
<?php } ?>
<?php if($data["page"] == "pending"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/pending.min.js"></script>
<?php } ?>
<?php if($data["page"] == "settings"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/settings.min.js"></script>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/upload.min.js"></script>
<?php } ?>
<?php if($get->system("enable_chat") == 1){ ?>
<?php if($check->isLogged() OR $get->system("guest_chat") == 1){ ?>
<script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/shoutbox.min.js"></script>
<?php } ?>
<?php } ?>
<?php if($check->isLogged() && $get->system("timer_exp") == 1){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/eInt.min.js"></script>
<?php } ?>
<?php if(!$check->isLogged()){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/notlogged.min.js"></script>
<?php } ?>
<?php if($data["page"] == "login"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/login.min.js"></script>
<?php } ?>
<?php if($data["page"] == "register"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/register.min.js"></script>
<?php } ?>
<?php if($data["page"] == "forgot"){ ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/forgot_password.min.js"></script>
<?php } ?>
<script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/jquery.cookiebar.min.js"></script>
   
</body>
</html>