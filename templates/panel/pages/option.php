<div class="content">
	<div class="container-fluid">
	<?php if (isset($_GET["id"]) && $_GET["page"] == "edit" && $_GET["type"] == "user" && $secure->isNumber($_GET["id"])) { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["parts_formhead_panel1"]; ?></h4>
		</div>
		<div class="card-content">
	<?php
	$uid = $secure->purify($_GET["id"]);
	$find_user = $db->query("SELECT id, position, username, email, avatar, cover, fullname, exp, website, quote, about, banned FROM users WHERE id = $uid LIMIT 1");
		if ($find_user->num_rows > 0) {
			$user_data = $find_user->fetch_assoc();
	?>		
	<form id="edit-user">
    <div class="form-group">
        <i class="fa fa-user"></i>
        <?php echo $lang["parts_formusername_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The username of this user, cannot be empty!"><i class="fa fa-question-circle"></i></span>
        <input type="text" name="username" class="form-control username" value="<?php echo $user_data['username']; ?>" placeholder="<?php echo $lang['placeholder_username']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-envelope"></i>
        <?php echo $lang["parts_formemail_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The email of this user, can be empty if user was registred with social login!"><i class="fa fa-question-circle"></i></span>
        <input type="email" name="email" class="form-control email" value="<?php echo $user_data['email']; ?>" placeholder="<?php echo $lang['placeholder_email']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-user"></i>
        <?php echo $lang["parts_formposition_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The position of this user."><i class="fa fa-question-circle"></i></span>
        <select name="position" class="form-control">
						<option value="1"<?php if ($user_data["position"] == "1") { echo ' selected'; } ?>>Administrator</option>
						<option value="2"<?php if ($user_data["position"] == "2") { echo ' selected'; } ?>>Moderator</option>
						<option value="3"<?php if ($user_data["position"] == "3") { echo ' selected'; } ?>>Author</option>
						<option value="4"<?php if ($user_data["position"] == "4") { echo ' selected'; } ?>>Member</option> 									  									  
					</select>
    </div>
    <div class="form-group">
        <i class="fa fa-exclamation-triangle"></i>
        <?php echo $lang["parts_formbanned_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to ban this user."><i class="fa fa-question-circle"></i></span>
        <select name="banned" class="form-control">
						<option value="1"<?php if ($user_data["banned"] == "1") { echo ' selected'; } ?>><?php echo $lang["select_yes"]; ?></option>
						<option value="0"<?php if ($user_data["banned"] == "0") { echo ' selected'; } ?>><?php echo $lang["select_no"]; ?></option>									  
					</select>
    </div>
    <div class="form-group">
        <i class="fa fa-user"></i>
        <?php echo $lang["parts_formfullname_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The full name of this user."><i class="fa fa-question-circle"></i></span>
        <input type="text" name="fullname" class="form-control fullname" value="<?php echo $user_data['fullname']; ?>" placeholder="<?php echo $lang['placeholder_fullname']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-lock"></i>
        <?php echo $lang["parts_formnewpassword_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The password of this user."><i class="fa fa-question-circle"></i></span>
        <input type="password" name="password" class="form-control password" placeholder="<?php echo $lang['placeholder_password_new']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-bolt"></i>
        <?php echo $lang["parts_formexp_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The experience points of this user."><i class="fa fa-question-circle"></i></span>
        <input type="number" name="exp" class="form-control exp" value="<?php echo $user_data['exp']; ?>" placeholder="<?php echo $lang['placeholder_exp']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-globe"></i>
        <?php echo $lang["parts_formwebsite_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The website of this user."><i class="fa fa-question-circle"></i></span>
        <input type="url" name="website" class="form-control website" value="<?php echo $user_data['website']; ?>" placeholder="<?php echo $lang['placeholder_website']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-quote-left"></i>
        <?php echo $lang["parts_formquote_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The profile quote of this user."><i class="fa fa-question-circle"></i></span>
        <input type="text" name="quote" class="form-control quote" value="<?php echo $user_data['quote']; ?>" placeholder="<?php echo $lang['placeholder_quote']; ?>">
    </div>
    <div class="form-group">
        <i class="fa fa-info-circle"></i>
        <?php echo $lang["parts_formabout_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="The about/bio information of this user"><i class="fa fa-question-circle"></i></span>
        <textarea name="about" class="form-control about" rows="4" placeholder="<?php echo $lang['placeholder_about']; ?>"><?php echo $user_data["about"]; ?></textarea>
    </div>
    <?php if (!empty($user_data["avatar"])) { ?>
    <div class="form-group">
        <i class="fa fa-image"></i>
        <?php echo $lang["parts_formavatar_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to delete the current avatar of this user."><i class="fa fa-question-circle"></i></span>
        <select name="avatar" class="form-control">
						<option value="1"><?php echo $lang["select_yes"]; ?></option>
						<option value="0" selected><?php echo $lang["select_no"]; ?></option>	
					</select>
    </div>
    <?php } else { ?>
    <input type="hidden" name="avatar" value="0">
    <?php } ?>
    <?php if (!empty($user_data["cover"])) { ?>
    <div class="form-group">
        <i class="fa fa-image"></i>
        <?php echo $lang["parts_formcover_panel"]; ?>
        <span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if you want to delete the current profile cover of this user."><i class="fa fa-question-circle"></i></span>
        <select name="cover" class="form-control">
						<option value="1"><?php echo $lang["select_yes"]; ?></option>
						<option value="0" selected><?php echo $lang["select_no"]; ?></option>
					</select>
    </div>
    <?php } else { ?>
    <input type="hidden" name="cover" value="0">
    <?php } ?>
    <input type="hidden" name="uid" value="<?php echo $user_data['id']; ?>">
    <button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
	</form>
	<?php
		} else {
			echo '<div class="alert alert-warning text-center">
			<h3>' . $lang["error_usernotfound_panel"] . '</h3>
			<p class="lead">' . $lang["error_usernotfound_panel_desc"] . '</p>
			</div>';
		}
		echo "</div>";
		echo "</div>";
	}
	?>

	<?php if ($_GET["page"] == "new" && $_GET["type"] == "language") { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title">
				<?php echo $lang["parts_formhead_panel2"]; ?>
			</h4>
		</div>

		<div class="card-content">
			<form id="new-lang">
				<div class="form-group">
					<i class="fa fa-language"></i>
					<?php echo $lang["parts_formlangname_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The name for this language."><i class="fa fa-question-circle"></i></span>
					<input type="text" name="lang_name" class="form-control lang_name" placeholder="<?php echo $lang['placeholder_langname']; ?>">
				</div>
				<div class="form-group">
					<i class="fa fa-code"></i>
					<?php echo $lang["parts_formlangcode_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The code for this language, this code must match the name of the language file! Please use a valid language code if possible."><i class="fa fa-question-circle"></i></span>
					<input type="text" name="lang_code" class="form-control lang_code" placeholder="<?php echo $lang['placeholder_langcode']; ?>">
				</div>
				<div class="form-group">
					<i class="fa fa-globe"></i>
					<?php echo $lang["parts_formlangccode_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The country code for this language, this will be used to identify the flag in the language chooser! This must satisfy ISO Alpha-2 country codes."><i class="fa fa-question-circle"></i></span>
					<input type="text" name="country_code" class="form-control country_code" placeholder="<?php echo $lang['placeholder_langccode']; ?>">
				</div>
				<div class="form-group">
					<i class="fa fa-align-right"></i>
					<?php echo $lang["parts_formlangrtl_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if this language should be interpreted from right to left or not."><i class="fa fa-question-circle"></i></span>
					<select name="rtl" class="form-control rtl">
									<option value="0" selected><?php echo $lang["select_no"]; ?></option>
									<option value="1"><?php echo $lang["select_yes"]; ?></option>
								</select>
				</div>
				<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
			</form>
		</div>
	</div>
	<?php } ?>

	<?php if (isset($_GET["id"]) && $_GET["page"] == "edit" && $_GET["type"] == "language" && $secure->isNumber($_GET["id"])) { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["parts_formhead_panel3"]; ?></h4>
		</div>
		<div class="card-content">
	<?php
		$id = $secure->purify($_GET["id"]);
		$find_lang = $db->query("SELECT id, name, code, country_code, rtl FROM languages WHERE id = $id LIMIT 1");
		if ($find_lang->num_rows > 0) {
			$get_data = $find_lang->fetch_assoc();
	?>
		<form id="edit-lang">
			<div class="form-group">
				<i class="fa fa-language"></i>
				<?php echo $lang["parts_formlangname_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The name for this language."><i class="fa fa-question-circle"></i></span>
				<input type="text" name="lang_name" class="form-control lang_name" value="<?php echo $get_data['name']; ?>" placeholder="<?php echo $lang['placeholder_langname']; ?>">
			</div>
			<div class="form-group">
				<i class="fa fa-code"></i>
				<?php echo $lang["parts_formlangcode_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The code for this language, this code must match the name of the language file! Please use a valid language code if possible!"><i class="fa fa-question-circle"></i></span>
				<input type="text" name="lang_code" class="form-control lang_code" value="<?php echo $get_data['code']; ?>" placeholder="<?php echo $lang['placeholder_langcode']; ?>">
			</div>
			<div class="form-group">
				<i class="fa fa-globe"></i>
				<?php echo $lang["parts_formlangccode_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The country code for this language, this will be used to identify the flag in the language chooser! This must satisfy ISO Alpha-2 country codes."><i class="fa fa-question-circle"></i></span>
				<input type="text" name="country_code" class="form-control country_code" value="<?php echo $get_data['country_code']; ?>" placeholder="<?php echo $lang['placeholder_langccode']; ?>">
			</div>
			<div class="form-group">
				<i class="fa fa-align-right"></i>
				<?php echo $lang["parts_formlangrtl_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="Choose if this language should be interpreted from right to left or not."><i class="fa fa-question-circle"></i></span>
				<select name="rtl" class="form-control">
					<option value="0"<?php if ($get_data["rtl"] == 0) { echo ' selected'; } ?>><?php echo $lang["select_no"]; ?></option>
					<option value="1" <?php if ($get_data["rtl"] == 1) { echo ' selected'; } ?>><?php echo $lang["select_yes"]; ?></option>
				</select>
			</div>
			<input type="hidden" name="id" value="<?php echo $get_data['id']; ?>">
			<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
		</form>
	<?php
		} else {
			echo '<div class="alert alert-warning text-center">
		<h3>' . $lang["error_langnotfound_panel"] . '</h3>
		<p class="lead">' . $lang["error_langnotfound_panel_desc"] . '</p>
		</div>';
		}
		echo "</div>";
		echo "</div>";
	}
	?>

	<?php if ($_GET["page"] == "new" && $_GET["type"] == "category") { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["parts_formhead_panel4"]; ?></h4>
		</div>
			
		<div class="card-content">
			<form id="new-cat">
				<div class="form-group">
					<i class="fa fa-cube"></i>
					<?php echo $lang["parts_formcatname_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The name for this category"><i class="fa fa-question-circle"></i></span>
					<input type="text" name="cat_name" class="form-control cat_name" placeholder="<?php echo $lang['placeholder_catname']; ?>">
				</div>
				<div class="form-group">
					<i class="fa fa-search"></i> SEO URL
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="Optional. The unique seo identifier for this link, this is useful for seo if you used non-english name for this category. The name will be used if left empty."><i class="fa fa-question-circle"></i></span>
					<input type="text" name="seo" class="form-control seo" placeholder="SEO URL">
				</div>
				<div class="form-group">
					<i class="fa fa-align-left"></i>
					<?php echo $lang["parts_formcatdesc_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The description for this category"><i class="fa fa-question-circle"></i></span>
					<textarea name="cat_desc" class="form-control cat_desc" rows="4" placeholder="<?php echo $lang['placeholder_catdesc']; ?>"></textarea>
				</div>
				<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
			</form>
		</div>
	</div>
	<?php
	} ?>

	<?php if (isset($_GET["id"]) && $_GET["page"] == "edit" && $_GET["type"] == "category" && $secure->isNumber($_GET["id"])) { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["parts_formhead_panel5"]; ?></h4>
		</div>	
		<div class="card-content">
	<?php
		$id = $secure->purify($_GET["id"]);
		$find_cat = $db->query("SELECT id, name, seo, description FROM categories WHERE id = $id LIMIT 1");
		if ($find_cat->num_rows > 0) {
			$get_data = $find_cat->fetch_assoc();
	?>
		<form id="edit-cat">
			<div class="form-group">
				<i class="fa fa-cube"></i>
				<?php echo $lang["parts_formcatname_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The name for this category"><i class="fa fa-question-circle"></i></span>
				<input type="text" name="cat_name" class="form-control cat_name" value="<?php echo $get_data['name']; ?>" placeholder="<?php echo $lang['placeholder_catname']; ?>">
			</div>
			<div class="form-group">
				<i class="fa fa-search"></i> SEO URL
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="Optional. The unique seo identifier for this link, this is useful for seo if you used non-english name for this category. The name will be used if left empty."><i class="fa fa-question-circle"></i></span>
				<input type="text" name="seo" class="form-control seo" value="<?php echo $get_data['seo']; ?>" placeholder="SEO URL">
			</div>
			<div class="form-group">
				<i class="fa fa-align-center"></i>
				<?php echo $lang["parts_formcatdesc_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The description for this category"><i class="fa fa-question-circle"></i></span>
				<textarea name="cat_desc" class="form-control" rows="4" placeholder="<?php echo $lang['placeholder_catdesc']; ?>"><?php echo $get_data['description']; ?></textarea>
			</div>
			<input type="hidden" name="id" value="<?php echo $get_data['id']; ?>">
			<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
		</form>
	<?php
		} else {
			echo '<div class="alert alert-warning text-center">
		<h3>' . $lang["error_catnotfound_panel"] . '</h3>
		<p class="lead">' . $lang["error_catnotfound_panel_desc"] . '</p>
		</div>';
		}
		echo "</div>";
		echo "</div>";
	}
	?>

	<?php if ($_GET["page"] == "new" && $_GET["type"] == "page") { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["parts_formhead_panel6"]; ?></h4>
		</div>		

		<div class="card-content">
			<form id="new-page">
				<div class="form-group">
					<i class="fa fa-edit"></i>
					<?php echo $lang["parts_formpagename_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The name for this page"><i class="fa fa-question-circle"></i></span>
					<input type="text" name="page_name" class="form-control page_name" placeholder="<?php echo $lang['placeholder_pagename']; ?>">
				</div>
				<div class="form-group">
					<i class="fa fa-edit"></i>
					<?php echo $lang["parts_formpagecontent_panel"]; ?>
					<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The content of this page"><i class="fa fa-question-circle"></i></span>
					<textarea name="page_content" class="form-control page_content" id="editor" rows="10"></textarea>
				</div>
				<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
			</form>
		</div>
		</div>
	<?php } ?>

	<?php if (isset($_GET["id"]) && $_GET["page"] == "edit" && $_GET["type"] == "page" && $secure->isNumber($_GET["id"])) { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["parts_formhead_panel7"]; ?></h4>
		</div>	
	<div class="card-content">	
	<?php
		$id = $secure->purify($_GET["id"]);
		$find_page = $db->query("SELECT name, content FROM pages WHERE id = $id LIMIT 1");
		if ($find_page->num_rows > 0) {
			$page = $find_page->fetch_assoc();
			$name = $page["name"];
			$content = htmlspecialchars_decode($page["content"]);
	?>
		<form id="edit-page">
			<div class="form-group">
				<i class="fa fa-edit"></i>
				<?php echo $lang["parts_formpagename_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The name for this page"><i class="fa fa-question-circle"></i></span>
				<input type="text" name="page_name" class="form-control page_name" value="<?php echo $name; ?>" placeholder="<?php echo $lang['placeholder_pagename']; ?>">
			</div>
			<div class="form-group">
				<i class="fa fa-edit"></i>
				<?php echo $lang["parts_formpagecontent_panel"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="The content of this page"><i class="fa fa-question-circle"></i></span>
				<textarea name="content" class="form-control" rows="10" id="editor"><?php echo $content; ?></textarea>
			</div>
			<input type="hidden" class="id" value="<?php echo $id; ?>">
			<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
		</form>	
	<?php
		} else {
			echo '<div class="alert alert-warning text-center">
		<h3>' . $lang["error_pagenotfound_panel"] . '</h3>
		<p class="lead">' . $lang["error_pagenotfound_panel_desc"] . '</p>
		</div>';
		}
		echo "</div>";
		echo "</div>";
	}
	?>

	<?php if (isset($_GET["id"]) && $_GET["page"] == "edit" && $_GET["type"] == "movegames" && $secure->isNumber($_GET["id"])) { ?>
	<div class="card">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><?php echo $lang["panel_movegames_head"]; ?></h4>
		</div>		
	<div class="card-content">	
	<?php
		$id = $secure->purify($_GET["id"]);
		$find_cat = $db->query("SELECT id FROM categories WHERE id = $id LIMIT 1");
		if ($find_cat->num_rows > 0) {
	?>
		<form id="movegames">
			<div class="form-group">
				<i class="fa fa-cube"></i> <?php echo $lang["panel_movegames_select"]; ?>
				<span class="help_btn" data-toggle="tooltip" data-placement="right" title="Select the category where the games will be moved, Please note that after moving, the old category will be deleted."><i class="fa fa-question-circle"></i></span>
				<select name="category" class="form-control category">
					<?php
					$get_cats = $db->query("SELECT id, name FROM categories");
					$start = 1;
					while($category = $get_cats->fetch_assoc()){
						if($category["id"] !== $id){
							if($start == 1){
								echo '<option value="'.$category["id"].'" selected>'.ucfirst($category["name"]).'</option>';												
							} else {
								echo '<option value="'.$category["id"].'">'.ucfirst($category["name"]).'</option>'; 	
							}
						}
						$start++;
					}
					?>
				</select>
			</div>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["save_btn"]; ?></button>
		</form>
	<?php
		} else {
			echo '<div class="alert alert-warning text-center">
		<h3>' . $lang["error_catnotfound_panel"] . '</h3>
		<p class="lead">' . $lang["error_catnotfound_panel_desc"] . '</p>
		</div>';
		}
		echo "</div>";
		echo "</div>";
	}
	?>
	</div>
</div>
