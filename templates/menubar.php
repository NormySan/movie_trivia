<ul class="nav nav-pills affix-top">
	<li id="menu_ingame"><a href="<?php echo(SITE_PATH)?>">Play the Game!</a></li>
	<li id="menu_profile"><a href="<?php echo(url('profile')); ?>">Profile</a></li>	
	<li id="menu_highscore"><a href="<?php echo(url('highscore')); ?>">Highscore</a></li>

	<?php if(!isset($_SESSION['user'])): ?>
		<li class="pull-right"><a href="<?php print(url('login')); ?>">Login</a></li>
	<?php else:?>
		<li class="pull-right"><a href="<?php print(url('login?logout=true')); ?>">Logout</a></li>
		<li class="pull-right"><a href="<?php print(url('profile')); ?>">Hi <?php echo ucfirst($_SESSION['user']['username'])?>!</a></li>		
	<?php endif; ?>            
	        
	
</ul>


<!--<a href="<?php echo(url('admin')); ?>">Admin</a></li>-->