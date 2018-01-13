<div class="row" >
  <div class="col-md-2" >
  </div >
  <div class="col-md-9" >
	<div class="aidats index" style="margin : 20px;" >
		<h2 style="color:blue;"><?php echo __('Aidats'); ?></h2>
		<table class="table table-striped" cellpadding="0" cellspacing="0">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('channel_id'); ?></th>
				<th><?php echo $this->Paginator->sort('field'); ?></th>
				<th><?php echo $this->Paginator->sort('W'); ?></th>
				<th><?php echo $this->Paginator->sort('b'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
<!--
				<th><?php echo $this->Paginator->sort('st_time'); ?></th>
				<th><?php echo $this->Paginator->sort('end_time'); ?></th>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
 -->
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($aidats as $aidat ): ?>
		<tr>
			<td><?php echo h($aidat['Aidat']['channel_id']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['field']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['wdat']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['bdat']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['created']); ?>&nbsp;</td>
<!--
			<td><?php echo h($aidat['Aidat']['st_time']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['end_time']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['id']); ?>&nbsp;</td>
			<td><?php echo h($aidat['Aidat']['modified']); ?>&nbsp;</td>
 -->
			<td class="actions">
				<a href="">
				<?php echo $this->Html->link(__('View'), array('action' => 'view',  $aidat['Aidat']['id'])
							    ,array( 'class' => 'btn btn-primary', 'escape' => false) ); ?>
<!--
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aidat['Aidat']['id'])
				,array( 'class' => 'btn btn-primary', 'escape' => false) );  ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aidat['Aidat']['id'])
				, array('class' => 'btn btn-default', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', $aidat['Aidat']['id']))); ?>
 -->
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
		    echo $this->Paginator->prev('前へ' . __(''), array(), null, array('class' => 'btn btn-default'));
		  ?>
		      
		  <?php
		    echo $this->Paginator->counter(array(
		        'format' => __('{:page}/{:pages}ページを表示')
		    ));
		  ?>
		      
		  <?php
		    echo $this->Paginator->next(__('') . ' 次へ', array(), null, array('class' => 'btn btn-default'));
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


