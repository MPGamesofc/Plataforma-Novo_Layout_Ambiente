<div class="navbar-collapse collapse" id="nav-main">
    <ul class="nav navbar-nav">
        <li><a href="<?php echo $get->system('site_url'); ?>"><span><i class="fa fa-home"></i> <?php echo $lang["nav_home"]; ?></a></span>
        </li>
        <?php if ($data["page"] == "home") { ?>
        <li><a href="javascript:void()" onclick="smoothScroll('#featured')"><span><i class="fa fa-star"></i> <?php echo $lang["nav_featuredgames"]; ?></span></a></li>
        <li><a href="javascript:void()" onclick="smoothScroll('#popular')"><span><i class="fa fa-random"></i> <?php echo $lang["nav_populargames"]; ?></span></a></li>
        <?php } ?>
        <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-cubes"></i> <?php echo $lang["nav_categories"]; ?> <b class="caret"></b></span></a>

            <ul class="dropdown-menu mega-dropdown-menu row">
                <li class="col-sm-3">
                    <ul>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
										$get_games = $db->query("SELECT id FROM games ORDER BY RAND() LIMIT 5");
										$cg_index = 1;
										while($g_game = $get_games->fetch_assoc()){
											$game_cat = $get->game($g_game["id"], $get->system("smart_cache"));
											$thumb = $get->thumb($game_cat["thumb"], $game_cat["name"], $secure, $get);
											if($cg_index == 1){
												echo '<div class="item active">
													<a href="#" class="cat-games">'.$thumb.'</a>
													<a href="'.$get->system("site_url").'/play/'.$secure->washName($game_cat["name"]).'-'.$game_cat["id"].'.html" class="btn btn-success play-b cat-play">' . $lang["play_btn"] . '</a>
												  </div>';
											} else {
												echo '<div class="item">
													<a href="#" class="cat-games">'.$thumb.'</a>
													<a href="'.$get->system("site_url").'/play/'.$secure->washName($game_cat["name"]).'-'.$game_cat["id"].'.html" class="btn btn-success play-b cat-play">' . $lang["play_btn"] . '</a>
												  </div>';
											}
											$cg_index++;
										}
										?>
                            </div>
                        </div>
                        <!-- /.carousel -->
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $get->system('site_url'); ?>/category/all">
                                <?php echo $lang["parts_allgames_category"]; ?> <span class="fa fa-chevron-right pull-right"></span></a>
                        </li>
                    </ul>
                </li>
                <li class="col-sm-3">
                    <ul>
                        <?php
									$get_c1 = $db->query("SELECT name, seo FROM categories LIMIT 10");
									while ($category = $get_c1->fetch_assoc()) {
										if(empty($category["seo"])){
											echo '<li><a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["name"])) . '">' . ucfirst($category["name"]) . '</a></li>';
										} else {
											echo '<li><a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["seo"])) . '">' . ucfirst($category["name"]) . '</a></li>';
										}										
									}
									?>
                    </ul>
                </li>
                <li class="col-sm-3">
                    <ul>
                        <?php
									$get_c2 = $db->query("SELECT name, seo FROM categories LIMIT 10, 10");
									while ($category = $get_c2->fetch_assoc()) {
										if(empty($category["seo"])){
											echo '<li><a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["name"])) . '">' . ucfirst($category["name"]) . '</a></li>';
										} else {
											echo '<li><a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["seo"])) . '">' . ucfirst($category["name"]) . '</a></li>';
										}
									}
									?>
                    </ul>
                </li>
                <li class="col-sm-3">
                    <ul>
                        <?php
									$get_c3 = $db->query("SELECT name, seo FROM categories LIMIT 20, 10");
									while ($category = $get_c3->fetch_assoc()) {
										if(empty($category["seo"])){
											echo '<li><a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["name"])) . '">' . ucfirst($category["name"]) . '</a></li>';
										} else {
											echo '<li><a href="' . $get->system('site_url') . "/category/" . urlencode(strtolower($category["seo"])) . '">' . ucfirst($category["name"]) . '</a></li>';
										}
									}
									?>
                    </ul>
                </li>
                <?php
								 $get_tcat = $db->query("SELECT id FROM categories");
								 if($get_tcat->num_rows > 30){ 
								?>
                    <li class="col-md-9 pull-right hidden-xs hidden-sm">
                        <button class="btn btn-md btn-success btn-block" data-toggle="modal" data-target="#cat_nav"><i class="fa fa-cubes"></i> <?php echo $lang["parts_nav_catbtn"];?></button>
                    </li>
                    <li class="col-md-12 text-center hidden-md hidden-lg">
                        <button class="btn btn-md btn-success" data-toggle="modal" data-target="#cat_nav"><i class="fa fa-cubes"></i> <?php echo $lang["parts_nav_catbtn"];?></button>
                    </li>
                    <?php } ?>
            </ul>
        </li>
        <li><a href="<?php echo $get->system('site_url'); ?>/leaderboard"><span><i class="fa fa-trophy"></i> <?php echo $lang["nav_leaderboard"]; ?></span></a></li>
        <?php if($get->system("challenge_daily") == 1 OR $get->system("challenge_weekly") == 1 OR $get->system("challenge_monthly") == 1){ ?>
        <li><a href="<?php echo $get->system('site_url'); ?>/challenge"><span><i class="fa fa-flag-checkered"></i> <?php echo $lang["nav_challenge"]; ?></span></a></li>
        <?php } ?>
            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-language"></i> <?php echo $lang["nav_language"]; ?> <b class="caret"></b></span></a>

                <ul class="dropdown-menu mega-dropdown-menu row">
                    <li class="col-sm-12">
                        <ul class="text-left">
                            <?php
									$get_lang1 = $db->query("SELECT name, code, country_code FROM languages");
									while ($language = $get_lang1->fetch_assoc()) {
										if ($_SESSION["lang_code"] == $language["code"]) {
											echo '<a href="' . $get->system('site_url') . '/language/' . $language["code"] . '" class="btn btn-success lang-btn-active"><img src="' . $get->system("site_url") . '/templates/' . $get->system("template") . '/assets/images/blank.png" class="flag flag-' . $language["country_code"] . '" alt="' . $language["name"] . '"> ' . $language["name"] . '</a>&nbsp;&nbsp;';
										} else {
											echo '<a href="' . $get->system('site_url') . '/language/' . $language["code"] . '" class="btn btn-default lang-btn"><img src="' . $get->system("site_url") . '/templates/' . $get->system("template") . '/assets/images/blank.png" class="flag flag-' . $language["country_code"] . '" alt="' . $language["name"] . '"> ' . $language["name"] . '</a>&nbsp;&nbsp;';
										}
									}
									?>
                        </ul>
                    </li>
                </ul>
            </li>
    </ul>
</div>