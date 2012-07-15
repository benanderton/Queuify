<h2>Wall of shame</h2>

<div class="tracks index">

	<table cellpadding="0" cellspacing="0" id="results-table">
	<tr>
			<th><?php echo $this->Paginator->sort('added_by', 'Guity party'); ?></th>	
			<th><?php echo $this->Paginator->sort('artist');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('album');?></th>
			<th><?php echo $this->Paginator->sort('release_date');?></th>
	</tr>
	<?php
	foreach ($tracks as $track): ?>
	<tr>
		<td><?php echo h($track['Track']['added_by']); ?></th>
		<td><?php echo h($track['Track']['artist']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['title']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['album']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['release_date']); ?>&nbsp;</td>
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
</div>
