<div class="row">
  <div class="col-md-3"  >
	<div class="actions" style="margin : 20px;">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
<!--
			<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $post['Post']['id']))); ?> </li>
 -->
			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
  </div>
  <div class="col-md-9" id="container_right" >
	<div class="channels view" style="margin : 20px;">
	<h2 style="color:blue;"><?php echo __('Channel'); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($channel['Channel']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('cname'); ?></dt>
			<dd>
				<?php echo h($channel['Channel']['cname']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
  </div>
</div>


