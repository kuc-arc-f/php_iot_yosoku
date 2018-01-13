<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	//
	public function check_channnel_id($key) {
		$ret=0;
		$this->loadModel('Channel');
		$options= array('conditions' => array('Channel.apikey'=>$key ));
	    $unum = $this->Channel->find('count', $options );
	    if ($unum < 1){
	    	return $ret;
//	       print("501");
	//       exit();
	    }
		$options= array('conditions' => array('Channel.apikey'=>$key )
			,'fields'=>'Channel.id'
		);
	    $channel = $this->Channel->find('first', $options );
	    // var_dump($channel );
	    $ret = (int)$channel["Channel"]["id"];
	    return $ret;
	
	}
	//
    public function checkFilter() {
    	$ss = $this->Session->read('sess_login' );
    	if(isset($ss)==false){
	    	var_dump('#not-Login');
	    	return $this->redirect(array( 'controller'=>'users','action' => 'login'));
    	}
//    	var_dump($ss);
    }
    //
    public function get_beforeTime($hour){
    	$ret="";
		date_default_timezone_set('Asia/Tokyo');
		$ndiff = $hour * (60 * 60);
		$from = strtotime("-" .$ndiff . " second");
//		$from = strtotime("-3600 second");
		$dif_time = date("Y-m-d H:i:s", $from);
		$ret =$dif_time;
    	return $ret;
    }
    //
    public function get_itemCondition($cid , $fnum){
		$sCond= array('Sensor.channel_id'=>$cid);
//			$fOpt = array('Sensor.created');
		if($fnum =='1'){
			$sCond += array('Sensor.f1 IS not NULL');
//					$fOpt += array('Sensor.f1');
		}
		if($fnum =='2'){
			$sCond += array('Sensor.f2 IS not NULL');
//					$fOpt += array('Sensor.f2');
		}
		if($fnum =='3'){
			$sCond += array('Sensor.f3 IS not NULL');
//					$fOpt += array('Sensor.f3');
		}
		if($fnum =='4'){
			$sCond += array('Sensor.f4 IS not NULL');
//					$fOpt += array('Sensor.f4');
		}
		$aBef   =$this->get_beforeTime(48);
		$sCond[2]= array("Sensor.created >='" . $aBef . "'");		
		return $sCond; 	
    }

	
}
