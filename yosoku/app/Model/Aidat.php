<?php
App::uses('AppModel', 'Model');

class Aidat extends AppModel {
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
//	public function get_aidat($fnm ) {
	public function get_aidat( $chid ,$fnm ) {
		$sCond= array('Aidat.channel_id'=>$chid );
		$sCond += array('field'=> $fnm);
		$options=array('conditions'=>$sCond 
		 ,'order'=>array('Aidat.created DESC')
		 ,'fields'=>array('Aidat.wdat, Aidat.bdat') );
		$aidat =$this->find('first', $options);
//			var_dump($aidat );
///		print(json_encode( $aidat ) );
		return $aidat;
//		exit();
	}
}
