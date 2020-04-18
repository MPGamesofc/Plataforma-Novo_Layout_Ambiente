<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/material.min.js"></script>
<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/material-dashboard.js"></script>
<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/sweetalert.min.js"></script>
<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/initial.min.js"></script>
<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/main.min.js"></script>
<script src="<?php echo $get->system("site_url"); ?>/templates/panel/assets/js/panel.min.js"></script>
<?php if($get->system("cdn_assets") == 1){ ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.5/tinymce.min.js"></script>
<?php } else { ?>
<script src="<?php echo $get->system('site_url'); ?>/system/libs/tinymce/tinymce.min.js"></script>
<?php } ?>
<?php if($data["page"] == "panel"){ ?>
<script>
    tinymce.init({
        selector: '#editor'
    });
</script>
<?php } ?>
</body>
</html>