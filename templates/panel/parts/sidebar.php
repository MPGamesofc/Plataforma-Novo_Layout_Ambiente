<div class="sidebar" data-color="green" data-image="<?php echo $get->system(" site_url "); ?>/templates/panel/assets/img/sidebar.jpg">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li<?php if(!isset($_GET[ "show"])){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel">
	                        <i class="fa fa-area-chart"></i>
	                        <p><?php echo $lang["parts_tabs_panel1"]; ?></p>
	                    </a>
                </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="system" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/system">
	            <i class="fa fa-cogs"></i>
	            <p><?php echo $lang["parts_tabs_panel2"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="import" ){ echo ' class="active"'; } ?>>
				<a href="<?php echo $get->system('site_url'); ?>/panel/import">
	            <i class="fa fa-rss"></i>
	            <p><?php echo $lang["parts_tabs_panel3"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="games" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/games">
	            <i class="fa fa-gamepad"></i>
	            <p><?php echo $lang["panel_sidebar_games"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="users" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/users">
	            <i class="fa fa-users"></i>
	            <p><?php echo $lang["parts_tabs_panel4"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="widgets" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/widgets">
	            <i class="fa fa-money"></i>
	            <p><?php echo $lang["parts_tabs_panel5"]; ?></p>
				</a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="languages" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/languages">
	            <i class="fa fa-language"></i>
	            <p><?php echo $lang["parts_tabs_panel6"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="categories" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/categories">
	            <i class="fa fa-cubes"></i>
	            <p><?php echo $lang["parts_tabs_panel7"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="pages" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/pages">
	            <i class="fa fa-align-center"></i>
	            <p><?php echo $lang["parts_tabs_panel8"]; ?></p>
	            </a>
            </li>
            <li<?php if(isset($_GET[ "show"]) && $_GET[ "show"]=="reports" ){ echo ' class="active"'; } ?>>
                <a href="<?php echo $get->system('site_url'); ?>/panel/reports">
	            <i class="fa fa-exclamation-triangle"></i>
	            <p><?php echo $lang["parts_tabs_panel9"]; ?></p>
				</a>
            </li>
        </ul>
    </div>
</div>