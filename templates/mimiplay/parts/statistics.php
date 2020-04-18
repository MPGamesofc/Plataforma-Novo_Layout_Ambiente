<?php
$get_games = $db->query("SELECT id FROM games");
$get_members = $db->query("SELECT id FROM users");
$get_comments = $db->query("SELECT id FROM comments");
$get_shouts = $db->query("SELECT id FROM shoutbox");
$games = $get_games->num_rows;
$members = $get_members->num_rows;
$comments = $get_comments->num_rows;
$shouts = $get_shouts->num_rows;
?>
<p><i class="fa fa-gamepad"></i> <?php echo number_format($games); ?> <?php echo $lang["parts_games_stats"]; ?></p>
<p><i class="fa fa-users"></i> <?php echo number_format($members); ?> <?php echo $lang["parts_users_stats"]; ?></p>
<p><i class="fa fa-comments"></i> <?php echo number_format($comments); ?> <?php echo $lang["parts_comments_stats"]; ?></p> 	
	 	