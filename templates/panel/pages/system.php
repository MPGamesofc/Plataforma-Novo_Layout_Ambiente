<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card animated fadeInLeft">
                    <div class="card-header" data-background-color="green">
                        <h4 class="title">
                            <?php echo $lang["panel_formmenu_options"]; ?>
                        </h4>
                    </div>
                    <div class="card-content">
                        <ul class="list-group">
                            <li href="#system" class="list-group-item active" data-toggle="tab"><i class="fa fa-cogs"></i>
                                <?php echo $lang["panel_sidebar_1"]; ?>
                            </li>
                            <li href="#logo" class="list-group-item" data-toggle="tab"><i class="fa fa-tint"></i>
                                <?php echo $lang["panel_sidebar_2"]; ?>
                            </li>
                            <li href="#sitemap" class="list-group-item" data-toggle="tab"><i class="fa fa-map"></i>
                                <?php echo $lang["panel_sidebar_3"]; ?>
                            </li>
                            <li href="#cron" class="list-group-item" data-toggle="tab"><i class="fa fa-cog"></i>
                                <?php echo $lang["panel_sidebar_4"]; ?>
                            </li>
                            <li href="#comments" class="list-group-item" data-toggle="tab"><i class="fa fa-comments"></i>
                                <?php echo $lang["panel_sidebar_comments"]; ?>
                            </li>
							<li href="#search" class="list-group-item" data-toggle="tab"><i class="fa fa-search"></i>
                                 <?php echo $lang["panel_sidebar_search"]; ?>
                            </li>
                            <li href="#api" class="list-group-item" data-toggle="tab"><i class="fa fa-code"></i>
                                <?php echo $lang["panel_sidebar_5"]; ?>
                            </li>
                            <li href="#uploads" class="list-group-item" data-toggle="tab"><i class="fa fa-upload"></i>
                                <?php echo $lang["panel_sidebar_6"]; ?>
                            </li>
                            <li href="#limits" class="list-group-item" data-toggle="tab"><i class="fa fa-exclamation-circle"></i>
                                <?php echo $lang["panel_sidebar_7"]; ?>
                            </li>
                            <li href="#gameads" class="list-group-item" data-toggle="tab"><i class="fa fa-money"></i>
                                <?php echo $lang["panel_sidebar_8"]; ?>
                            </li>
                            <li href="#chat" class="list-group-item" data-toggle="tab"><i class="fa fa-comments"></i>
                                <?php echo $lang["panel_sidebar_9"]; ?>
                            </li>
                            <li href="#exp" class="list-group-item" data-toggle="tab"><i class="fa fa-bolt"></i>
                                <?php echo $lang["panel_sidebar_10"]; ?>
                            </li>
                            <li href="#challenge" class="list-group-item" data-toggle="tab"><i class="fa fa-flag-checkered"></i>
                                <?php echo $lang["panel_sidebar_12"]; ?>
                            </li>
                            <li href="#update" class="list-group-item" data-toggle="tab"><i class="fa fa-info-circle"></i>
                                <?php echo $lang["panel_sidebar_11"]; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="system">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel1"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-system">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_sitename_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Required. The name of your arcade site."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="site_name" class="form-control site_name" value="<?php echo $get->system('site_name'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('site_name'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_siteurl_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The install location of the script, Please don't add trailing slash '/' at the end!"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="url" name="site_url" class="form-control site_url" value="<?php echo $get->system('site_url'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('site_url'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_metatags_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="SEO Meta Tags of the site"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="tags" class="form-control tags" value="<?php echo $get->system('tags'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_metadesc_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="SEO Meta Description of the site"><i class="fa fa-question-circle"></i>
										</span>
                                            <textarea name="description" class="form-control description"><?php echo $get->system("description"); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_analytics"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Add your google analytics tracking id here. example: UA-XXXXX-X"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="analytics" class="form-control" value="<?php echo $get->system('analytics'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('analytics'); ?>';}" placeholder="<?php echo $lang['placeholder_analytics']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_smartcache_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, System data will be cached to reduce the database load, useful for arcade sites with thousands of visitors. Live data updates will be disabled, updates will be made with cron job. This is not recommended for shared hosting servers! Please turn it off if you are having problems with slow loading times!"><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="smart_cache" class="form-control smart_cache">
											<option value="1" <?php if ($get->system("smart_cache") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("smart_cache") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_cdnassets_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Stock assets like bootstrap js, jquery js and others will be replaced by cdn hosted versions and will help to load the site faster."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="cdn_assets" class="form-control cdn_assets">
											<option value="1" <?php if ($get->system("cdn_assets") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("cdn_assets") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_submissions"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to disable game submissions or not. This is useful if you only want the games to be from arcadia game center."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="submissions" class="form-control submissions">
											<option value="1" <?php if ($get->system("submissions") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("submissions") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_template_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The default template to be used by site."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="template" class="form-control template">
											<?php
											$templates = glob("templates/*", GLOB_ONLYDIR);
											foreach($templates as $template){
												$template = str_replace("templates/", "", $template); 
												if($template !== "api" && $template !== "panel"){
													if($template == $get->system("template")){
														echo '<option value="'.$template.'" selected>'.ucfirst($template).'</option>';
													} else {
														echo '<option value="'.$template.'">'.ucfirst($template).'</option>';
													}
												}
											}
											?>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_templatecolor"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The template color theme to be used by site."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="template_color" class="form-control template_color">
											<?php
											$colors = glob("templates/".$get->system("template")."/assets/css/colors/*.css");
											foreach($colors as $color){
												$color = str_replace(".css", "", str_replace("templates/".$get->system("template")."/assets/css/colors/", "", $color));
													if(strtolower($color) == $get->system("template_color")){
														echo '<option value="'.strtolower($color).'" selected>'.ucfirst($color).'</option>';                                    			
													} else {
														echo '<option value="'.strtolower($color).'">'.ucfirst($color).'</option>';      
													} 
											}
											?>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_tootltip"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Games will show a tooltip containing the game description when hovered."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="game_tooltip" class="form-control game_tooltip">
											<option value="1" <?php if ($get->system("game_tooltip") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("game_tooltip") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_antiadblock"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, System will require users to turn off their adblocks to access the site, this is useful if you don't want to lose advertisement revenue."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="anti_adblock" class="form-control anti_adblock">
											<option value="1" <?php if ($get->system("anti_adblock") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("anti_adblock") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_landscape_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, System will notify users to rotate their mobile or tablet device to landscape to maximize their gaming experience."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="landscape_mode" class="form-control landscape_mode">
											<option value="1" <?php if ($get->system("landscape_mode") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("landscape_mode") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_fullscreen_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, A fullscreen button will be shown in the game frame, allowing users to play in full screen mode!"><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="fullscreen" class="form-control fullscreen">
											<option value="1" <?php if ($get->system("fullscreen") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("fullscreen") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_featured_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The categories to be displayed in the featured games section, write the category id's separated by a comma, up to 4 categories only! example: 1, 2, 3, 4"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="featured" class="form-control" value="<?php echo $get->system('featured'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_footlinks_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The page links to be displayed in the useful links section at the footer, write the page id's separated by a comma, example: 1, 2, 3, 4"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="footer_links" class="form-control" value="<?php echo $get->system('footer_links'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-image"></i>
                                            <?php echo $lang["parts_avatar_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose what type of style to be used when showing default avatar. Default avatars only shows if users had not set their avatars."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="default_avatar" class="form-control default_avatar">                                    
											<option value="1" <?php if ($get->system("default_avatar") == 1) { echo " selected"; } ?>>Gmail Style</option>     
											<option value="2" <?php if ($get->system("default_avatar") == 2) { echo " selected"; } ?>>Robohash</option>
											<option value="3" <?php if ($get->system("default_avatar") == 3) { echo " selected"; } ?>>Adorable Avatars</option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_lang_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The default language to be used by site."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="default_lang" class="form-control default_lang">
											<?php
												$get_lang = $db->query("SELECT * FROM languages ORDER BY id ASC");
												while ($language = $get_lang->fetch_assoc()) {
													if ($language["code"] == $get->system("default_lang")) {
														echo '<option value="' . $language["code"] . '" selected>' . $language["name"] . ' (' . $language["code"] . ')</option>';
													} else {
														echo '<option value="' . $language["code"] . '">' . $language["name"] . ' (' . $language["code"] . ')</option>';
													}
												} 
											?>
										</select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="logo">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_logo"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-logo">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_logo"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Upload and use a custom logo for your site. Recommended size: 233x39"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["upload_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="sitemap">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_sitemap"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-sitemap">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_sitemap"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, A sitemap will be generated for submissios to search engines like google, yahoo, bing and more!"><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="sitemap" class="form-control sitemap">
											<option value="1" <?php if ($get->system("sitemap") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("sitemap") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button> <button type="button" class="btn btn-success btn-md sitemap-btn"><i class="fa fa-map"></i> <?php echo $lang["panel_formbtn_sitemap"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cron">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel2"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-cron">
                                        <div class="form-group">
                                            <i class="fa fa-lock"></i>
                                            <?php echo $lang["parts_cronpass_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Create a unique password for arcanox, this password will be used for preventing unwanted cron actions."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="cron_password" class="form-control" value="<?php echo $get->system('cron_password'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('cron_password'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-trash"></i>
                                            <?php echo $lang["parts_trashclear_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Arcanox will check for unused files in the uploads directory and deletes them automatically."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="trash_clear" class="form-control trash_clear">
											<option value="1" <?php if ($get->system("trash_clear") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("trash_clear") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-file"></i>
                                            <?php echo $lang["parts_cacheclear_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Arcanox will automatically clear cache files every 24 hours."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="cache_clear" class="form-control cache_clear">
											<option value="1" <?php if ($get->system("cache_clear") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("cache_clear") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-bullhorn"></i>
                                            <?php echo $lang["parts_shoutclear_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Arcanox will automatically clear the shoutbox every 30 minutes."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="shoutbox_clear" class="form-control shoutbox_clear">
											<option value="1" <?php if ($get->system("shoutbox_clear") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("shoutbox_clear") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="comments">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_comments"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-comments">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_defaultcomments"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, The default system commenting system will be shown."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="default_comments" class="form-control default_comments">
											<option value="1" <?php if ($get->system("default_comments") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("default_comments") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-facebook"></i>
                                            <?php echo $lang["panel_formtitle_fbcomments"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Facebook commenting system will be shown."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="fb_comments" class="form-control fb_comments">
											<option value="1" <?php if ($get->system("fb_comments") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("fb_comments") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-comments"></i>
                                            <?php echo $lang["panel_formtitle_disquscomments"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Disqus commenting system will be shown."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="disqus_comments" class="form-control disqus_comments">
											<option value="1" <?php if ($get->system("disqus_comments") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("disqus_comments") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
										<div class="form-group">
                                            <i class="fa fa-cog"></i> <?php echo $lang["panel_formtitle_disqus"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Your discus shortname, this is required for disqus comments system."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="disqus" class="form-control" value="<?php echo $get->system('disqus'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('disqus'); ?>';}" placeholder="Your disqus shortname here..">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="tab-pane" id="search">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_search"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-search">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_advancesearch"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, The system will translate non-english search queries to english for searching the game database. Useful for arcade sites with thousands of english games."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="advance_search" class="form-control advance_search">
											<option value="1" <?php if ($get->system("advance_search") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("advance_search") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
										<div class="form-group">
                                            <i class="fa fa-cog"></i>
                                             <?php echo $lang["panel_formtitle_detectlang"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Your detect language api key from http://detectlanguage.com, please read the documentation on how to get one."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="detectlang_api" class="form-control" value="<?php echo $get->system('detectlang_api'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('detectlang_api'); ?>';}" placeholder="Your Detect Language API Key">
                                        </div>
										<div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_searchlength_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The character limit for the search string, recommended limit is 3 or above."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="search_length" class="form-control" value="<?php echo $get->system('search_length'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('search_length'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                             <?php echo $lang["panel_formtitle_searchmax"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Limit the search query characters to prevent database overloads."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="search_max" class="form-control" value="<?php echo $get->system('search_max'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('search_max'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>					

                    <div class="tab-pane" id="api">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel3"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-api">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_fbid_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The facebook app id, this is required for facebook login and facebook comments."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="fb_id" class="form-control" value="<?php echo $get->system('fb_id'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('fb_id'); ?>';}" placeholder="<?php echo $lang['placeholder_fbid']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_fbsecret_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The facebook app secret key, this is required for facebook login."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="fb_secret" class="form-control" value="<?php echo $get->system('fb_secret'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('fb_secret'); ?>';}" placeholder="<?php echo $lang['placeholder_fbsecret']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_gpid_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The google app id, this is required for google login."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="gp_id" class="form-control" value="<?php echo $get->system('gp_id'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('gp_id'); ?>';}" placeholder="<?php echo $lang['placeholder_gpid']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_gpsecret_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The google app secret key, this is required for google login."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="gp_secret" class="form-control" value="<?php echo $get->system('gp_secret'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('gp_secret'); ?>';}" placeholder="<?php echo $lang['placeholder_gpsecret']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_twid_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The twitter app consumer key, this is required for twitter login."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="tw_id" class="form-control" value="<?php echo $get->system('tw_id'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('tw_id'); ?>';}" placeholder="<?php echo $lang['placeholder_twid']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_twsecret_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The twitter app consumer secret, this is required for twitter login."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="text" name="tw_secret" class="form-control" value="<?php echo $get->system('tw_secret'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('tw_secret'); ?>';}" placeholder="<?php echo $lang['placeholder_twsecret']; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="uploads">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel4"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-uploads">
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_avatarsize_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The max avatar image file size allowed. In (Bytes), Example: 300000 Bytes == 300KB"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="avatar_size" class="form-control" value="<?php echo $get->system('avatar_size'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('avatar_size'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_coversize_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The max cover image file size allowed. In (Bytes), Example: 300000 Bytes == 300KB"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="cover_size" class="form-control" value="<?php echo $get->system('cover_size'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('cover_size'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_thumbsize_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The max game thumb image file size allowed. In (Bytes), Example: 300000 Bytes == 300KB"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="thumb_size" class="form-control" value="<?php echo $get->system('thumb_size'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('thumb_size'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_gamesize_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The max game swf file size allowed. In (Bytes), Example: 300000 Bytes == 300KB"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="game_size" class="form-control" value="<?php echo $get->system('game_size'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('game_size'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_avatarallowed_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The allowed image formats for avatar image, example: png, jpg, gif. Separate each extensions with a comma. When left blank, default values will be png, jpg, gif"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="avatar_allowed" class="form-control" value="<?php echo $get->system('avatar_allowed'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('avatar_allowed'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_coverallowed_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The allowed image formats for profile cover image, example: png, jpg, gif. Separate each extensions with a comma. When left blank, default values will be png, jpg, gif"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="cover_allowed" class="form-control" value="<?php echo $get->system('cover_allowed'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('cover_allowed'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-upload"></i>
                                            <?php echo $lang["parts_thumballowed_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The allowed image formats for game thumb image, example: png, jpg, gif. Separate each extensions with a comma. When left blank, default values will be png, jpg, gif"><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="thumb_allowed" class="form-control" value="<?php echo $get->system('thumb_allowed'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('thumb_allowed'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="gameads">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel7"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-gameads">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_gamead_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, ads will be shown on top of games and a timer will be shown before playing."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="game_ad" class="form-control">
											<option value="1" <?php if ($get->system("game_ad") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
											<option value="0" <?php if ($get->system("game_ad") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_adduration_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The game ad timer count in seconds."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="game_ad_duration" class="form-control" value="<?php echo $get->system('game_ad_duration'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('game_ad_duration'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="chat">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel8"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-chat">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_enablechat_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, a chat feature will be shown."><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="enable_chat" class="form-control">
												<option value="1" <?php if ($get->system("enable_chat") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("enable_chat") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_guestchat_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, guests will be allowed to chat."><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="guest_chat" class="form-control">
												<option value="1" <?php if ($get->system("guest_chat") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("guest_chat") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_chatfilter_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Add the words to be filtered in shoutbox, filtered words will be shown as ****."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="text" name="chat_filter" class="form-control" value="<?php echo $get->system('chat_filter'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('chat_filter'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="limits">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel5"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-limits">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_onlinelimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show in the online users list, recommended limit is 30 to prevent slow page loads due to high visitor page requests."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="online_limit" class="form-control" value="<?php echo $get->system('online_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('online_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_leaderboardlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show in the leaderboard per page, recommended limit is 12."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="leaderboard_limit" class="form-control" value="<?php echo $get->system('leaderboard_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('leaderboard_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_catpagelimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in categories per page, recommended limit is 12."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="cat_page_limit" class="form-control" value="<?php echo $get->system('cat_page_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('cat_page_limit'); ?>';}">
                                        </div>
										<div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_searchlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in search results per page, recommended limit is 12."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="search_limit" class="form-control" value="<?php echo $get->system('search_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('search_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_latestlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the new games section at homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="latest_limit" class="form-control" value="<?php echo $get->system('latest_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('latest_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_featuredlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the featured section at homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="featured_limit" class="form-control" value="<?php echo $get->system('featured_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('featured_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_popularlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the popular section at homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="popular_limit" class="form-control" value="<?php echo $get->system('popular_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('popular_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_randomlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the random section at homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="random_limit" class="form-control" value="<?php echo $get->system('random_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('random_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_topuserslimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show in the top users section at homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="topusers_limit" class="form-control" value="<?php echo $get->system('topusers_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('topusers_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_favoriteslimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the favorites page of a user."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="favorites_limit" class="form-control" value="<?php echo $get->system('favorites_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('favorites_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_relatedlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the related section at play page."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="related_limit" class="form-control" value="<?php echo $get->system('related_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('related_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_recentsearchlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of search terms to show in the recent search section at the footer."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="recent_search_limit" class="form-control" value="<?php echo $get->system('recent_search_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('recent_search_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i> Recent Played Limit
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to show in the recent played games section in sidebar at the home page."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="recent_played_limit" class="form-control" value="<?php echo $get->system('recent_played_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('recent_played_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_recentcommentslimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of comments to show in the recent comments section in sidebar at the homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="recent_comments_limit" class="form-control" value="<?php echo $get->system('recent_comments_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('recent_comments_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_formtitle_topexp"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show in the top exp earners section in sidebar at the homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="topexp_limit" class="form-control" value="<?php echo $get->system('topexp_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('topexp_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_newuserslimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show in the new users section in sidebar at the homepage."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="recent_users_limit" class="form-control" value="<?php echo $get->system('recent_users_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('recent_users_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_lastplayerslimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show in the last players section in sidebar at the game page."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="recent_players_limit" class="form-control" value="<?php echo $get->system('recent_players_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('recent_players_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_limit_challenge"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of users to show on each challenge sections in the top challengers page."><i class="fa fa-question-circle"></i>
										</span>
                                            <input type="number" name="challenge_limit" class="form-control" value="<?php echo $get->system('challenge_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('challenge_limit'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="exp">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["parts_formheadsettings_panel6"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-exp">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_playingexp_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, users will earn exp when playing games. Exp is added when the ad timer turns 0"><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="gaming_exp" class="form-control">
												<option value="1" <?php if ($get->system("gaming_exp") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("gaming_exp") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_timerexp_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, users will earn exp when staying on a page."><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="timer_exp" class="form-control">
												<option value="1" <?php if ($get->system("timer_exp") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("timer_exp") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_commentexp_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, users will earn exp when adding comments."><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="comment_exp" class="form-control">
												<option value="1" <?php if ($get->system("comment_exp") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("comment_exp") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_addgameexp_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, users will earn exp when their submitted game is published."><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="addgame_exp" class="form-control">
												<option value="1" <?php if ($get->system("addgame_exp") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("addgame_exp") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_refexp_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, users will earn exp when their referred user has successfully registered."><i class="fa fa-question-circle"></i>
											</span>
                                            <select name="ref_exp" class="form-control">
												<option value="1" <?php if ($get->system("ref_exp") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("ref_exp") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_expgame_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The amount of exp to be given when playing games. Users can only earn exp in a game one time per session, they have to play another game to gain exp again in the last game they played in short 'Anti Refresh Hack'"><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="exp_game" class="form-control" value="<?php echo $get->system('exp_game'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('exp_game'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_exptime_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The amount of exp to be given when staying on a page."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="exp_time" class="form-control" value="<?php echo $get->system('exp_time'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('exp_time'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_expcomment_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The amount of exp to be given when adding comment."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="exp_comment" class="form-control" value="<?php echo $get->system('exp_comment'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('exp_comment'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_expaddgame_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The amount of exp to be given when submitted game is published."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="exp_addgame" class="form-control" value="<?php echo $get->system('exp_addgame'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('exp_addgame'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_expref_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The amount of exp to be given when a reffered user has successfully registered."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="exp_ref" class="form-control" value="<?php echo $get->system('exp_ref'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('exp_ref'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_exptimeduration_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The time interval before giving exp to users staying on a page (In minutes)! Example: 5 is equal to 5 minutes"><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="exp_time_duration" class="form-control" value="<?php echo $get->system('exp_time_duration'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('exp_time_duration'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="challenge">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_challenge"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-challenge">
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_challenge_daily"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to enable daily top players."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="challenge_daily" class="form-control challenge_daily">
												<option value="1" <?php if ($get->system("challenge_daily") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("challenge_daily") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_challenge_weekly"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to enable weekly top players."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="challenge_weekly" class="form-control challenge_weekly">
												<option value="1" <?php if ($get->system("challenge_weekly") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("challenge_weekly") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_challenge_monthly"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to enable monthly top players."><i class="fa fa-question-circle"></i>
										</span>
                                            <select name="challenge_monthly" class="form-control challenge_monthly">
												<option value="1" <?php if ($get->system("challenge_monthly") == 1) { echo ' selected'; } ?>><?php echo $lang["select_on"]; ?></option>
												<option value="0" <?php if ($get->system("challenge_monthly") == 0) { echo ' selected'; } ?>><?php echo $lang["select_off"]; ?></option>
										</select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["panel_challenge_gp"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose how much game points (gp) they can earn for each game they play. Game points can only be earned when playing games."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="challenge_gp" class="form-control" value="<?php echo $get->system('challenge_gp'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('challenge_gp'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i> <?php echo $lang["panel_challenge_gpint"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Write the time user needs in playing the game to gain gp points, so if you write 5, users will recieve gp points every 5 minutes of playing games. 1 is equal to 1 minute."><i class="fa fa-question-circle"></i>
											</span>
                                            <input type="number" name="challenge_gp_int" class="form-control" value="<?php echo $get->system('challenge_gp_int'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('challenge_gp_int'); ?>';}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="update">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_update"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content text-center">
                                    <button type="button" class="btn btn-lg btn-success update-btn"><i class="fa fa-check"></i> <?php echo $lang["panel_formbtn_update"]; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>