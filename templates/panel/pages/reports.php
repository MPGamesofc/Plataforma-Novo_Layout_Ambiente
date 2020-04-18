<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead_reports"]; ?></h4>
            </div>
            <div class="card-content">
                <?php
				$limit = 10;
				$queryNum = $db->query("SELECT COUNT(*) as reportNum FROM reports ORDER BY id DESC");
				$resultNum = $queryNum->fetch_assoc();
				$rowCount = $resultNum['reportNum'];
				$config = array('baseURL' => $get->system('site_url') . '/templates/panel/ajax/reports.php', 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'reports_list');
				$pagination = new Pagination($config);
				$query = $db->query("SELECT id, gid, problem FROM reports ORDER BY id DESC LIMIT $limit");
				if ($query->num_rows > 0) { 
				?>

                    <div id="reports_list">
                        <table class="table table-hover">
							<thead class="text-success">
                                <th><?php echo $lang["thead_id"]; ?></th>
                                <th><?php echo $lang["thead_game"]; ?></th>
                                <th><?php echo $lang["thead_problem"]; ?></th>
                                <th class="text-center" colspan="2"><?php echo $lang["thead_options"]; ?></th>
                            </thead>
							
							<tbody>
                            <?php
							while ($data = $query->fetch_assoc()) {
								$game = $get->game($data["gid"], $get->system("smart_cache"));
								echo '<tr class="report-'.$data["id"].' animated bounceIn">
									<td>' . $game["id"] . '</td>
									<td><a href="' . $get->system("site_url") . '/play/' . $secure->washName($game["name"]) . '-' . $game["id"] . '.html">' . $game["name"] . '</a></td>
									<td>' . $data["problem"] . '</td> 			
									<td class="text-center"><a href="' . $get->system("site_url") . '/game/edit/' . $game["id"] . '" class="btn btn-xs btn-success">' . $lang["edit_btn"] . '</a></td>
									<td class="text-center"><a href="javascript:void()" onclick="deleteReport(' . $data["id"] . ')" class="btn btn-xs btn-danger">' . $lang["delete_btn"] . '</a></td>
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
					  <h3>' . $lang["error_noreports_panel"] . '</h3> 		
					  <p class="lead">' . $lang["error_noreports_panel_desc"] . '</p> 	
					  </div>';
					} 
					?>
            </div>
        </div>
    </div>
</div>