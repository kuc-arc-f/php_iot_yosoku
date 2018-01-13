<?php
App::uses('AppModel', 'Model');

class Channel extends AppModel {
        public $hasOne = array(
            'Dthead' => array(
                'className' => 'Dthead',
                'foreignKey' => 'channel_id',
            )
        );
        //
        public $hasMany = array(
            'Sensor' => array(
                'className' => 'Sensor',
                'foreignKey' => 'channel_id',
            )
        );
        //
		public $belongsTo = array(
		'Uer' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
}
