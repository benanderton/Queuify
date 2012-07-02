<table cellpadding="0" cellspacing="0" id="results-table">
	<tr>
		<th><?php echo $this->Paginator->sort('artist');?></th>
		<th><?php echo $this->Paginator->sort('title');?></th>
		<th><?php echo $this->Paginator->sort('album');?></th>
		<th><?php echo $this->Paginator->sort('release_date');?></th>
		<th>Status</th>
	</tr>
	<?php
	foreach ($tracks as $track): ?>
	<tr>
		<td><?php echo h($track['Track']['artist']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['title']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['album']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['release_date']); ?>&nbsp;</td>
		<td><?php echo ($track['Track']['played'] == 1) ? 'Played' : 'Coming Up'; ?>&nbsp;</td>		
	</tr>
	<?php endforeach; ?>
</table>

