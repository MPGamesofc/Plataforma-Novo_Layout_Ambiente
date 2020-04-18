<?php 
/**
 * Arcadia - Arcade Gaming Platform
 * @author Norielle Cruz <http://noriellecruz.com>
 */
 
 /**
  * Social Login Config
  */
  
 if($_SESSION['app'] == 'facebook'){
 	 $_SESSION['fb_appid'] = $get->system("fb_id");
 	 $_SESSION['fb_appsecret'] = $get->system("fb_secret");
 } else if($_SESSION['app'] == 'twitter'){
 	 $_SESSION['tt_key'] = $get->system("tw_id");
	 $_SESSION['tt_secret'] = $get->system("tw_secret");
 } else if($_SESSION['app'] == 'google'){
 	 $_SESSION['gg_appid'] = $get->system("gp_id");
	 $_SESSION['gg_appsecret'] = $get->system("gp_secret");
 }

/* End */
?>