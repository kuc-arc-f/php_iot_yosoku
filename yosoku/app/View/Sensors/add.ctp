<div class="channels form">
<?php echo $this->Form->create('Channel'); ?>
	<fieldset>
		<legend><?php echo __('Add Channel'); ?></legend>
	<?php
		echo $this->Form->input('cname');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Channels'), array('action' => 'index')); ?></li>
	</ul>
</div>
