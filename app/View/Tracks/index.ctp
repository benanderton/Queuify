<?php echo $this->Html->script('addtrack', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->css('addtrack'); ?>

<div class="tracks index">
	<?php echo $this->Form->create('SpotifyTrack');?>
		<fieldset>
			<?php echo $this->Form->input('artist', array('value' => 'Search for a track...', 'label' => false)); ?>
			<ul id="results"></ul>
			<a href="#" id="toggle-more">Show more results</a>
		</fieldset>
	<?php echo $this->Form->end();?>
	<table cellpadding="0" cellspacing="0" id="results-table">
	<tr>
			<th><?php echo $this->Paginator->sort('artist');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('album');?></th>
			<th><?php echo $this->Paginator->sort('release_date');?></th>
			<th><?php echo $this->Paginator->sort('added_by'); ?></th>
			<th>Status</th>
			<th>&nbsp;</th>
	</tr>
	<?php
	foreach ($tracks as $track): ?>

<?php
if(!empty($track['Vote'])) {
	foreach($track['Vote'] as $v) {
		if(in_array($user, $v)) {
			$vote = false;
		} else {
			$vote = true;
		}
	}
} else {
	$vote = true;
}

?>

	<tr <?php if($track['Track']['playing'] == 1) : ?>class="playing"<?php endif; ?>>
		<td><?php echo $track['Track']['artist']; ?>&nbsp;</td>
		<td><?php echo $track['Track']['title']; ?>&nbsp;</td>
		<td><?php echo $track['Track']['album']; ?>&nbsp;</td>
		<td><?php echo $track['Track']['release_date']; ?>&nbsp;</td>
		<td><?php echo $track['Track']['added_by']; ?></th>
		<td>
			<?php if($track['Track']['playing'] == 1) : ?>
				Playing
			<?php elseif ($track['Track']['played'] == 0) : ?>
				Coming Up
			<?php else: ?>
				Played
			<?php endif; ?>
		</td>
		<td>
			<?php if($vote) : ?>
				<a href="<?php echo $track['Track']['id']; ?>" class="vote">Vote Down</a>
			<?php else: ?>
				Voted
			<?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<div class="paging">
		<p class="wallofshame"><a href="/tracks/wallofshame">It's not all good, click to see the <b>wall of shame</b>, have mercy.</a></p>
	</div>
</div>
