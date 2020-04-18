	  <?php
 
		 $id = $data["id"];
			  
		 $limit = 8;
		 
		 $queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games WHERE status = 1 AND uid = '$id' ORDER BY id DESC"); 	
		 
		 $resultNum = $queryNum->fetch_assoc();
		 
		 $rowCount = $resultNum['gameNum'];
			
		 $config = array('baseURL'=>$get->system('site_url') . '/templates/'.$get->system("template").'/ajax/profile_games.php?id='.$id.'&limit='.$limit, 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'game-list');
		 
		 $pagination =  new Pagination($config);
 
 		$query = $db->query("SELECT id FROM games WHERE status = 1 AND uid = '$id' ORDER BY id DESC LIMIT $limit"); 	 		
 
		if($query->num_rows > 0){
 
	 echo '<div id="game-list">';
	 
 	 while($data = $query->fetch_assoc()){
				$game = $get->game($data["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($game["plays"], "short");
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
					echo '<div class="col-md-3 pro-1 animated bounceIn gameDesc" data-tipso="'.$game["description"].'">
								<div class="col-m">
								<a href="'.$get->system("site_url")."/play/".$secure->washName($game["name"])."-".$game["id"].'.html" class="game-img">
										'.$thumb.'
									</a>
									<div class="mid-1">
										<div class="text-center">
											<h6><a href="'.$get->system("site_url")."/play/".$secure->washName($game["name"])."-".$game["id"].'.html">'.$game["name"].'</a></h6>							
										</div>
										<div class="mid-2">
										  	<div class="text-center stars">
												<i class="fa fa-star"></i> ' . $rating . '&nbsp;
												<i class="fa fa-area-chart"></i> ' . number_format($game["plays"]) . '
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>';
							}	 
							
					echo	'<div class="clearfix"></div>
							
						<div class="text-center">	
						'.$pagination->createLinks().'
						</div>
						
						</div>	';
											
   } else { 
  
  echo '<div class="product">
  <div class="alert alert-warning text-center">
  <h3>'.$lang["error_nogames_profile"].'</h3>
  <p class="lead">'.$lang["error_nogames_profile_desc"].'</p>
  </div>
  </div>';
  
   } ?>  
   