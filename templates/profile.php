<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if(!isset($_GET['profile'])):?>
					<h1>Hi <?php echo ucfirst($user['username'])?>!<br><small>Here's Your Stats</small></h1>				
				<?php else:?>
					<h1>Spying on the competition eh?<br><small>Here's Your Stats...</small></h1>	
				<?php endif;?>
			</div>
		</div>
	</div>
	<dl class="dl-horizontal">
    	<dt>Username:</dt>
    	<dd><?php echo ucfirst($user['username']) ?></dd>
    	
    	<dt>Bio:</dt>
    	<dd>
    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</dd>
    	<dt>Ranking:</dt>
    	<dd>
		<?php if(!isset($_GET['profile'])):?>
			<?php print('#' . getUserRanking($user['username']))?>
		<?php else:?>
			<?php print('#' . getUserRanking($_GET['profile']))?>	
		<?endif;?>
		</dd>
    	
    </dl>
</div>

