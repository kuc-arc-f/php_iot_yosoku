

<div class="row">
  <div class="col-md-3" id="container_left" >
	<div class="actions" style="margin : 20px;" >
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Form->postLink(__('Delete')
			 , array('action' => 'delete', $this->Form->value('Channel.id'))
	                 , array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Channel.id')))); ?>
			</li>
			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		</ul>
	</div>
  </div>
  <div class="col-md-9" id="container_right">
	<div class="posts form" style="margin : 20px;" >
	<?php echo $this->Form->create('Channel'); ?>
		<fieldset>
			<legend><h2 style="color:blue;"><?php echo __('Edit Channel'); ?></h2></legend>
		<?php
			echo $this->Form->input('id');
//echo $post['Post']['id'];
// echo $post['Post']['title'];
//   		        echo $this->Form->input('title');
//		echo $this->Form->input('body');
		?>
	        <div class="form-group">
	            <label for="name">cname</label>
	            <input name="data[Channel][cname]" value="<?php echo $channel['Channel']['cname']; ?>"
			 id="name" type="text" class="form-control" />
	        </div>
	        <div class="form-group">
	            <label for="name">apikey</label>
	            <input name="data[Channel][apikey]" value="<?php echo $channel['Channel']['apikey']; ?>"
			 id="apikey" type="text" class="form-control" />
	        </div>

		<button type="submit" class="btn btn-primary">save</button>
		</form>

		</fieldset>
		<br style="margin-bottom: 100px;"/>
<!-- 
	<?php echo $this->Form->end(__('Submit')); ?>
-->
	</div>
  </div>
</div>

