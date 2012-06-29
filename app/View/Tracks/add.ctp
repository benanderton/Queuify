<?php echo $this->Html->script('addtrack', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->css('addtrack'); ?>

<div class="tracks form">
<?php echo $this->Form->create('SpotifyTrack');?>
	<fieldset>
		<legend><?php echo __('Add Track'); ?></legend>
		<?php echo $this->Form->input('artist', array('value' => 'Search for a track')); ?>
		<ul id="results"></ul>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tracks'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
