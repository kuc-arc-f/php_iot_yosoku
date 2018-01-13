<div class="row">
  <div class="col-md-3"  >
	<div class="actions" style="margin : 20px;">
		<h3><?php echo __('add Page'); ?></h3>
		<ul>
<!-- 
			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
 -->
		</ul>
	</div>
  </div>
  <div class="col-md-9" id="container_right" >
	<div class="posts form" style="margin : 20px;">
	  <?php echo $this->Form->create('Page'); ?>
	<fieldset>
	<legend></legend>
        <div class="form-group">
		<label for="name">title</label>
		<input name="data[Page][title]" id="name" type="text" class="form-control" />
	</div>
        <div class="form-group">
		<label for="name">body</label>
		<br />
		<textarea name="data[Page][body]" class="form-control" rows="3"></textarea>
	</div>
	</fieldset>
  </div>
<!--
	<?php echo $this->Form->end(__('Submit')); ?>
 -->
</div>
  <div class="col-md-3"  >
  </div>
  <div class="col-md-9"  >
	<div class="actions" style="margin : 20px;">
	　　<button class="btn btn-primary">Submit</button>
	</div>
  </div>

