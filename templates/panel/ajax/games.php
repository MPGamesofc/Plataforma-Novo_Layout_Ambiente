<?php
/**
 * Arcadia - Arcade Gaming Platform
 * @author Norielle Cruz <http://noriellecruz.com>
 */ 

/**
 * Start Session
 */
 
 session_start();

/**
 * Require Database
 */

 require '../../../system/database.php';
 
/**
 * Require System Class
 */
 
 require '../../../system/sys.class.php';
 
 $sys = new System;
 
/**
 * Require Security Class
 */
 
 require '../../../system/security.class.php';
 
 $secure = new Security; 
 
/**
 * Require Get Class
 */
 
 require '../../../system/get.class.php';
 
 $get = new Get;
 
/**
 * Require Mobile Detect
 */
 
 require '../../../system/external/Mobile_Detect.php'; 
 
 $device = new Mobile_Detect; 

/**
 * Require Check Class
 */
 
 require '../../../system/check.class.php';
 
 $check = new Check;
 
/**
 * Require Pagination Class
 */
 
 require '../../../system/pagination.class.php';
 
/**
 * Language Variable
 */
 
$lang = $get->language($get->system("default_lang"), "../../../languages/");
 
 /**
  * Process Requests
  */  

if(isset($_POST['page'])){ 	    

    $start = !empty($_POST['page'])?$_POST['page']:0;   
    $limit = 10; 
    $queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games ORDER BY id DESC");        
    $resultNum = $queryNum->fetch_assoc();    
    $rowCount = $resultNum['gameNum'];   
	$config = array('baseURL'=>$get->system("site_url") . '/templates/panel/ajax/games.php', 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'games_list');  
	$pagination =  new Pagination($config);   
	$query = $db->query("SELECT id, status, name, source, category FROM games ORDER BY id DESC LIMIT $start, $limit");    	
    
	if($query->num_rows > 0){ 
?>
 
 	<div id="games_list">
				<table class="table table-hover">
					<thead class="text-success">
					<th><?php echo $lang["panel_manager_games_title"]; ?></th>
                    <th><?php echo $lang["panel_manager_games_status"]; ?></th>
					<th><?php echo $lang["panel_manager_games_author"]; ?></th>					
					<th class="text-center" colspan="2"><?php echo $lang["thead_options"]; ?></th>
					</thead>
					<tbody>
 
				<?php
				while ($data = $query->fetch_assoc()) {
					$game = $get->game($data["id"], $get->system("smart_cache"));
					if ($game["status"] == 0) {
						$status = $lang["label_pending"];
					} else {
						$status = $lang["label_published"];
					}
					$get_author = $db->query("SELECT username FROM users WHERE id = '".$game["uid"]."' LIMIT 1");
					if($get_author->num_rows > 0){
						$adata = $get_author->fetch_assoc();
						$author = ucfirst($adata["username"]);
					} else {
						$author = $lang["label_unknown"];
					}
					echo '<tr class="game-' . $game["id"] . '">
						<td>' . $game["name"] . '</td>
						<td>' . $status . '</td> 
						<td>' . $author . '</td>											
						<td class="text-center"><a href="' . $get->system("site_url") . '/game/edit/' . $game["id"] . '" class="btn btn-xs btn-success">' . $lang["edit_btn"] . '</a></td>
						<td class="text-center"><a href="javascript:void()" onclick="deleteGame(' . $game["id"] . ')" class="btn btn-xs btn-danger">' . $lang["delete_btn"] . '</a></td>
						</tr>';
				} 
				?>	
			</tbody>				
										
		</table>
						
		<div class="clearfix"></div> 										
							
		<div class="text-center">	
		<?php echo $pagination->createLinks(); ?> 							
		</div> 	
	</div>				

<?php 
} else {
  echo '<div class="alert alert-warning text-center">
  <h3>'.$lang["error_nolanguages_panel"].'</h3> 		
  <p class="lead">'.$lang["error_nolanguages_panel_desc"].'</p> 	
  </div>';
  }
} else {
 	 die("error");
} 
?>