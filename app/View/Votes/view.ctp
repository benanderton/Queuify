<div class="votes view">
<h2><?php  echo __('Vote');?></h2>
	<dl>
		<dt><?php echo __('Track'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vote['Track']['title'], array('controller' => 'tracks', 'action' => 'view', $vote['Track']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($vote['Vote']['user']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vote'), array('action' => 'edit', $vote['Vote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vote'), array('action' => 'delete', $vote['Vote']['id']), null, __('Are you sure you want to delete # %s?', $vote['Vote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
