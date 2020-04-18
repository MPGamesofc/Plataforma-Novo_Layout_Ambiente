<div class="content">
    <div class="container-fluid">
        <div class="card animated fadeInRight">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><?php echo $lang["panel_formhead_widgets"]; ?></h4>
            </div>
            <div class="card-content">
                <form id="widgets">
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Global Top Banner
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the banner placed on the top of pages, Recommended ad size: 728x90"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="widget_banner_top" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("widget_banner_top"); ?></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Global Bottom Banner
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the banner placed on the bottom of pages, Recommended ad size: 728x90"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="widget_banner_bottom" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("widget_banner_bottom"); ?></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Play Page Banner
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the banner shown below the comments section, Recommended ad size: 728x90"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="widget_banner_play" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("widget_banner_play"); ?></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Top Game Banner
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the banner placed on top of the game frames, Recommended ad size: 728x90"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="game_banner_top" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("game_banner_top"); ?></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Bottom Game Banner
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the banner placed on bottom of the game frames, Recommended ad size: 728x90"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="game_banner_bottom" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("game_banner_bottom"); ?></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Global Sidebar
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the sidebar shown on all pages except play page, Recommended ad size: 300x300, 300x600"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="widget_sidebar_global" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("widget_sidebar_global"); ?></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-cog"></i> Play Page Sidebar
                        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="This is the sidebar shown on the play page, Recommended ad size: 300x300, 300x600"><i class="fa fa-question-circle"></i>
                        </span>
                        <textarea name="widget_sidebar_play" class="form-control" rows="7" placeholder="Insert your widget/advertisment codes here.."><?php echo $get->system("widget_sidebar_play"); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-md submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
                </form>
            </div>
        </div>
    </div>
</div>