<?php
App::uses('AppModel', 'Model');

class Dthead extends AppModel {
		public $belongsTo = array(
		'Channel' => array(
			'className' => 'Channel',
			'foreignKey' => 'channel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
