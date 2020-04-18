 <ul class="nav navbar-nav navbar-right">
<?php if($check->isLogged()){ ?>
               <li>
                    <a href="#" data-toggle="modal" data-target="#profile_nav">
                        <i class="fa fa-user"></i> 
                        <?php echo ucfirst($user["username"]); ?>
                    </a>
                </li>
<?php } else { ?>
               <li>
               <a href="#" data-toggle="modal" data-target="#login_modal">
                        <i class="fa fa-user"></i> 
                        <?php echo ucfirst($user["username"]); ?>
                </a>
                </li>
<?php } ?>
</ul>