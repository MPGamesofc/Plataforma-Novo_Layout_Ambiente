<?php class Check{function isLogged(){if(isset($_SESSION["logged"])){return true;}else{return false;}}function isSocial(){global $user;if(!empty($user["oauth_name"])&&!empty($user["oauth_id"])){return true;}else{return false;}}function isAdmin(){global $user;if($user["position"]==1){return true;}else{return false;}}function isModerator(){global $user;if($user["position"]==2){return true;}else{return false;}}function isAuthor(){global $user;if($user["position"]==3){return true;}else{return false;}}function isMember(){global $user;if($user["position"]==4){return true;}else{return false;}}function isGuest(){global $user;if($user["position"]==0){return true;}else{return false;}}function isMobile(){global $device;if($device->isMobile()OR $device->isTablet()){return true;}else{return false;}}function isFavorite($gid,$uid){global $db;$find=$db->query("SELECT id FROM favorites WHERE id = $gid AND uid = $uid LIMIT 1");if($find->num_rows>0){return true;}else{return false;}}} ?>