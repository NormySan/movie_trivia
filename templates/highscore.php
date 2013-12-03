<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Highscores<br><small>Who's The Master?</small></h1>				
			</div>
		</div>
	</div>
	<h4>Latest highscores</h4>
	<table class="table">
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Player</th>
				<th>Score</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!$HighscoresAndUsernames):?> 
				<tr>
					<td>No highscores yet =(</td>
				</tr>
			<?php else:?>
				<?php $ladderPosition=1;?>
				<?foreach ($HighscoresAndUsernames as $username => $highscore): ?>
					<tr>
						<td><?php echo '#' . $ladderPosition?></td>
						<td><a href="<?php print 'profile' . '?profile=' . lcfirst($username)?>"><?php echo $username?></a></td>
						<td><?php echo $highscore?></td>
					</tr>
				<?php $ladderPosition++;?>
				<?php endforeach?>
				<?php unset($ladderPosition);?>
			<?php endif?>
		</tbody>
	</table>
</div>