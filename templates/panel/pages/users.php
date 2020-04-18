<div class="content">
    <div class="container-fluid">
        <div class="card animated zoomIn">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead_users"]; ?></h4>
            </div>
            <div class="card-content">
                <div class="text-center">
                    <form id="search-users">
                        <div class="form-group">
                            <input type="text" name="user" class="form-control user" placeholder="<?php echo $lang['placeholder_enterusername']; ?>">
                        </div>
                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-search"></i> <?php echo $lang["search_btn"]; ?></button>
                    </form>
                    <div class="search-results"></div>
                </div>
            </div>
        </div>

        <div class="card animated fadeInRight">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_managerhead2_users"]; ?></h4>
            </div>
            <div class="card-content">
                <?php
				$limit = 10;
				$queryNum = $db->query("SELECT COUNT(*) as usersNum FROM users ORDER BY id DESC");
				$resultNum = $queryNum->fetch_assoc();
				$rowCount = $resultNum['usersNum'];
				$config = array('baseURL' => $get->system('site_url') . '/templates/panel/ajax/users.php', 'totalRows' => $rowCount, 'perPage' => $limit, 'contentDiv' => 'users_list');
				$pagination = new Pagination($config);
				$query = $db->query("SELECT id, username, exp, email, banned FROM users ORDER BY id DESC LIMIT $limit");
				if ($query->num_rows > 0) { 
				?>

                    <div id="users_list">
                        <table class="table table-hover">
                            <thead class="text-success">
                                <th><?php echo $lang["panel_manager_users_username"]; ?></th>
                                <th><?php echo $lang["panel_manager_users_email"]; ?></th>
                                <th><?php echo $lang["panel_manager_users_exp"]; ?></th>
                                <th><?php echo $lang["panel_manager_users_banned"]; ?></th>
                                <th class="text-center" colspan="2">
                                    <?php echo $lang["thead_options"]; ?>
                                </th>
                            </thead>
                            <tbody>

                                <?php
								while ($data = $query->fetch_assoc()) {
									if($data["banned"] == 1){
										$banned = $lang["banned_yes"];
									} else {
										$banned = $lang["banned_no"];
									}
									echo '<tr class="user-' . $data["id"] . '">
											<td>' . $data["username"] . '</td>	
											<td>' . $data["email"] . '</td>
											<td>' . number_format($data["exp"]) . '</td>
											<td>' . $banned . '</td>
											<td class="text-center"><a href="' . $get->system("site_url") . '/panel/edit/user/' . $data["id"] . '" class="btn btn-xs btn-success">' . $lang["edit_btn"] . '</a></td>
											<td class="text-center"><a href="javascript:void()" onclick="deleteUser(' . $data["id"] . ')" class="btn btn-xs btn-danger">' . $lang["delete_btn"] . '</a></td>
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