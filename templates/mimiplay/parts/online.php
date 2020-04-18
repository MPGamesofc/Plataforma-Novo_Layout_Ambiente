<?php
$limit = $get->system("online_limit");
$find = $db->query("SELECT id, username, exp, avatar, robohash FROM users WHERE status = 1 ORDER BY position DESC LIMIT $limit");
if ($find->num_rows > 0) {
    while ($online = $find->fetch_assoc()) {
        if (!empty($online["avatar"])) {
            $avatar = '<img src="' . $get->system("site_url") . '/templates/'.$get->system("template").'/assets/images/loader.gif" data-src="' . $get->system("site_url") . '/uploads/avatars/' . $online["avatar"] . '" class="lazy-avatar b-radius">';
        } else {
            $avatar = $get->avatar($secure->hashed($online["id"]), $online["username"], $online["robohash"], $get->system("default_avatar"), "b-radius", $get);
        }
        echo '<span class="online-avatar">' . $avatar . '</span> <a href="'.$get->system("site_url").'/user/'.$online["username"].'">' . $online["username"] . '</a>, ';
    }
} else {
    $online["username"];
    echo $lang["parts_online"];
}
?>