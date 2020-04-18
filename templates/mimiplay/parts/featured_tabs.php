		<?php
		$cats = explode(",", str_replace(" ", "", $get->system("featured")));
		if(!isset($cats[0])){
			$cats[0] = 1;
		} else if (!$secure->isNumber($cats[0])) {
			$cats[0] = 1;
		}
		$cat1 = $db->query("SELECT name FROM categories WHERE id = " . $cats[0] . " LIMIT 1");
		$cat1data = $cat1->fetch_assoc();
		if(!isset($cats[1])){
			$cats[1] = 2;
		} else if (!$secure->isNumber($cats[1])) {
			$cats[1] = 2;
		}
		$cat2 = $db->query("SELECT name FROM categories WHERE id = " . $cats[1] . " LIMIT 1");
		$cat2data = $cat2->fetch_assoc();
		if(!isset($cats[2])){
			$cats[2] = 3;
		} else if (!$secure->isNumber($cats[2])) {
			$cats[2] = 3;
		}
		$cat3 = $db->query("SELECT name FROM categories WHERE id = " . $cats[2] . " LIMIT 1");
		$cat3data = $cat3->fetch_assoc();
		if(!isset($cats[3])){
			$cats[3] = 4;
		} else if (!$secure->isNumber($cats[3])) {
			$cats[3] = 4;
		}
		$cat4 = $db->query("SELECT name FROM categories WHERE id = " . $cats[3] . " LIMIT 1");
		$cat4data = $cat4->fetch_assoc();
		if(!isset($cats[4])){
			$cats[4] = 5;
		} else if (!$secure->isNumber($cats[4])) {
			$cats[4] = 5;
		}
		$cat5 = $db->query("SELECT name FROM categories WHERE id = " . $cats[4] . " LIMIT 1");
		$cat5data = $cat5->fetch_assoc();
		if(!isset($cats[5])){
			$cats[5] = 6;
		} else if (!$secure->isNumber($cats[5])) {
			$cats[5] = 6;
		}
		$cat6 = $db->query("SELECT name FROM categories WHERE id = " . $cats[5] . " LIMIT 1");
		$cat6data = $cat6->fetch_assoc();
		if(!isset($cats[6])){
			$cats[6] = 7;
		} else if (!$secure->isNumber($cats[6])) {
			$cats[6] = 7;
		}
		$cat7 = $db->query("SELECT name FROM categories WHERE id = " . $cats[6] . " LIMIT 1");
		$cat7data = $cat7->fetch_assoc();	
		if(!isset($cats[7])){
			$cats[7] = 8;
		} else if (!$secure->isNumber($cats[7])) {
			$cats[7] = 8;
		}
		$cat8 = $db->query("SELECT name FROM categories WHERE id = " . $cats[7] . " LIMIT 1");
		$cat8data = $cat8->fetch_assoc();			
		?>
		<nav class="nav-sidebar featured-tabs">
			<ul class="nav tabs">
				<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $cat1data["name"]; ?></a></li>
				<li><a href="#tab2" data-toggle="tab"><?php echo $cat2data["name"]; ?></a></li> 
				<li><a href="#tab3" data-toggle="tab"><?php echo $cat3data["name"]; ?></a></li>  
				<li><a href="#tab4" data-toggle="tab"><?php echo $cat4data["name"]; ?></a></li>
				<li><a href="#tab5" data-toggle="tab"><?php echo $cat5data["name"]; ?></a></li>
				<li><a href="#tab6" data-toggle="tab"><?php echo $cat6data["name"]; ?></a></li>
				<li><a href="#tab7" data-toggle="tab"><?php echo $cat7data["name"]; ?></a></li>
				<li><a href="#tab8" data-toggle="tab"><?php echo $cat8data["name"]; ?></a></li>
			</ul>
		</nav>