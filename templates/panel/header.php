<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="icon" type="image/png" href="<?php echo $get->system('site_url'); ?>/templates/panel/assets/img/favicon.png">

    <title><?php echo $get->system("site_name"); ?> | <?php echo $data["tagline"]; ?></title>

    <!-- Fonts and Icons -->
    <link href='//fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'> 
    <link href="<?php echo $get->system("site_url"); ?>/templates/panel/assets/css/font-awesome.min.css" rel="stylesheet" />
	
	<?php if(isset($_SESSION["lang_rtl"]) && $_SESSION["lang_rtl"] == 1){ ?>       
    <!-- RTL Support -->
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/rtl.min.css" rel="stylesheet">    
    <?php } ?>   

    <!-- Bootstrap CSS -->
    <link href="<?php echo $get->system("site_url"); ?>/templates/panel/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Required Stylesheets -->
    <link href="<?php echo $get->system("site_url"); ?>/templates/panel/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo $get->system("site_url"); ?>/templates/panel/assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo $get->system("site_url"); ?>/templates/panel/assets/css/sweetalert.min.css" rel="stylesheet" />

    <!-- Required Scripts -->
    <script src="<?php echo $get->system('site_url'); ?>/system/language.js"></script>
    <script src="<?php echo $get->system("site_url"); ?>/system/libs/jquery.min.js"></script>
    <script src="<?php echo $get->system('site_url'); ?>/templates/panel/assets/js/wow.min.js"></script>
    <script src="<?php echo $get->system('site_url'); ?>/templates/panel/assets/js/priority.min.js"></script>
    <script src="<?php echo $get->system('site_url'); ?>/system/libs/base.min.js"></script>
    <script>
        var site_name = Arcadia.decompile("<?php echo base64_encode($get->system('site_name')); ?>");
        var site_url = Arcadia.decompile("<?php echo base64_encode($get->system('site_url')); ?>");
        var template = Arcadia.decompile("<?php echo base64_encode($get->system('template')); ?>");
        var game_tooltip = Arcadia.decompile("<?php echo base64_encode($get->system('game_tooltip')); ?>");
        var anti_adblock = Arcadia.decompile("<?php echo base64_encode($get->system('anti_adblock')); ?>");
        var landscape_mode = Arcadia.decompile("<?php echo base64_encode($get->system('landscape_mode')); ?>");
        var fullscreen = Arcadia.decompile("<?php echo base64_encode($get->system('fullscreen')); ?>");
        var challenge_gp_int = Arcadia.decompile("<?php echo base64_encode($get->system('challenge_gp_int')); ?>");
        var game_ad = Arcadia.decompile("<?php echo base64_encode($get->system('game_ad')); ?>");
        var game_ad_duration = Arcadia.decompile("<?php echo base64_encode($get->system('game_ad_duration')); ?>");
        var gaming_exp = Arcadia.decompile("<?php echo base64_encode($get->system('gaming_exp')); ?>");
        var enable_chat = Arcadia.decompile("<?php echo base64_encode($get->system('enable_chat')); ?>");
        var guest_chat = Arcadia.decompile("<?php echo base64_encode($get->system('guest_chat')); ?>");
        <?php if($check->isLogged()){ ?>
        var logged = Arcadia.decompile("<?php echo base64_encode($user['id']); ?>");
        var avatar = Arcadia.decompile("<?php echo base64_encode($user['avatar']); ?>");
        var logged_exp = Arcadia.decompile("<?php echo base64_encode($user['exp']); ?>");
        var eInt = Arcadia.decompile("<?php echo base64_encode($get->system('exp_time_duration')); ?>");
        <?php } else { ?>
        var logged = Arcadia.decompile("<?php echo base64_encode(0); ?>");
        <?php } ?>
        <?php if($check->isMobile()){ ?>
        var mobile = Arcadia.decompile("<?php echo base64_encode(1); ?>");
        <?php } else { ?>
        var mobile = Arcadia.decompile("<?php echo base64_encode(0); ?>");
        <?php } ?>
    </script>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo $get->system("analytics"); ?>']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' :
                'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>