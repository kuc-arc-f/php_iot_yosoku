<?php
App::uses('AppModel', 'Model');

class Sensor extends AppModel {
	public $belongsTo = array(
		'Channel' => array(
			'className' => 'Channel',
			'foreignKey' => 'channel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	//
//	public function get_items_count($chid ,$fnum) {
	public function get_items_count($sCond ) {
		$ret=0;
		$options= array( 'conditions'=>$sCond
		   ,'limit'=>48
		   ,'order'=>array('Sensor.id DESC')
		   ,'fields'=>array('count(*) as ctnum') );
		$sensors=$this->find('first' ,$options  );
		// var_dump($sensors[0]["ctnum"]);
		$ret=$sensors[0]["ctnum"];
		return $ret;
//		exit();
	}
	//
//	public function get_last_item($fnum) {
	public function get_last_item( $chid ,$fnum) {
//		$rQuery =$this->request->query;
//			var_dump($rQuery["field"]);
		$sCond= array('Sensor.channel_id'=>$chid );
		$fOpt = array();
		if(isset($fnum)){
			if($fnum =='1'){
				$sCond += array('Sensor.f1 IS not NULL');
				$fOpt = array('Sensor.f1');
			}
			if($fnum =='2'){
				$sCond += array('Sensor.f2 IS not NULL');
				$fOpt = array('Sensor.f2');
			}
			if($fnum =='3'){
				$sCond += array('Sensor.f3 IS not NULL');
				$fOpt = array('Sensor.f3');
			}
			if($fnum =='4'){
				$sCond += array('Sensor.f4 IS not NULL');
				$fOpt = array('Sensor.f4');
			}
			
		}
//			var_dump($sCond  );
		$options= array( 'conditions'=>$sCond
		   ,'order'=>array('Sensor.id DESC')
		   ,'fields'=>$fOpt  );
//			$sensor=$this->Sensor->find('first' ,$options  );
		$sensor=$this->find('first' ,$options  );
		return $sensor;
//		var_dump($sensor["Sensor" ] );
		//print(json_encode($sensor) );
	}
}
