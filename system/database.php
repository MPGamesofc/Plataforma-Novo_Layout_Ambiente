<?php require 'config.php';$db=@new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);if(mysqli_connect_errno()){die(header("location: install"));}else{$db->set_charset('utf8');} ?>