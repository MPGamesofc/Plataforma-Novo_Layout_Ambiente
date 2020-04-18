<?php if($get->system("challenge_daily") == 1){ ?>
<div class="product">
	<div class="spec">
		<h4><?php echo $lang["parts_challenge_daily"]; ?></h4>
		<p><?php echo $lang["parts_challengedaily_desc"]; ?></p>
	</div>
<?php
$limit = $get->system("challenge_limit");
$get_dtc = $db->query("SELECT id, username, avatar, robohash, dgp, wgp, mgp FROM users WHERE dgp > 10 ORDER BY dgp DESC LIMIT $limit");
if($get_dtc->num_rows > 0){
?>			
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
			<?php
			$s_dtc = 1;
			while ($dtc = $get_dtc->fetch_assoc()) {
				if(!empty($dtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$dtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($dtc["id"]), $dtc["username"], $dtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 wow bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $dtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_dtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $dtc["username"] . '">'.ucfirst($dtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($dtc["dgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_dtc++;
						}
			?>
        </div>
        
		<?php 
		$check_total = $db->query("SELECT id FROM users WHERE dgp > 10");
		if($check_total->num_rows > $get->system("challenge_limit")){ 
		?>
        <div class="item">
			<?php
			$start = $limit;
			$s_dtc = $limit + 1;
			$get_dtc = $db->query("SELECT id, username, avatar, robohash, dgp, wgp, mgp FROM users WHERE dgp > 10 ORDER BY dgp DESC LIMIT $start, $limit");
			while ($dtc = $get_dtc->fetch_assoc()) {
				if(!empty($dtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$dtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($dtc["id"]), $dtc["username"], $dtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 animated bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $dtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_dtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $dtc["username"] . '">'.ucfirst($dtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($dtc["dgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_dtc++;
						}
			?>
        </div>
		<?php } ?>
        
		<?php 
		$check_total = $db->query("SELECT id FROM users WHERE dgp > 10");
		if($check_total->num_rows > $get->system("challenge_limit") * 2){ 
		?>
        <div class="item">
			<?php
			$start = $limit * 2;
			$s_dtc = $limit * 2 + 1; 			
			$get_dtc = $db->query("SELECT id, username, avatar, robohash, dgp, wgp, mgp FROM users WHERE dgp > 10 ORDER BY dgp DESC LIMIT $start, $limit");
			while ($dtc = $get_dtc->fetch_assoc()) {
				if(!empty($dtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$dtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($dtc["id"]), $dtc["username"], $dtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 animated bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $dtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_dtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $dtc["username"] . '">'.ucfirst($dtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($dtc["dgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_dtc++;
						}
			?>
        </div>
		<?php } ?>
      </div>    
    </div><!-- /.carousel -->    
    <div class="clearfix"></div>
<?php } else { ?>
<div class="alert alert-warning text-center">
 <h3><?php echo $lang["parts_challenge_error"]; ?></h3>
 <p class="lead"><?php echo $lang["parts_challenge_error_desc_daily"]; ?></p>
</div>
<?php } ?>
</div>
<?php } ?>

<?php if($get->system("challenge_weekly") == 1){ ?>
<div class="product">
	<div class="spec">
		<h4><?php echo $lang["parts_challenge_weekly"]; ?></h4>
		<p><?php echo $lang["parts_challengeweekly_desc"]; ?></p>
	</div>			
<?php
$limit = $get->system("challenge_limit");
$s_wtc = 1;
$get_wtc = $db->query("SELECT id, username, avatar, robohash, wgp FROM users WHERE wgp > 10 ORDER BY wgp DESC LIMIT $limit");
if($get_wtc->num_rows > 0){
?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
			<?php
			while ($wtc = $get_wtc->fetch_assoc()) {
				if(!empty($wtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$wtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($wtc["id"]), $wtc["username"], $wtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 wow bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $wtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_wtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $wtc["username"] . '">'.ucfirst($wtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($wtc["wgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_wtc++;
						}
			?>
        </div>
        
		<?php 
		$check_total = $db->query("SELECT id FROM users WHERE wgp > 10");
		if($check_total->num_rows > $get->system("challenge_limit")){ 
		?>		
        <div class="item">
			<?php
			$start = $limit;
			$s_wtc = $limit + 1;
			$get_wtc = $db->query("SELECT id, username, avatar, robohash, wgp FROM users WHERE wgp > 10 ORDER BY wgp DESC LIMIT $start, $limit");
			while ($wtc = $get_wtc->fetch_assoc()) {
				if(!empty($wtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$wtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($wtc["id"]), $wtc["username"], $wtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 animated bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $wtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_wtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $wtc["username"] . '">'.ucfirst($wtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($wtc["wgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_wtc++;
						}
			?>
        </div>
		<?php } ?>
 
		<?php 
		$check_total = $db->query("SELECT id FROM users WHERE wgp > 10");
		if($check_total->num_rows > $get->system("challenge_limit") * 2){ 
		?>	 
        <div class="item">
			<?php
			$start = $limit * 2;
			$s_wtc = $limit * 2 + 1; 			
			$get_wtc = $db->query("SELECT id, username, avatar, robohash, wgp FROM users WHERE wgp > 10 ORDER BY wgp DESC LIMIT $start, $limit");
			while ($wtc = $get_wtc->fetch_assoc()) {
				if(!empty($wtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$wtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($wtc["id"]), $wtc["username"], $wtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 animated bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $wtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_wtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $wtc["username"] . '">'.ucfirst($wtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($wtc["wgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_wtc++;
						}
			?>
        </div>
		<?php } ?>
      </div>    
    </div><!-- /.carousel -->    
    <div class="clearfix"></div>
<?php } else { ?>
<div class="alert alert-warning text-center">
 <h3><?php echo $lang["parts_challenge_error"]; ?></h3>
 <p class="lead"><?php echo $lang["parts_challenge_error_desc_weekly"]; ?></p>
</div>
<?php } ?>
</div>
<?php } ?>

<?php if($get->system("challenge_monthly") == 1){ ?>
<div class="product">
	<div class="spec">
		<h4><?php echo $lang["parts_challenge_monthly"]; ?></h4>
		<p><?php echo $lang["parts_challengemonthly_desc"]; ?></p>
	</div>
<?php
$limit = $get->system("challenge_limit");
$s_mtc = 1;
$get_mtc = $db->query("SELECT id, username, avatar, robohash, mgp FROM users WHERE mgp > 10 ORDER BY mgp DESC LIMIT $limit");
if($get_mtc->num_rows > 0){
?>			
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
			<?php
			while ($mtc = $get_mtc->fetch_assoc()) {
				if(!empty($mtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$mtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($mtc["id"]), $mtc["username"], $mtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 wow bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $mtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_mtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $mtc["username"] . '">'.ucfirst($mtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($mtc["mgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_mtc++;
						}
			?>
        </div>
 
		<?php 
		$check_total = $db->query("SELECT id FROM users WHERE mgp > 10");
		if($check_total->num_rows > $get->system("challenge_limit")){ 
		?>	 
        <div class="item">
			<?php
			$start = $limit;
			$s_mtc = $limit + 1;
			$get_mtc = $db->query("SELECT id, username, avatar, robohash, mgp FROM users WHERE mgp > 10 ORDER BY mgp DESC LIMIT $start, $limit");
			while ($mtc = $get_mtc->fetch_assoc()) {
				if(!empty($mtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$mtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($mtc["id"]), $mtc["username"], $mtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 animated bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $mtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_mtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $mtc["username"] . '">'.ucfirst($mtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($mtc["mgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_mtc++;
						}
			?>
        </div>
		<?php } ?>
 
		<?php 
		$check_total = $db->query("SELECT id FROM users WHERE mgp > 10");
		if($check_total->num_rows > $get->system("challenge_limit") * 2){ 
		?>	 
        <div class="item">
			<?php
			$start = $limit * 2;
			$s_mtc = $limit * 2 + 1; 			
			$get_mtc = $db->query("SELECT id, username, avatar, robohash, mgp FROM users WHERE mgp > 10 ORDER BY mgp DESC LIMIT $start, $limit");
			while ($mtc = $get_mtc->fetch_assoc()) {
				if(!empty($mtc["avatar"])){
					$avatar = '<img src="'.$get->system("site_url").'/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="'.$get->system("site_url").'/uploads/avatars/'.$mtc["avatar"].'" class="lazy-avatar b-radius avatar-img">';
				} else {
					$avatar = $get->avatar($secure->hashed($mtc["id"]), $mtc["username"], $mtc["robohash"], $get->system("default_avatar"), "avatar-img", $get);
				} 					 				
				echo '<div class="col-md-2 pro-1 animated bounceIn">
								<div class="col-m">
								<a href="' . $get->system("site_url") . '/user/' . $mtc["username"] . '" class="game-img">
										' . $avatar . '
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-trophy"></i> '.$lang["parts_challenge_rank"].' '.$s_mtc.'</span></p></div> 										
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . '/user/' . $mtc["username"] . '">'.ucfirst($mtc["username"]).'</a></h6>
										</div>
										<div class="mid-2">
										  <div class="text-center">
										  <i class="fa fa-star"></i> ' . number_format($mtc["mgp"]) . ' '.$lang["parts_challenge_gp"].'
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';							
							$s_mtc++;
						}
			?>
        </div>
		<?php } ?>
      </div>    
    </div><!-- /.carousel -->    
    <div class="clearfix"></div>
<?php } else { ?>
<div class="alert alert-warning text-center">
 <h3><?php echo $lang["parts_challenge_error"]; ?></h3>
 <p class="lead"><?php echo $lang["parts_challenge_error_desc_monthly"]; ?></p>
</div>
<?php } ?>
</div>
<?php } ?>