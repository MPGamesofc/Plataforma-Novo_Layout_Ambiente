
<div class="container mid-wrapper">
    <div class="row">
        <div class="col-md-12">		

          	<div id="random">
			<div class="spec">
				<h4><i class="fa fa-trophy"></i> ATUAIS JOGOS PARTICIPANTES DA MPGAMES GAME JAM VÍRUS!! 01/03 - 21/03 </h4>
				<p> Confira abaixo todos os atuais jogos enviados para participar da Segunda edição da MPGames Game Jam, agora com o tema sendo VÍRUS que irá durar desta vez duas semanas! Toda vez que você visualizar esta seção, a ordem será aleatória. Que a diversão reine. :D</p>
			</div>

				<?php
				
				$limit = 50;
				
				if($check->isMobile()){
					$fetch_random = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 AND category = 8 ORDER BY RAND() LIMIT $limit");
				} else {
					$fetch_random = $db->query("SELECT id FROM games WHERE status = 1 and category = 8 ORDER BY RAND() LIMIT $limit");
				}				
				
				while($data = $fetch_random->fetch_assoc()){
				   
				$game = $get->game($data["id"], $get->system("smart_cache"));
				
				 if($game["id"] == 9999){
				        $teste = 9;
				    }
				    
				$rating = $get->gameStars($game["plays"], "short");
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
				$category = $get->category($game["category"]);
					echo '<div class="col-md-2 pro-1 wow bounceIn gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="'.$get->system("site_url")."/play/".$secure->washName($game["name"])."-".$game["id"].'.html" class="game-img">								
									'.$thumb.'
										<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-cube"></i> '.ucfirst($category).'</span></p></div> 	 					 									
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="'.$get->system("site_url")."/play/".$secure->washName($game["name"])."-".$game["id"].'.html">'.$game["name"].'</a></h6>							
										</div>
										<div class="mid-2">
											<div class="text-center stars">
												<i class="fa fa-star"></i> Nota ainda em análise &nbsp;
											
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';
							}							
							?>

	</div>

        </div>
    </div>
</div>


<br>
<br>
<br>


<div class="container mid-wrapper">
    <div class="row">
        <div class="col-md-12">		

           <div id="popular">
			<div class="spec">
				<h4><i class="fa fa-star"></i> Os mais jogados do MÊS!</h4>
				<p>Os atuais jogos mais acessados deste Mês, está uma loucura!! O que está esperando para conferir? Os jogos do Mês são atualizados minuto a minuto em nosso sistema! Hahaha :D </p> 
			</div>
                
				<?php
				    $data = date("n");
					$limit = 18;
					if ($check->isMobile()) {
						$fetch_popular = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 AND DataJogos = $data ORDER BY MesDosJogos DESC LIMIT $limit");
					} else {
						$fetch_popular = $db->query("SELECT id FROM games WHERE status = 1 AND DataJogos = $data ORDER BY MesDosJogos DESC LIMIT $limit");
					}
					$teste = 0;
					while ($data = $fetch_popular->fetch_assoc()) {
					    $teste++;
						$game = $get->game($data["id"], $get->system("smart_cache"));
						$rating = $get->gameStars($game["MesDosJogos"]);
						$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
						echo '<div class="col-md-2 pro-1 wow bounceIn gameDesc" data-tipso="'.$game["description"].'">
													<div class="col-m">
													<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
															' . $thumb . '
															<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-area-chart"></i> '.number_format($teste).' º</span></p></div> 	 										
														</a>
														<div class="mid-1">
															<div class="text-center">
																<h6><a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html">' . $game["name"] . '</a></h6>
															</div>
															<div class="mid-3">
															</div>
														</div>
													</div>
												</div>';
					}
				?>
</div>

        </div>
    </div>
</div>





<br>
<br>
<br>

<IFRAME name=destaquesroll src=https://notas.mpgames.online/DestaquesRoll/index.html width=1170 height=620 frameborder=0 scrolling=auto>
</IFRAME>

<div class="top-carousel">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
			<?php
			$limit = $get->system("latest_limit");
			if ($check->isMobile()) {
				$fetch_latest = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1  AND uid <> 86 ORDER BY id DESC LIMIT $limit");
			} else {
				$fetch_latest = $db->query("SELECT id FROM games WHERE status = 1  AND uid <> 86 ORDER BY id DESC LIMIT $limit");
			}
			while ($data = $fetch_latest->fetch_assoc()) {
				$game = $get->game($data["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($game["plays"]);
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
				echo '<div class="col-md-2 pro-1 wow bounceIn gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
										' . $thumb . '
									<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-bolt"></i> '.$lang["label_newgames"].'</span></p></div> 										
								</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html">' . $game["name"] . '</a></h6>
										</div>
										<div class="mid-3">
										</div>
									</div>
								</div>
							</div>';
			}
			?>
        </div>
        
        <div class="item">
			<?php
			$start = $limit;
			if ($check->isMobile()) {
				$fetch_latest = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 ORDER BY id DESC LIMIT $start, $limit");
			} else {
				$fetch_latest = $db->query("SELECT id FROM games WHERE status = 1 ORDER BY id DESC LIMIT $start, $limit");
			}
			while ($data = $fetch_latest->fetch_assoc()) {
				$game = $get->game($data["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($game["plays"]);
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
				echo '<div class="col-md-2 pro-1 animated fadeInUp gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">	
										' . $thumb . '
									<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-bolt"></i> '.$lang["label_newgames"].'</span></p></div> 	 										
								</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html">' . $game["name"] . '</a></h6>
										</div>
										<div class="mid-3">
										</div>
									</div>
								</div>
							</div>';
			}
			?>
        </div>
        
        <div class="item">
			<?php
			$start = $limit * 2;
			if ($check->isMobile()) {
				$fetch_latest = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 AND uid <> 86 ORDER BY id DESC LIMIT $start, $limit");
			} else {
				$fetch_latest = $db->query("SELECT id FROM games WHERE status = 1 AND uid <> 86 ORDER BY id DESC LIMIT $start, $limit");
			}
			while ($data = $fetch_latest->fetch_assoc()) {
				$game = $get->game($data["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($game["plays"]);
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
				echo '<div class="col-md-2 pro-1 animated fadeInUp gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html" class="game-img">
										' . $thumb . '
									<div class="glabel"><p><span class="animated infinite pulse"><i class="fa fa-bolt"></i> '.$lang["label_newgames"].'</span></p></div> 	 										
								</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="' . $get->system("site_url") . "/play/" . $secure->washName($game["name"]) . "-" . $game["id"] . '.html">' . $game["name"] . '</a></h6>
										</div>
										<div class="mid-3">
										</div>
									</div>
								</div>
							</div>';
			}
			?>
        </div>
        
        
      
      </div>
    
    </div><!-- /.carousel -->
        


</div>