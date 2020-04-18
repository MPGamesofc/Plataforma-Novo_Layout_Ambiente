			<div class="logo">
				<h1><a href="<?php echo $get->system('site_url'); ?>">
				<div class="site-name animated bounce">
				<?php if($get->system("logo") !== ""){ ?>
				<img src="<?php echo $get->system('site_url').'/uploads/'.$get->system('logo'); ?>">
				<?php } else { ?>
				<?php echo $get->system('site_name'); ?>
				<?php } ?>
				</div>
				<span class="animated zoomIn">O ESPAÇO INDIE EM UM SÓ LUGAR!</span>
				</a></h1>
				
			</div>
					
		
			<?php if (!$check->isLogged()) { ?>
			<div class="head-t">
				<ul class="card">
					<li><a href="<?php echo $get->system('site_url'); ?>/login"><i class="fa fa-user"></i><?php echo $lang["login_link"]; ?></a></li>
					<li><a href="<?php echo $get->system('site_url'); ?>/register"><i class="fa fa-edit"></i><?php echo $lang["register_link"]; ?></a></li>
					<li><a href="https://mpgames.online//page/parceiros-12.html"><i class="fa fa-child"></i>Parceiros</a></li>
					<li><a href="https://mpgames.online//page/fa-a-parte-dos-devs--7.html"><i class="fa fa-handshake-o"></i>Desenvolvedor</a></li>
					<li><a href="https://mpgames.online//page/game-jam-28.html"><i class="fa fa-gamepad"></i>GAME JAM</a></li>
					<li><a href="https://mpgames.online//page/download--13.html"><i class="fa fa-download"></i>Download!</a></li>
					<li><a href="https://mpgames.online/Formulario/contato.html"><i class="fa fa-envelope"></i>CONTATO!</a></li>
					<li><a href="https://bio.mpgames.online/mpg"><i class="fa fa-address-card"></i>CONHEÇA MAIS!</a></li>
				</ul>	
				
			</div>
			
			<?php if($get->system("fb_id") !== "" && $get->system("fb_secret") !== "" OR $get->system("gp_id") !== "" && $get->system("gp_secret") !== "" OR $get->system("tw_id") !== "" && $get->system("tw_secret") !== ""){ ?>
			<div class="header-ri animated swing">
				<ul class="social-top">				
					
					<?php if($get->system("gp_id") !== "" && $get->system("gp_secret") !== ""){ ?> 
					<li><a href="<?php echo $get->system('site_url'); ?>/login/google" class="icon google"><i class="fa fa-google"></i><span></span></a></li>
					<?php } ?> 					
					<?php if($get->system("tw_id") !== "" && $get->system("tw_secret") !== ""){ ?> 		
					<li><a href="<?php echo $get->system('site_url'); ?>/login/twitter" class="icon twitter"><i class="fa fa-twitter"></i><span></span></a></li> 					
					<?php } ?> 					
				</ul>
			</div> 		
			<?php } ?>
			<?php } else { ?>
			<div class="head-t logged-t">
				<ul class="card">
				 <?php if ($check->isAdmin() OR $check->isModerator()) { ?>
				  <li><a href="<?php echo $get->system('site_url'); ?>/panel"><i class="fa fa-cogs"></i><?php echo $lang["profile_panel_btn"]; ?></a></li>
				  <li><a href="<?php echo $get->system('site_url'); ?>/pending"><i class="fa fa-clock-o"></i><?php echo $lang["profile_pending_btn"]; ?></a></li> 
       <?php } ?> 				
       <?php if($get->system("submissions") == 1){ ?>
                      <?php if ($check->isAdmin() OR $check->isModerator OR $check->isAuthor()) { ?>  
					
					<?php } ?> 
					
					<li><a href="<?php echo $get->system('site_url'); ?>/game/new"><i class="fa fa-edit"></i><?php echo $lang["profile_submit_btn"]; ?></a></li>
					
					
					<li><a href="https://mpgames.online//page/parceiros-12.html"><i class="fa fa-child"></i>Parceiros</a></li>
					<li><a href="https://mpgames.online//page/fa-a-parte-dos-devs--7.html"><i class="fa fa-handshake-o"></i>Desenvolvedor</a></li>
					<li><a href="https://mpgames.online//page/game-jam-28.html"><i class="fa fa-gamepad"></i>GAME JAM</a></li>
					<li><a href="https://mpgames.online//page/download--13.html"><i class="fa fa-download"></i>Download!</a></li>
					<li><a href="https://mpgames.online/Formulario/contato.html"><i class="fa fa-envelope"></i>CONTATO!</a></li>
					<li><a href="https://bio.mpgames.online/mpg"><i class="fa fa-address-card"></i>CONHEÇA MAIS!</a></li>
				 <?php } ?>
       <?php if($get->system("submissions") == 0 && in_array($user["position"], array(1, 2))){ ?>
					<?php if ($check->isAdmin() OR $check->isModerator OR $check->isAuthor()) { ?>  
				
					<?php } ?> 
					
					<li><a href="<?php echo $get->system('site_url'); ?>/game/new"><i class="fa fa-edit"></i><?php echo $lang["profile_submit_btn"]; ?></a></li>
					
					<li><a href="https://mpgames.online//page/parceiros-12.html"><i class="fa fa-child"></i>Parceiros</a></li>
					<li><a href="https://mpgames.online//page/fa-a-parte-dos-devs--7.html"><i class="fa fa-handshake-o"></i>Desenvolvedor</a></li>
					<li><a href="https://mpgames.online//page/game-jam-28.html"><i class="fa fa-gamepad"></i>GAME JAM</a></li>
					<li><a href="https://mpgames.online//page/download--13.html"><i class="fa fa-download"></i>Download!</a></li>
					<li><a href="https://mpgames.online/Formulario/contato.html"><i class="fa fa-envelope"></i>CONTATO!</a></li>
					<li><a href="https://bio.mpgames.online/mpg"><i class="fa fa-address-card"></i>CONHEÇA MAIS!</a></li>
				 <?php } ?> 
				</ul>	
			</div>
			<?php } ?>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="PSV262VBUPCHS" />
<input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Faça doações com o botão do PayPal" />
<img alt="" border="0" src="https://www.paypal.com/pt_BR/i/scr/pixel.gif" width="1" height="1" />
</form>




<IFRAME name=ContatorGameJamFim src=https://mpgames.online/Contador/index.html width=720 height=240 frameborder=0 scrolling=no>
</IFRAME>

<br>


<IFRAME name=CaltonDance src=https://mpgames.online/Calton/index.html width=400 height=590 frameborder=0 scrolling=no>
</IFRAME>

