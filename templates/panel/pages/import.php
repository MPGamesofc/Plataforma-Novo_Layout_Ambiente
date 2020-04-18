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
                            <li href="#import-tab" class="list-group-item active" data-toggle="tab"><i class="fa fa-rss"></i>
                                <?php echo $lang["panel_importsidebar_1"]; ?>
                            </li>
                            <li href="#gc-tab" class="list-group-item" data-toggle="tab"><i class="fa fa-gamepad"></i>
                                <?php echo $lang["panel_importsidebar_2"]; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="import-tab">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_import"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <form id="panel-import">
                                        <div class="form-group">
                                            <i class="fa fa-code"></i>
                                            <?php echo $lang["parts_importpcode_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Your envato purchase code! You should have one if you are a verified buyer."><i class="fa fa-question-circle"></i>
                                    </span>
                                            <input type="text" name="pcode" class="form-control" placeholder="<?php echo $lang['placeholder_pcode']; ?>" value="<?php echo $get->system('pcode'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('pcode'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-cog"></i>
                                            <?php echo $lang["parts_importtype_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose what type of games to be fetched by the game importer."><i class="fa fa-question-circle"></i>
                                </span>
                                            <select name="import_type" class="form-control import_type">
                                    <option value="1" <?php if ($get->system("import_type") == 1) { echo " selected"; } ?>>HTML5 Games</option>
                                    <option value="2" <?php if ($get->system("import_type") == 2) { echo " selected"; } ?>>Flash Games</option>
                                    <option value="3" <?php if ($get->system("import_type") == 3) { echo " selected"; } ?>>All Games</option>                                 
                                </select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-rss"></i>
                                            <?php echo $lang["parts_importgames_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, Arcanox will automatically fetch latest games from arcadia game center."><i class="fa fa-question-circle"></i>
                                </span>
                                            <select name="import_games" class="form-control import_games">
                                    <option value="1" <?php if ($get->system("import_games") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
                                    <option value="0" <?php if ($get->system("import_games") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
                                </select>
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-gamepad"></i>
                                            <?php echo $lang["parts_importlimit_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The number of games to be fetched per request. Max limit is 500!"><i class="fa fa-question-circle"></i>
                                    </span>
                                            <input type="number" name="import_limit" class="form-control" value="<?php echo $get->system('import_limit'); ?>" onfocus="this.value = '';" onblur="if(this.value == ''){this.value = '<?php echo $get->system('import_limit'); ?>';}">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-edit"></i>
                                            <?php echo $lang["parts_autopublish_panel"]; ?>
                                            <span class="help_btn" data-toggle="tooltip" data-placement="right" title="If enabled, All games fetched from arcadia game center will be automatically published."><i class="fa fa-question-circle"></i>
                                </span>
                                            <select name="auto_publish" class="form-control auto_publish">
                                    <option value="1" <?php if ($get->system("auto_publish") == 1) { echo " selected"; } ?>><?php echo $lang["select_on"]; ?></option>
                                    <option value="0" <?php if ($get->system("auto_publish") == 0) { echo " selected"; } ?>><?php echo $lang["select_off"]; ?></option>
                                </select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button> <button type="button" class="btn btn-success btn-md import-btn"><i class="fa fa-rss"></i> <?php echo $lang["import_btn"]; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="gc-tab">
                        <div class="animated bounceIn">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">
                                        <?php echo $lang["panel_formhead_gc"]; ?>
                                    </h4>
                                </div>
                                <div class="card-content text-center">
                                    <button type="button" class="btn btn-lg btn-success gc-btn"><i class="fa fa-check"></i> <?php echo $lang["gc_btn"]; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>