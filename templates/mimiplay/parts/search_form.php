<form id="search">
				<div class="input-group">			 
				<?php if($data["page"] == "search"){ ?>
					<input type="text" class="form-control input-lg search" value="<?php echo $data['search']; ?>" placeholder="<?php echo $lang['placeholder_searchgames']; ?>"> 				 
				 <?php } else { ?>				 
					<input type="text" class="form-control input-lg search" placeholder="<?php echo $lang['placeholder_searchgames']; ?>"> 				 
				 <?php } ?>				 
				<span class="input-group-btn">	
					<button class="btn btn-lg btn-warning btn-search"><i class="fa fa-search"></i></button>
				</span>	
				</div>	
</form>