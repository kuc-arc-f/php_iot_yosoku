<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class SpeekersController extends AppController {
//	public $components = array('Paginator' ,'Session');
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
    //
	public function index() {
	}
	//
	public function get_message() {
		// apikey
		$out= array();
		$rQuery =$this->request->query;
		if ($this->request->is('get')) {
		    $cid = $this->check_channnel_id($rQuery["apikey"] );
		    if ($cid < 1){
		       print(json_encode($out ));
		       exit();
		    }
		    // $sCond= array('Sensor.channel_id'=>$cid);
			$this->loadModel('Sensor');
			$this->loadModel('Aidat');
			$fnum =$rQuery["field"];
			$sCond= $this->get_itemCondition($cid , $rQuery["field"]);
//			$xNum = $this->Sensor->get_items_count( $cid, $fnum );
			$xNum = $this->Sensor->get_items_count( $sCond);
			//var_dump( (int)$xNum );
			//exit();
			if( (int)$xNum <1 ){
				print(json_encode($out ));
				exit();
			}
//			$sensor = $this->Sensor->get_last_item($fnum);
			$sensor = $this->Sensor->get_last_item($cid  , $fnum);
			//var_dump($sensor["Sensor"]["f1"] );
			$now=0;
			if($fnum==1){
				$now = $sensor["Sensor"]["f1"];
			}
			if($fnum==2){
				$now = $sensor["Sensor"]["f2"];
			}
			if($fnum==3){
				$now = $sensor["Sensor"]["f3"];
			}
			if($fnum==4 ){
				$now = $sensor["Sensor"]["f4"];
			}
			if($fnum==5 ){
				$now = $sensor["Sensor"]["f5"];
			}
			if($fnum==6 ){
				$now = $sensor["Sensor"]["f6"];
			}
			if($fnum==7 ){
				$now = $sensor["Sensor"]["f7"];
			}
			if($fnum==8 ){
				$now = $sensor["Sensor"]["f8"];
			}
//			$aidat =$this->Aidat->get_aidat($fnum);
			$aidat =$this->Aidat->get_aidat($cid , $fnum);
	//		var_dump($aidat["Aidat"] );
			$Wnum = (float)$aidat["Aidat"]["wdat"];
			$Bnum = (float)$aidat["Aidat"]["bdat"];
			$yNum   =$this->get_yParam($xNum, 1, $Wnum, $Bnum );
			$yNum6 =$this->get_yParam($xNum, 6, $Wnum, $Bnum );
			$ritu = $this->get_hiritu($now, $yNum);
			$ritu6 = $this->get_hiritu($now, $yNum6);
			$out = array('now'=> $now
				,'yNum'=>$yNum
				,'ritu'=>$ritu
				,'yNum6'=>$yNum6
				,'ritu6'=>$ritu6
			);
		}
		print(json_encode($out ));
		exit();
	}
	// 
	private function get_hiritu($oNum, $nNum){
		$diff = (float)$nNum - (float)$oNum;
		// var_dump($diff );
		$ritu = ( (float)$diff / (float)$oNum ) * (float)100;
		$rNum = number_format($ritu ,2);
//		$rNum = $ritu;
		return $rNum;
	}
	//
	private function get_yParam($dcount, $hour, $wnum, $bnum ) {
		$xNum = (float)($dcount + (2 * $hour)) / (float)100;
//		var_dump($xNum);
		$yNum= ($wnum * (float)($xNum) + $bnum ) *100.0;
		$yNum = number_format($yNum ,2);
		return $yNum;
	}

    //
	private function test99($num) {
		print('#99, ' . $num);
	}
	//
	public function test() {
		$this->test99(1);
		exit();
		$this->loadModel('Channel');
//		$channel= $this->Channel->find('')
		$options= array('conditions' => array('Channel.apikey'=>'u2c1' ));
	    $unum = $this->Channel->find('count', $options );
	    var_dump($unum );
		$options= array('conditions' => array('Channel.apikey'=>'u2c1' )
			,'fields'=>array('Channel.id', 'Channel.cname')
			);
	    $chs = $this->Channel->find('first', $options );
	    var_dump($chs["Channel"] );
		exit();
		$dat = array();
		$dat['k1']=1;
		$dat['k2']=2;
		$this->loadModel('Sensor');
		$posts = $this->Sensor->find('all' );
		var_dump($posts );
		exit();
	}


}
