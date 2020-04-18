<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead_pages"]; ?> <a href="<?php echo $get->system('site_url'); ?>/panel/new/page" class="btn btn-md btn-success"><i class="fa fa-edit"></i> <?php echo $lang["parts_pagebtn_panel"]; ?></a></h4> 
            </div>
            <div class="card-content">
                <?php
				$limit = 10;
				$queryNum = $db->query("SELECT COUNT(*) as pageNum FROM pages ORDER BY id DESC");
				$resultNum = $queryNum->fetch_assoc();
				$rowCount = $resultNum['pageNum'];
				$config = array('baseURL' => $get->system('site_url') . '/templates/panel/ajax/pages.php', 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'page_list');
				$pagination = new Pagination($config);
				$query = $db->query("SELECT * FROM pages ORDER BY id DESC LIMIT $limit");
				if ($query->num_rows > 0) { 
				?>

                    <div id="page_list">
                       <table class="table table-hover">
                            <thead class="text-success">
                                <th><?php echo $lang["thead_id"]; ?></th>
                                <th><?php echo $lang["thead_name"]; ?></th>
                                <th class="text-center" colspan="2"><?php echo $lang["thead_options"]; ?></th>
                            </thead>
							
							<tbody>
                            <?php
							while ($data = $query->fetch_assoc()) {
								echo '<tr class="page-' . $data["id"] . '  animated bounceIn">
									<td>' . $data["id"] . '</td>
									<td><a href="' . $get->system("site_url") . '/page/' . $secure->washName($data["name"]) . '-' . $data["id"] . '.html">' . $data["name"] . '</a></td>
									<td class="text-center"><a href="' . $get->system("site_url") . '/panel/edit/page/' . $data["id"] . '" class="btn btn-xs btn-success">' . $lang["edit_btn"] . '</a></td>
									<td class="text-center"><a href="javascript:void()" onclick="deletePage(' . $data["id"] . ')" class="btn btn-xs btn-danger">' . $lang["delete_btn"] . '</a></td>
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
					  <h3>' . $lang["error_nopages_panel"] . '</h3> 		
					  <p class="lead">' . $lang["error_nopages_panel_desc"] . '</p> 	
					  </div>';
					} 
					?>
            </div>
        </div>
    </div>
</div>