<?php class Template{private $part;private $data;function header($part,$data){global $db,$sys,$get,$secure,$user,$check,$lang;if($part=="panel"&&!empty($data)){require 'templates/panel/header.php';}else if(!empty($part)&&!empty($data)){require 'templates/'.$get->system("template").'/header.php';}else{die("Critical Error! Failed parsing template!");}}function body($part,$data){global $db,$sys,$get,$secure,$user,$check,$lang;if($part=="home"){require 'templates/'.$get->system("template").'/pages/home.php';}if($part=="category"){require 'templates/'.$get->system("template").'/pages/category.php';}if($part=="play"){require 'templates/'.$get->system("template").'/pages/play.php';}if($part=="login"){require 'templates/'.$get->system("template").'/pages/login.php';}if($part=="register"){require 'templates/'.$get->system("template").'/pages/register.php';}if($part=="forgot"){require 'templates/'.$get->system("template").'/pages/forgot.php';}if($part=="error"){require 'templates/'.$get->system("template").'/pages/error.php';}if($part=="search"){require 'templates/'.$get->system("template").'/pages/search.php';}if($part=="leaderboard"){require 'templates/'.$get->system("template").'/pages/leaderboard.php';}if($part=="profile"){require 'templates/'.$get->system("template").'/pages/profile.php';}if($part=="settings"){require 'templates/'.$get->system("template").'/pages/settings.php';}if($part=="favorites"){require 'templates/'.$get->system("template").'/pages/favorites.php';}if($part=="panel"){require 'templates/panel/home.php';}if($part=="game"){require 'templates/'.$get->system("template").'/pages/game.php';}if($part=="page"){require 'templates/'.$get->system("template").'/pages/page.php';}if($part=="pending"){require 'templates/'.$get->system("template").'/pages/pending.php';}if($part=="challenge"){require 'templates/'.$get->system("template").'/pages/challenge.php';}if($part=="api"){require 'templates/api/canvas.php';}}function footer($part,$data){global $db,$sys,$get,$secure,$user,$check,$lang;if($part=="panel"&&!empty($data)){require 'templates/panel/footer.php';}else if(!empty($part)&&!empty($data)){require 'templates/'.$get->system("template").'/footer.php';}else{die("Critical Error! Failed parsing template!");}}} ?>