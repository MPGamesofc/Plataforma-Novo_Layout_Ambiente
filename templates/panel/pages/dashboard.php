<?php
$stat_games = $db->query("SELECT id FROM games");
$stat_users = $db->query("SELECT id FROM users");
$stat_banned = $db->query("SELECT id FROM users WHERE banned = 1");
$stat_comments = $db->query("SELECT id FROM comments");
$stat_categories = $db->query("SELECT id FROM categories");
$stat_lang = $db->query("SELECT id FROM languages");
$stat_pages = $db->query("SELECT id FROM pages");
$stat_reports = $db->query("SELECT id FROM reports");
$total_games = number_format($stat_games->num_rows);
$total_users = number_format($stat_users->num_rows);
$total_banned = number_format($stat_banned->num_rows);
$total_comments = number_format($stat_comments->num_rows);
$total_categories = number_format($stat_categories->num_rows);
$total_lang = number_format($stat_lang->num_rows);
$total_pages = number_format($stat_pages->num_rows);
$total_reports = number_format($stat_reports->num_rows);
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="green">
                            <i class="fa fa-gamepad"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_games"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_games; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="orange">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_users"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_users; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="blue">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_categories"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_categories; ?>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="red">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_reports"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_reports; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="green">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_comments"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_comments; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="orange">
                            <i class="fa fa-align-center"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_pages"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_pages; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="blue">
                            <i class="fa fa-language"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_languages"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_lang; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats animated bounceIn">
                        <div class="card-header" data-background-color="red">
                            <i class="fa fa-exclamation-circle"></i>
                        </div>
                        <div class="card-content">
                            <p class="category"><?php echo $lang["panel_dashboard_banned"]; ?></p>
                            <h3 class="title">
                                <?php echo $total_banned; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card animated fadeInLeft">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title"><i class="fa fa-edit"></i> <?php echo $lang["panel_dashboard_recentgames"]; ?></h4>
                        </div>
                        <div class="card-content table-responsive">
                            <?php 
							$get_new = $db->query("SELECT id FROM games ORDER BY id DESC LIMIT 5");
							if($get_new->num_rows > 0){
							?>
                            <table class="table table-hover">
                                <thead class="text-success">
                                    <th><?php echo $lang["panel_recentgames_id"]; ?></th>
                                    <th><?php echo $lang["panel_recentgames_name"]; ?></th>
                                    <th><?php echo $lang["panel_recentgames_category"]; ?></th>
                                    <th><?php echo $lang["panel_recentgames_author"]; ?></th>
                                </thead>
                                <tbody>
                                    <?php
									while($gdata = $get_new->fetch_assoc()){
										$game = $get->game($gdata["id"], $get->system("smart_cache"));
										$get_author = $db->query("SELECT username FROM users WHERE id = ".$game["uid"]." LIMIT 1");
										$adata = $get_author->fetch_assoc();
										$get_cat = $db->query("SELECT name FROM categories WHERE id = ".$game["category"]." LIMIT 1");
										$cdata = $get_cat->fetch_assoc();
										echo "<tr>
											<td>".$game["id"]."</td>
											<td>".ucfirst($game["name"])."</td>
											<td>".ucfirst($cdata["name"])."</td>
											<td>".ucfirst($adata["username"])."</td>
											</tr>";
									}
									?>
                                </tbody>
                            </table>
                            <?php
							} else {
								echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> '.$lang["panel_dashboard_nogames"].'</div>';
							}
	                        ?>
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card animated fadeInRight">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title"><i class="fa fa-comments"></i> <?php echo $lang["panel_dashboard_recentcomments"]; ?></h4>
                        </div>
                        <div class="card-content table-responsive">
                            <?php 
							$get_new = $db->query("SELECT gid, uid, message FROM comments ORDER BY id DESC LIMIT 5");
							if($get_new->num_rows > 0){
							?>
                            <table class="table table-hover">
                                <thead class="text-success">
                                    <th><?php echo $lang["panel_recentcomments_game"]; ?></th>
                                    <th><?php echo $lang["panel_recentcomments_comment"]; ?></th>
                                    <th><?php echo $lang["panel_recentcomments_commentator"]; ?></th>
                                </thead>
                                <tbody>
                                    <?php
									while($cdata = $get_new->fetch_assoc()){
										$game = $get->game($cdata["gid"], $get->system("smart_cache"));
										$get_user = $db->query("SELECT username FROM users WHERE id = ".$cdata["uid"]." LIMIT 1");
										$udata = $get_user->fetch_assoc();
										echo "<tr>
											<td>".$game["name"]."</td>
											<td>".ucfirst($cdata["message"])."</td>
											<td>".ucfirst($udata["username"])."</td>
											</tr>";
									}
									?>
                                </tbody>
                            </table>
                            <?php
							} else {
								echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> '.$lang["panel_dashboard_nocomments"].'</div>';
							}
	                        ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card animated fadeInLeft">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title"><i class="fa fa-users"></i> <?php echo $lang["panel_dashboard_recentusers"]; ?></h4>
                        </div>
                        <div class="card-content table-responsive">
                            <?php 
							$get_new = $db->query("SELECT id, username, email, registered FROM users ORDER BY id DESC LIMIT 5");
							if($get_new->num_rows > 0){ 
							?>
                            <table class="table table-hover">
                                <thead class="text-success">
                                    <th><?php echo $lang["panel_recentusers_id"]; ?></th>
                                    <th><?php echo $lang["panel_recentusers_username"]; ?></th>
                                    <th><?php echo $lang["panel_recentusers_email"]; ?></th>
                                    <th><?php echo $lang["panel_recentusers_date"]; ?></th>
                                </thead>
                                <tbody>
                                    <?php
									while($udata = $get_new->fetch_assoc()){
										if(empty($udata["email"])){
											$email = "Social Account (No Email)";
										} else {
											$email = $udata["email"];
										}
										echo "<tr>
	                                        <td>".$udata["id"]."</td>
	                                        <td>".ucfirst($udata["username"])."</td>
	                                        <td>".$email."</td>
											<td>".$sys->timeAgo($udata["registered"], $lang)."</td>
											</tr>";
									}
	                                ?>
                                </tbody>
                            </table>
                            <?php
							} else {
								echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> '.$lang["panel_dashboard_nousers"].'</div>';
							}
	                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card animated fadeInRight">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title"><i class="fa fa-exclamation-triangle"></i> <?php echo $lang["panel_dashboard_recentreports"]; ?></h4>
                        </div>
                        <div class="card-content table-responsive">
                            <?php 
							$get_new = $db->query("SELECT gid, problem FROM reports ORDER BY id DESC LIMIT 5");
							if($get_new->num_rows > 0){
							?>
                            <table class="table table-hover">
                                <thead class="text-success">
                                    <th><?php echo $lang["panel_recentreports_id"]; ?></th>
                                    <th><?php echo $lang["panel_recentreports_game"]; ?></th>
                                    <th><?php echo $lang["panel_recentreports_problem"]; ?></th>
                                </thead>
                                <tbody>
                                    <?php
									while($rdata = $get_new->fetch_assoc()){
										$game = $get->game($rdata["gid"], $get->system("smart_cache"));
										echo "<tr>
											<td>".$game["id"]."</td>
											<td>".ucfirst($game["name"])."</td>
											<td>".$rdata["problem"]."</td>
											</tr>";
									}
									?>
                                </tbody>
                            </table>
                            <?php
							} else {
								echo '<div class="alert alert-info text-center"><i class="fa fa-info-circle"></i> '.$lang["panel_dashboard_noreports"].'</div>';
							}
	                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>