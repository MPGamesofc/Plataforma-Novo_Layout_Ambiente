		<div class="main-arcadia form-full">
				<div class="form-arcadia">
									<form id="editgame">
									<div class="form-group">
									<i class="fa fa-edit"></i>
									<?php echo $lang["parts_name_editgame"]; ?>			
									<input type="text" name="name" class="form-control name" value="<?php echo $data['game']['name']; ?>" placeholder="<?php echo $lang['placeholder_gamename']; ?>">
									</div>
									<div class="form-group">
									<i class="fa fa-cubes"></i>
									<?php echo $lang["parts_category_editgame"]; ?>			 					
									<select name="category" class="form-control category">
									<?php
									$find_cat = $db->query("SELECT * FROM categories ORDER BY id ASC");
									while($category = $find_cat->fetch_assoc()){
										if($category["id"] == $data['game']["category"]){
											echo '<option value="'.$category['id'].'" selected>'.$category['name'].'</option>';
										} else {
											echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
										}
									}
									?>
									</select>
									</div> 									 									
									<div class="form-group">
									<i class="fa fa-info-circle"></i>
									<?php echo $lang["parts_description_editgame"]; ?>			 				
									<textarea name="description" id="description" class="form-control description" rows="5" placeholder="<?php echo $lang['placeholder_gamedescription']; ?>"><?php echo $data['game']["description"]; ?></textarea>				 									
									</div>
									<div class="form-group">
									<i class="fa fa-question-circle"></i>
									<?php echo $lang["parts_instructions_editgame"]; ?>			 						
									<textarea name="help" id="help" class="form-control help" rows="5" placeholder="<?php echo $lang['placeholder_gameinstructions']; ?>"><?php echo $data['game']["help"]; ?></textarea>
									</div> 									
									<div class="form-group">
									<i class="fa fa-image"></i>
									<?php echo $lang["parts_thumb_editgame"]; ?>			
									<nav class="nav-sidebar">
									 <ul class="nav tabs">
									  <li class="active"><a href="#thumb_url" data-toggle="tab"><i class="fa fa-globe"></i> <?php echo $lang["parts_url_editgame"]; ?></a></li>
									  <li><a href="#thumb_file" data-toggle="tab"><i class="fa fa-upload"></i> <?php echo $lang["parts_upload_editgame"]; ?></a></li>
									 </ul>
									</nav>
									
									<div class="tab-content"> 		
									<div class="tab-pane active" id="thumb_url">
									<input type="url" name="thumb_url" class="form-control thumb-url" value="<?php echo $data['thumb']; ?>" placeholder="<?php echo $lang['placeholder_gamethumburl']; ?>">
									</div>
									<div class="tab-pane" id="thumb_file">
									<input type="file" name="thumb_file" class="form-control thumb-file">
									</div> 									
									</div>
									</div> 									
									<div class="form-group">
									<i class="fa fa-gamepad"></i>
									<?php echo $lang["parts_source_editgame"]; ?>			 														
									<nav class="nav-sidebar">
									 <ul class="nav tabs">
									  <li class="active"><a href="#game_url" data-toggle="tab"><i class="fa fa-globe"></i> <?php echo $lang["parts_url_editgame"]; ?></a></li>
									  <li><a href="#game_file" data-toggle="tab"><i class="fa fa-upload"></i> <?php echo $lang["parts_upload_editgame"]; ?></a></li>
									 </ul>
									</nav>
									
									<div class="tab-content"> 		
									<div class="tab-pane active" id="game_url">
									<input type="url" name="source_url" class="form-control game-url" value="<?php echo $data['source']; ?>" placeholder="<?php echo $lang['placeholder_gamesourceurl']; ?>">
									</div>
									<div class="tab-pane" id="game_file">
									<input type="file" name="source_file" class="form-control game-file">
									</div> 									
									</div>
									</div> 																	
									<div class="form-group">
									<i class="fa fa-arrows-h"></i>
									<?php echo $lang["parts_width_editgame"]; ?>			 						
									<input type="number" name="width" class="form-control width" value="<?php echo $data['game']['width']; ?>" placeholder="<?php echo $lang['parts_width_editgame']; ?>">
									</div> 									 									
									<div class="form-group">
									<i class="fa fa-arrows-v"></i>
									<?php echo $lang["parts_height_editgame"]; ?>			 							
									<input type="number" name="height" class="form-control height" value="<?php echo $data['game']['height']; ?>" placeholder="<?php echo $lang['parts_height_editgame']; ?>">
									</div> 									
									<div class="form-group">
									<i class="fa fa-cube"></i>
									<?php echo $lang["parts_type_editgame"]; ?>			 							
									<select name="type" class="form-control type">
									<option value="1"<?php if($data['game']["type"] == 1){ echo ' selected'; } ?>>HTML5</option>
									<option value="2"<?php if($data['game']["type"] == 2){ echo ' selected'; } ?>>Flash</option>
									</select>
									</div> 									
									<div class="form-group">
									<i class="fa fa-mobile"></i>
									<?php echo $lang["parts_mobile_editgame"]; ?>			 								
									<select name="mobile" class="form-control mobile">
									<option value="1"<?php if($data['game']["mobile"] == 1){ echo ' selected'; } ?>><?php echo $lang["select_compatible"]; ?></option>
									<option value="0"<?php if($data['game']["mobile"] == 0){ echo ' selected'; } ?>><?php echo $lang["select_notcompatible"]; ?></option>
									</select>
									</div> 									 									
									<input type="hidden" name="gid" value="<?php echo $data['game']['id']; ?>">
									<input type="hidden" class="redirect" value="<?php echo $data['redirect']; ?>">
									<button type="submit" class="btn btn-md btn-success submit-btn"><i class="fa fa-check"></i> <?php echo $lang["submit_btn"]; ?></button>
									</form>
				</div>
			</div> 			
			</div>