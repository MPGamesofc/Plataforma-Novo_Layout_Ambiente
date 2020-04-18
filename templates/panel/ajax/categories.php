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
    $queryNum = $db->query("SELECT COUNT(*) as catNum FROM categories ORDER BY id ASC");        
    $resultNum = $queryNum->fetch_assoc();   
    $rowCount = $resultNum['catNum'];    
	$config = array('baseURL'=>$get->system("site_url") . '/templates/panel/ajax/categories.php', 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'category_list'); 
	$pagination =  new Pagination($config);   
	$query = $db->query("SELECT id, name, description FROM categories ORDER BY id ASC LIMIT $start, $limit");    	
    
	if($query->num_rows > 0){ 
?>
 
 	<div id="reports_list">
		<table class="table table-hover">
            <thead class="text-success">
            <th><?php echo $lang["thead_id"]; ?></th>
            <th><?php echo $lang["thead_name"]; ?></th>
            <th><?php echo $lang["thead_description"]; ?></th>
            <th class="text-center" colspan="3"><?php echo $lang["thead_options"]; ?></th>
			</thead>
							
            <tbody>	   				
			<?php
			while($data = $query->fetch_assoc()){					
				echo '<tr class="cat-' . $data["id"] . ' animated bounceIn">
					<td>' . $data["id"] . '</td>
					<td>' . $data["name"] . '</td>
					<td>' . $data["description"] . '</td>
					<td class="text-center"><a href="' . $get->system("site_url") . '/panel/edit/movegames/' . $data["id"] . '" class="btn btn-xs btn-info">'.$lang["move_btn"].'</a></td> 					
					<td class="text-center"><a href="' . $get->system("site_url") . '/panel/edit/category/' . $data["id"] . '" class="btn btn-xs btn-success">' . $lang["edit_btn"] . '</a></td>
					<td class="text-center"><a href="javascript:void()" onclick="deleteCat(' . $data["id"] . ')" class="btn btn-xs btn-danger">' . $lang["delete_btn"] . '</a></td>
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
  <h3>'.$lang["error_nocategories_panel"].'</h3> 		
  <p class="lead">'.$lang["error_nocategories_panel_desc"].'</p> 	
  </div>';  
  }
} else {
 	die("error");
} 
?>