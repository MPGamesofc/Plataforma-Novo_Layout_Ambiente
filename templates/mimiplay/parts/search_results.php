 	<div class="product">
			<div class="spec">
				<h4><?php echo $lang["page_head_search_live"]; ?> "<?php echo $data['search']; ?>"</h4>
			</div>
 
<?php
 
 if($get->system("advance_search") == 1 && $get->system("detectlang_api") !== ""){
	 $search = $data["adv_search"];
 } else {
	 $search = $data["search"];
 }
 
 $limit = $get->system("search_limit");
 
 if($check->isMobile()){
 	$queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games WHERE status = 1 AND mobile = 1 AND name LIKE '%".$search."%'");
 } else {
 	$queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games WHERE status = 1 AND name LIKE '%".$search."%'"); 		
 }
 
 $resultNum = $queryNum->fetch_assoc();
 
 $rowCount = $resultNum['gameNum'];
    
 $config = array('baseURL'=>$get->system("site_url") . '/templates/'.$get->system("template").'/ajax/search.php?s='.$search, 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'games-list');
 
 $pagination =  new Pagination($config);
 
 if($check->isMobile()){
 	$query = $db->query("SELECT id FROM games WHERE status = 1 AND mobile = 1 AND name LIKE '%".$search."%' ORDER BY name DESC LIMIT $limit");
 } else {
 	$query = $db->query("SELECT id FROM games WHERE status = 1 AND name LIKE '%".$search."%' ORDER BY name DESC LIMIT $limit"); 		
 }
 
 if($query->num_rows > 0){

	echo '<div id="games-list">';
 
 	 while($sdata = $query->fetch_assoc()){
				$game = $get->game($sdata["id"], $get->system("smart_cache"));
				$rating = $get->gameStars($game["plays"], "short"); 					 	 
				$thumb = $get->thumb($game["thumb"], $game["name"], $secure, $get);
					echo '<div class="col-md-3 pro-1 wow bounceIn gameDesc" data-tipso="'.$game["description"].'">
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
						
						</div>';
													
   } else { 
   
  echo '<div class="alert alert-warning text-center">
  <h3>'.$lang["error_nogames_search"].'</h3>
  <p class="lead">'.$lang["error_nogames_search_desc"].'</p>
  </div>';
  
   } ?>

		   </div>