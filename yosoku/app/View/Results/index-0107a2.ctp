<?php
  echo $this->Html->script('jquery.jqplot.min'); 
  echo $this->Html->script('app_result'); 
  echo $this->Html->css('jquery.jqplot.min');
  echo $this->Html->css('app_result');
?>
<!--
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
	<div class="results index" style="margin : 0px;" >
	</div>
  </div>
</div>
 -->
<!-- graph -->
<script>
jQuery( function() {
//    data_1  = [1,2,3,4];
    data_1_1  = [<?php echo $sensors_f1 ?>];
    data_1_2  = [<?php echo $ydims1  ?>];
    call_jplot('jqPlot-sample' , data_1_1 , data_1_2 );
    //2
    data_2_1  = [<?php echo $sensors_f2 ?>];
    data_2_2  = [<?php echo $ydims2  ?>];
    call_jplot('jqPlot-sample2' , data_2_1 , data_2_2 );
    // dat4
    data_4_1  = [<?php echo $sensors_f4 ?>];
    data_4_2  = [<?php echo $ydims4  ?>];
    call_jplot('jqPlot-sample4' , data_4_1 , data_4_2 );
} );
</script>
<div class="row">
  <div class="col-md-6" align="center">
    <div id="jqPlot-sample" style="height: 360px; width: 540px;" ></div>
  </div>
  <div class="col-md-6" align="center">
    <div id="jqPlot-sample2" style="height: 360px; width: 540px;" ></div>
  </div>
</div>
<div class="row">
  <div class="col-md-6" align="center">
    <div id="jqPlot-sample3" style="height: 360px; width: 540px;" ></div>
  </div>
  <div class="col-md-6" align="center">
    <div id="jqPlot-sample4" style="height: 360px; width: 540px;" ></div>
  </div>

</div>








