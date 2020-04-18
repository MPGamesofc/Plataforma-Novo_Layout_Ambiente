		<div class="main-arcadia form-full">
				<div class="form-arcadia">
									<form id="addgame">
									<div class="form-group">
									<i class="fa fa-edit"></i>
									<?php echo $lang["parts_name_addgame"]; ?>		
									<input type="text" name="name" class="form-control name" placeholder="<?php echo $lang['placeholder_gamename']; ?>">
									</div>
									<div class="form-group">
									<i class="fa fa-cubes"></i>
									<?php echo $lang["parts_category_addgame"]; ?>		 				
									<select name="category" class="form-control category">
									<?php
									$find_cat = $db->query("SELECT * FROM categories ORDER BY id ASC");
									while($category = $find_cat->fetch_assoc()){
										echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
									}
									?>
									</select>
									</div> 									 									
									<div class="form-group">
									<i class="fa fa-info-circle"></i>
									<?php echo $lang["parts_description_addgame"]; ?>		 					 							
									<textarea name="description" id="description" class="form-control description" rows="5" placeholder="<?php echo $lang['placeholder_gamedescription']; ?>"></textarea>				 									
									</div>
									<div class="form-group">
									<i class="fa fa-question-circle"></i>
									<?php echo $lang["parts_instructions_addgame"]; ?>		 						 						
									<textarea name="help" id="help" class="form-control help" rows="5" placeholder="<?php echo $lang['placeholder_gameinstructions']; ?>"></textarea>				 									
									</div> 									
									<div class="form-group">
									<i class="fa fa-image"></i>
									<?php echo $lang["parts_thumb_addgame"]; ?>		
									<nav class="nav-sidebar">
									 <ul class="nav tabs">
									  <li class="active"><a href="#thumb_url" data-toggle="tab"><i class="fa fa-globe"></i> <?php echo $lang["parts_url_addgame"]; ?></a></li>
									 </ul>
									</nav>
									
									<div class="tab-content"> 		
									<div class="tab-pane active" id="thumb_url">
									<input type="url" name="thumb_url" class="form-control thumb-url" placeholder="<?php echo $lang['placeholder_gamethumburl']; ?>">
									</div>
									<div class="tab-pane" id="thumb_file">
									<input type="file" name="thumb_file" class="form-control thumb-file">
									</div> 									
									</div>
									</div> 									
									<div class="form-group">
									<i class="fa fa-gamepad"></i>
									<?php echo $lang["parts_source_addgame"]; ?>		 											
									<nav class="nav-sidebar">
									 <ul class="nav tabs">
									  <li class="active"><a href="#game_url" data-toggle="tab"><i class="fa fa-globe"></i> <?php echo $lang["parts_url_addgame"]; ?></a></li>
									 
									 </ul>
									</nav>
									
									<div class="tab-content"> 		
									<div class="tab-pane active" id="game_url">
									<input type="url" name="source_url" class="form-control game-url" placeholder="<?php echo $lang['placeholder_gamesourceurl']; ?>">
									</div>
									<div class="tab-pane" id="game_file">
									<input type="file" name="source_file" class="form-control game-file">
									</div> 									
									</div>
									</div> 																	
									<div class="form-group">
									<i class="fa fa-arrows-h"></i>
									<?php echo $lang["parts_width_addgame"]; ?>		 					
									<input type="number" name="width" class="form-control width" placeholder="<?php echo $lang['parts_width_addgame']; ?>">
									</div> 									 									
									<div class="form-group">
									<i class="fa fa-arrows-v"></i>
									<?php echo $lang["parts_height_addgame"]; ?>		 					
									<input type="number" name="height" class="form-control height" placeholder="<?php echo $lang['parts_height_addgame']; ?>	">
									</div> 									
									<div class="form-group">
									<i class="fa fa-cog"></i>
									<?php echo $lang["parts_type_addgame"]; ?>		 						
									<select name="type" class="form-control type">
									<option value="1" selected>HTML5</option>
									</select>
									</div> 									
									<div class="form-group">
									<i class="fa fa-mobile"></i>
									<?php echo $lang["parts_mobile_addgame"]; ?>		 							
									<select name="mobile" class="form-control mobile">
									<option value="1" selected><?php echo $lang["select_compatible"]; ?></option>
									<option value="0"><?php echo $lang["select_notcompatible"]; ?></option>
									</select>
									</div> 									 									
									<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
									</form>
				</div>
			</div>
			</div>