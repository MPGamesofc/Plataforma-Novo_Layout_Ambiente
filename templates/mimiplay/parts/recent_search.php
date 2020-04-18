<?php
$limit = $get->system("recent_search_limit");

$find = $db->query("SELECT query FROM search ORDER BY id DESC LIMIT $limit");

if($find->num_rows > 0){
	while($search = $find->fetch_assoc()){
		echo '<a href="'. $get->system('site_url') .'/search/'.urlencode(strtolower($search["query"])).'">'.$search["query"].'</a>, ';
	}
} else {
	echo $lang["parts_nosearch_recentsearch"];
}
?>