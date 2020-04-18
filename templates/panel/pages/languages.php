<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead_language"]; ?>  <a href="<?php echo $get->system('site_url'); ?>/panel/new/language" class="btn btn-md btn-success"><i class="fa fa-edit"></i> <?php echo $lang["parts_langbtn_panel"]; ?></a></h4>
            </div>
            <div class="card-content">
                <?php
				$limit = 10;
				$queryNum = $db->query("SELECT COUNT(*) as langNum FROM languages ORDER BY id ASC");
				$resultNum = $queryNum->fetch_assoc();
				$rowCount = $resultNum['langNum'];
				$config = array('baseURL' => $get->system('site_url') . '/templates/panel/ajax/languages.php', 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'language_list');
				$pagination = new Pagination($config);
				$query = $db->query("SELECT id, name, code, country_code, rtl FROM languages ORDER BY id ASC LIMIT $limit");
				if ($query->num_rows > 0) { 
				?>

                    <div id="language_list">
                        <table class="table table-hover">
                            <thead class="text-success">
                                <th><?php echo $lang["thead_name"]; ?></th>
                                <th><?php echo $lang["thead_code"]; ?></th>
                                <th><?php echo $lang["thead_ccode"]; ?></th>
                                <th><?php echo $lang["thead_rtl"]; ?></th>
                                <th class="text-center" colspan="2"> <?php echo $lang["thead_options"]; ?></th>
                            </thead>
							
							<tbody>
                            <?php
							while ($data = $query->fetch_assoc()) {
								if ($data["rtl"] == 0) {
									$rtl = $lang["select_no"];
								} else {
									$rtl = $lang["select_yes"];
								}
								echo '<tr class="lang-' . $data["id"] . ' animated bounceIn">
										<td>' . $data["name"] . '</td>
										<td>' . $data["code"] . '</td>
										<td>' . $data["country_code"] . '</td>
										<td>' . $rtl . '</td> 			 			
										<td class="text-center"><a href="' . $get->system("site_url") . '/panel/edit/language/' . $data["id"] . '" class="btn btn-xs btn-success">' . $lang["edit_btn"] . '</a></td>
										<td class="text-center"><a href="javascript:void()" onclick="deleteLang(' . $data["id"] . ')" class="btn btn-xs btn-danger">' . $lang["delete_btn"] . '</a></td>
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
					  <h3>' . $lang["error_nolanguages_panel"] . '</h3> 		
					  <p class="lead">' . $lang["error_nolanguages_panel_desc"] . '</p> 	
					  </div>';
					} 
					?>
            </div>
        </div>
    </div>
</div>