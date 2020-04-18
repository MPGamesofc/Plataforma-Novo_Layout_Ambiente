<div class="content">
    <div class="container-fluid">
        <div class="card animated zoomIn">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead_games"]; ?></h4>
            </div>
            <div class="card-content">
                <div class="text-center">
                    <form id="search-games">
                        <div class="form-group">
                            <input type="text" name="game" class="form-control game" placeholder="<?php echo $lang["placeholder_gamesearch"]; ?>">
                        </div>
                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-search"></i> <?php echo $lang["search_btn"]; ?></button>
                    </form>
                    <div class="search-results"></div>
                </div>
            </div>
        </div>

        <div class="card animated fadeInRight">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead2_games"]; ?></h4>
            </div>
            <div class="card-content">
                <?php
				$limit = 10;
				$queryNum = $db->query("SELECT COUNT(*) as gameNum FROM games ORDER BY id DESC");
				$resultNum = $queryNum->fetch_assoc();
				$rowCount = $resultNum['gameNum'];
				$config = array('baseURL' => $get->system('site_url') . '/templates/panel/ajax/games.php', 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'games_list');
				$pagination = new Pagination($config);
				$query = $db->query("SELECT id FROM games ORDER BY id DESC LIMIT $limit");
				if ($query->num_rows > 0) { 
				?>

                    <div id="games_list">
                        <table class="table table-hover">
                            <thead class="text-success">
                                <th><?php echo $lang["panel_manager_games_title"]; ?></th>
                                <th><?php echo $lang["panel_manager_games_status"]; ?></th>
								<th><?php echo $lang["panel_manager_games_author"]; ?></th>
                                <th class="text-center" colspan="2">
                                    <?php echo $lang["thead_options"]; ?>
                                </th>
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
					  <h3>' . $lang["error_nolanguages_panel"] . '</h3> 		
					  <p class="lead">' . $lang["error_nolanguages_panel_desc"] . '</p> 	
					  </div>';
					} 
					?>
            </div>
        </div>
    </div>
</div>