<div class="test1" style="padding : 20px; ">
  <a href="#" id="test1"> [ Test1 ] </a>
</div>

<div class="row">
  <div class="col-md-3"  >
	<div class="actions" style="margin : 20px;">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')
							    ,array(
								'class' => 'btn btn-primary',
								'escape' => false
								));
			 ?></li>
		</ul>
	</div>

  </div>
  <div class="col-md-9" id="container_right">
	<div class="sensors index" style="margin : 20px;" >
		<h2 style="color:blue;"><?php echo __('Sensor'); ?></h2>
		<table class="table table-striped" cellpadding="0" cellspacing="0">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('f1'); ?></th>
				<th><?php echo $this->Paginator->sort('f2'); ?></th>
				<th><?php echo $this->Paginator->sort('f3'); ?></th>
				<th><?php echo $this->Paginator->sort('f4'); ?></th>
				<th><?php echo $this->Paginator->sort('f5'); ?></th>
				<th><?php echo $this->Paginator->sort('f6'); ?></th>
				<th><?php echo $this->Paginator->sort('f7'); ?></th>
				<th><?php echo $this->Paginator->sort('f8'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($sensors as $sensor ): ?>
		<tr>
			<td><?php echo h($sensor['Sensor']['id']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f1']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f2']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f3']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f4']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f5']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f6']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f7']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f8']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['created']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['modified']); ?>&nbsp;</td>
			<td class="actions">
				<a href="">
				<?php echo $this->Html->link(__('View'), array('action' => 'view',  $sensor['Sensor']['id'])
							    ,array( 'class' => 'btn btn-primary', 'escape' => false) ); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sensor['Sensor']['id'])
				,array( 'class' => 'btn btn-primary', 'escape' => false) );  ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sensor['Sensor']['id'])
				, array('class' => 'btn btn-default', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', $sensor['Sensor']['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Sesnor {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<div class="paging">
		<!-- test  -->
		 <?php
		    echo $this->Paginator->prev('前へ' . __(''), array(), null, array('class' => 'prev disabled'));
		  ?>
		      
		  <?php
		    echo $this->Paginator->counter(array(
		        'format' => __('{:page}/{:pages}ページを表示')
		    ));
		  ?>
		      
		  <?php
		    echo $this->Paginator->next(__('') . ' 次へ', array(), null, array('class' => 'next disabled'));
		  ?>
		</div>
	</div>
  <?php 
    //echo S_SITE_CONTEXT . "<br />"; 
    //echo $this->name;
  ?>

  </div>
  <script>
  $(function(){
	  $('#test1').click(function(e){
//	    alert('#test1');
	      $.get('/<?php echo S_SITE_CONTEXT;  ?>/posts/test1' ,{}, function(res){
	alert( res.result );
	          //$('#post_' +res.result).fadeOut();
	        }, "json");

	  });
  });
  </script>

</div>


