<?php
  echo $this->Html->script('jquery.jqplot.min'); 
  echo $this->Html->script('app_result'); 
  echo $this->Html->css('jquery.jqplot.min');
  echo $this->Html->css('app_result');
?>
<div class="row" style="margin-top:20px;">
  <div class="col-md-3"  >
  </div>
  <div class="col-md-3" align="left">
<!--
	<h1>Detail</h1>
 -->

	<table border="0">
	<tr>
		<td valign="bottom"><p> now:</p></td>
		<td width="90px" align="center"><h2><?php echo $sNow; ?></h2>
		</td>
	</tr>
	</table>
  </div>
  <div class="col-md-3">
	<table border="0">
	<tr>
		<td valign="bottom"><p> future:</p></td>
	</tr>
	<tr>
		<td>1 H after:</td>
		<td> <?php echo $yNum1; ?></td>
	</tr>
	<tr>
		<td>6 H after:</td>
		<td> <?php echo $yNum6; ?></td>
	</tr>
	</table>

  </div>
  <div class="col-md-3">
  </div>
</div>

<!-- graph -->
<script>
jQuery( function() {
    data_1  = [<?php echo $sensors_f ?>];
    data_2  = [<?php echo $ydims  ?>];
    call_jplot('jqPlot-sample' , data_1 , data_2 );
} );
</script>
<div class="row" style="margin-top:20px;">
  <div class="col-md-12" align="center">
	<table>
	<tr>
		<td class="field_title"><h3>field 1</h3>
		</td>
	</tr>
	<tr>
		<td >
		<div id="jqPlot-sample" style="height: 360px; width: 540px;" ></div>
		</td>
	</tr>
	<tr>
		<td align="center">
		</td>
	</tr>
	</table>

  </div>
</div>
<div class="row" style="margin-top:20px;">
  <div class="col-md-3" align="center">
  </div>
  <div class="col-md-6" align="center">
		<table class="table table-striped" cellpadding="0" cellspacing="0">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('f1'); ?></th>
				<th><?php echo $this->Paginator->sort('f2'); ?></th>
				<th><?php echo $this->Paginator->sort('f3'); ?></th>
				<th><?php echo $this->Paginator->sort('f4'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $ict=0; ?>
		<?php foreach ($sensors as $sensor ): ?>
		<?php if ($ict <=20){ ?>
		<tr>
			<td><?php echo h($sensor['Sensor']['f1']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f2']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f3']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['f4']); ?>&nbsp;</td>
			<td><?php echo h($sensor['Sensor']['created']); ?>&nbsp;</td>
<!--
			<td><?php echo h($sensor['Sensor']['modified']); ?>&nbsp;</td>
 -->
		</tr>
		<?php } ?>
		<?php $ict +=1; ?>
	<?php endforeach; ?>
		</tbody>
  </div>
</div>









