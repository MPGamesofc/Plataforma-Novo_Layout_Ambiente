<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php if($data["page"]=="home"){ ?>
    <meta name="keywords" content="<?php echo $get->system('tags'); ?>">
    <meta name="description" content="<?php echo $get->system('description'); ?>">
    <meta name="author" content="MPGames Online">
    <meta name="og:title" content="<?php echo $get->system('site_name'); ?> - <?php echo $get->system('description'); ?>">
    <meta name="og:description" content="<?php echo $get->system('description'); ?>">
    <?php } ?>
    <?php 
	if($data["page"]=="play"){ 
    $game = $get->game($secure->purify($data["gid"]), $get->system("smart_cache")); 
    $thumb = $get->gameThumb($game["thumb"], $get->system("site_url"));
    ?>
    <meta name="keywords" content="<?php echo str_replace(' ', ', ', $game['description']); ?>">
    <meta name="description" content="<?php echo $game['description']; ?>">
    <meta property="og:type" content="website">
    <meta name="og:title" content="<?php echo $game['name']; ?>">
    <meta name="og:description" content="<?php echo $game['description']; ?>">
    <meta name="og:url" content="<?php echo $get->system('site_url'); ?>/play/<?php echo $secure->washName($game['name']); ?>-<?php echo $game['id']; ?>.html">
    <meta name="og:image" content="<?php echo $thumb; ?>">
    <meta name="twitter:title" content="<?php echo $game['name']; ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="<?php echo $get->system('site_url'); ?>/play/<?php echo $secure->washName($game['name']); ?>-<?php echo $game['id']; ?>.html">
    <meta name="twitter:image" content="<?php echo $game['thumb']; ?>">
    <meta name="twitter:description" content="<?php echo $game['description']; ?>">
    <?php } ?>
    <?php if($data["page"]=="category"){ ?>
    <meta name="keywords" content="<?php echo str_replace(' ', ', ', $data['cat_desc']); ?>">
    <meta name="description" content="<?php echo $data['cat_desc']; ?>">
    <meta name="og:title" content="<?php echo $data['cat_name']; ?>">
    <meta name="og:description" content="<?php echo $data['cat_desc']; ?>">
    <?php if($data["cat_id"] !== "all"){ ?>
    <?php if(empty($data["seo"])){ ?>
    <meta name="og:url" content="<?php echo $get->system('site_url'); ?>/category/<?php echo urlencode(strtolower($data['cat_name'])); ?>">
    <?php } else { ?>
    <meta name="og:url" content="<?php echo $get->system('site_url'); ?>/category/<?php echo urlencode(strtolower($data['cat_seo'])); ?>">
    <?php } ?>
    <?php } else { ?>
    <meta name="og:url" content="<?php echo $get->system('site_url'); ?>/category/all">
    <?php } ?>
    <meta name="twitter:title" content="<?php echo $data['cat_name']; ?>">
    <meta name="twitter:card" content="summary">
    <?php if($data["cat_id"] !== "all"){ ?>
    <?php if(empty($data["seo"])){ ?>
    <meta name="twitter:site" content="<?php echo $get->system('site_url'); ?>/category/<?php echo urlencode(strtolower($data['cat_name'])); ?>">
    <?php } else { ?>
    <meta name="twitter:site" content="<?php echo $get->system('site_url'); ?>/category/<?php echo urlencode(strtolower($data['cat_seo'])); ?>">
    <?php } ?>
    <?php } else { ?>
    <meta name="twitter:site" content="<?php echo $get->system('site_url'); ?>/category/all">
    <?php } ?>
    <meta name="twitter:description" content="<?php echo $data['cat_desc']; ?>">
    <?php } ?>
    <meta name="og:site_name" content="<?php echo $get->system('site_name'); ?>">
    <meta name="msapplication-TileColor" content="#8B008B">
<meta name="msapplication-TileImage" content="https://mpgames.online/templates/mimiplay/assets/images/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#8B008B">
<meta http-equiv="content-language" content="pt-br, pt, en, en-gb, de, es, it, ru, zh, ja, en-US, fr" />
<meta name="copyright" content="© 2020 MPGames Online" />
<meta name="rating" content="general" />
<meta name="robots" content="index, follow">
   
<link async rel="apple-touch-icon" sizes="57x57" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-57x57.png">
<link async rel="apple-touch-icon" sizes="60x60" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-60x60.png">
<link async rel="apple-touch-icon" sizes="72x72" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-72x72.png">
<link async rel="apple-touch-icon" sizes="76x76" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-76x76.png">
<link async rel="apple-touch-icon" sizes="114x114" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-114x114.png">
<link async rel="apple-touch-icon" sizes="120x120" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-120x120.png">
<link async rel="apple-touch-icon" sizes="144x144" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-144x144.png">
<link async rel="apple-touch-icon" sizes="152x152" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-152x152.png">
<link async rel="apple-touch-icon" sizes="180x180" href="https://mpgames.online/templates/mimiplay/assets/images/icon/apple-icon-180x180.png">
<link async rel="icon" type="image/png" sizes="192x192"  href="https://mpgames.online/templates/mimiplay/assets/images/icon/android-icon-192x192.png">
<link async rel="icon" type="image/png" sizes="32x32" href="https://mpgames.online/templates/mimiplay/assets/images/icon/favicon-32x32.png">
<link async rel="icon" type="image/png" sizes="96x96" href="https://mpgames.online/templates/mimiplay/assets/images/icon/favicon-96x96.png">
<link async rel="icon" type="image/png" sizes="16x16" href="https://mpgames.online/templates/mimiplay/assets/images/icon/favicon-16x16.png">
<link async rel="manifest" href="https://mpgames.online/templates/mimiplay/assets/images/icon/manifest.json">




    <title><?php echo $get->system("site_name"); ?> | <?php echo $data["tagline"]; ?></title>
		
    <?php if(isset($_SESSION["lang_rtl"]) && $_SESSION["lang_rtl"] == 1){ ?>
    <!-- RTL Support -->
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/rtl.min.css" rel="stylesheet">
    <?php } ?>
    <!-- Fonts and Icons -->
    <link async href='//fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'> 
    <?php if($get->system("cdn_assets") == 1){ ?>
    <link async href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <?php } else { ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <?php } ?>
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/nprogress.min.css" rel="stylesheet">
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/flags.min.css" rel="stylesheet">
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/tipso.min.css" rel="stylesheet">

    <!-- Stylesheets -->
    <?php if($get->system("cdn_assets") == 1){ ?>
    <link async href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet'>
    <?php } else { ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/bootstrap.min.css" rel='stylesheet'>
    <?php } ?>
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/sweetalert.min.css" rel="stylesheet">
    <?php if($get->system("cdn_assets") == 1){ ?>
    <link async href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <?php } else { ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/animate.min.css" rel="stylesheet">
    <?php } ?>
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/style.min.css" rel='stylesheet'>
    <?php if(file_exists("templates/".$get->system('template')."/assets/css/colors/".$get->system('template_color').".css")){ ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/colors/<?php echo $get->system('template_color'); ?>.css" rel='stylesheet'>
	<?php } else { ?>
	<link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/colors/default.css" rel='stylesheet'>
	<?php } ?>
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/socialbuttons.min.css" rel="stylesheet">
    <?php if($get->system("enable_chat") == 1){ ?>
    <?php if($check->isLogged() OR $get->system("guest_chat") == 1){ ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/shoutbox.min.css" rel='stylesheet'>
    <?php } ?>
    <?php } ?>
    <?php if($data["page"] == "panel"){ ?>
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/panel.min.css" rel='stylesheet'>
    <?php } ?>
    <?php if($data["page"]=="play"){ ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/comments.min.css" rel="stylesheet">
    <?php } ?>
    <?php if($data["page"]=="profile"){ ?>
    <link href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/profile.min.css" rel="stylesheet">
    <?php } ?>
    <link async href="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/css/jquery.cookiebar.min.css" rel="stylesheet">
    
    
    

<!-- Scripts -->

    <script src="<?php echo $get->system('site_url'); ?>/system/language.js"></script>
    <?php if($get->system("cdn_assets") == 1){ ?>
    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/unveil/1.3.0/jquery.unveil.min.js"></script>
    <?php } else { ?>
    <script src="<?php echo $get->system('site_url'); ?>/system/libs/jquery.min.js"></script>
    <script  src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/nprogress.min.js"></script>
    <script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/unveil.min.js"></script>
    <?php } ?>
    <?php if($get->system("cdn_assets") == 1){ ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <?php } else { ?>
    <script src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/wow.min.js"></script>
    <?php } ?>
    <script async src="<?php echo $get->system('site_url'); ?>/templates/<?php echo $get->system('template'); ?>/assets/js/priority.min.js"></script>
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
        <?php if($data["page"] == "play"){ ?>
        var game_id = Arcadia.decompile("<?php echo base64_encode($game['id']); ?>");
        var game_uid = Arcadia.decompile("<?php echo base64_encode($game['uid']); ?>");
        var game_name = Arcadia.decompile("<?php echo base64_encode($game['name']); ?>");
        var game_type = Arcadia.decompile("<?php echo base64_encode($game['type']); ?>");
        var game_width = Arcadia.decompile("<?php echo base64_encode($game['width']); ?>");
        var game_height = Arcadia.decompile("<?php echo base64_encode($game['height']); ?>");
        var game_desc = Arcadia.decompile("<?php echo base64_encode($game['description']); ?>");
        var game_help = Arcadia.decompile("<?php echo base64_encode($game['help']); ?>");
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


   
   
   <!-- Global site tag (gtag.js) - Google Ads: 669893173 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-669893173"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-669893173');
</script>

<!-- Event snippet for Visualização de página conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-669893173/unIRCOGt8cMBELWEt78C'});
</script>

   
   
    <script data-ad-client="ca-pub-8265853028039645" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body>
<div class="color-base"></div>
<noscript>
<div class="nsbg"></div>
<div class="noscript">
<h2>Please turn on your browser's javascript to maximize your arcade experience! Thank you!</h2>
</div>
</noscript>
<div id="fb-root"></div>
<script>
    (async function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=<?php echo $get->system("fb_id "); ?>";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>



