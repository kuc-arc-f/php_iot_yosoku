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
class ResultsController extends AppController {
	public $components = array('Paginator' ,'Session');
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	//
    public function beforeFilter() {
    	parent::checkFilter();
    }
	
    //
	public function index() {
		$this->loadModel('Aidat');
//		$cid=1;
		$rQuery =$this->request->query;
		$cid =$rQuery["cid"]; 
		//1
		$fnum=1;
		$dim1 = $this->get_fieldItem( $cid,$fnum);
//		exit();
		$sensors_f1 =$dim1["sensors"];
		$yStr1      =$dim1["yStr"];
		$this->set('sensors_f1', $sensors_f1 );
		$this->set('ydims1', $yStr1 );
		//2
		$fnum=2;
		$dim2 = $this->get_fieldItem( $cid,$fnum);
		// var_dump( $dim2);
		$sensors_f2 =$dim2["sensors"];
		$yStr2      =$dim2["yStr"];
		$this->set('sensors_f2', $sensors_f2 );
		$this->set('ydims2', $yStr2 );
		//4
		$fnum=4;
		$dim4 = $this->get_fieldItem( $cid,$fnum);
		$sensors_f4 =$dim4["sensors"];
		$yStr4      =$dim4["yStr"];
		$this->set('sensors_f4', $sensors_f4 );
		$this->set('ydims4', $yStr4 );
		$this->set('cid', $cid );
	}
	//
	private function get_fieldItem( $cid,$fnum){
		$ret =array();
		$aidat =$this->Aidat->get_aidat($cid , $fnum);
		$sensors= $this->get_sensorItem( $cid,$fnum);
		$items = $this->get_plotArray( $sensors , $fnum);
		$sensors_f1 = $this->get_jsArray( $items ) ;
		$yDims1 =$this->get_yArray( count($sensors) , $aidat );
		$yStr = $this->get_jsArray($yDims1);
		$ret["sensors"]= $sensors_f1;
		$ret["yStr"]= $yStr;
		return $ret;
	}
	//
	private function get_sensorItem( $cid,$fnum){
		$this->loadModel('Sensor');
		$sCond= $this->get_itemCondition($cid , $fnum );
		$options= array( 'conditions'=>$sCond
			,'fields'=>array('Sensor.f1 , Sensor.f2, Sensor.f3, Sensor.f4 ,Sensor.created' )
			,'order'=>array('Sensor.created  asc' )
		);
		$sensors = $this->Sensor->find('all' , $options );
		return $sensors;
	}
	//
	private function get_plotArray( $sensors , $fnum){
		$items=array();
		$iCt=0;
		foreach($sensors as  $sensor){
			$item = array();
			$item +=array('xnum'=>$iCt);
			if($fnum ==1){
				$item +=array('value'=>$sensor["Sensor"]["f1"] );
			}
			if($fnum ==2){
				$item +=array('value'=>$sensor["Sensor"]["f2"] );
			}
			if($fnum ==3){
				$item +=array('value'=>$sensor["Sensor"]["f3"] );
			}
			if($fnum ==4){
				$item +=array('value'=>$sensor["Sensor"]["f4"] );
			}
			$items[$iCt] = $item;
			$iCt +=1;
		}
		return $items;
	}
	// 
	// get yValue ,after by hour
	private function get_yValue( $hour, $dcount , $aidat  ){
//		$items=array();
		$wnum = (float)$aidat["Aidat"]["wdat"];
		$bnum = (float)$aidat["Aidat"]["bdat"];
		$xNum = (float)($dcount +(2 * $hour )) / (float)100;
		$yNum= ($wnum * (float)($xNum) + $bnum ) *100.0;
//		$sDbg=$yNum . ", " .  $yNum;
		return $yNum;
	}
	//
	private function get_yArray( $dcount , $aidat  ){
//		$ret= array;
		$items=array();
		$wnum = (float)$aidat["Aidat"]["wdat"];
		$bnum = (float)$aidat["Aidat"]["bdat"];
		$iCt=0;
		for($i=1 ;$i <=($dcount +8); $i++){
//			$xNum = (float)($dcount + (2 * $i)) / (float)100;
//			$xNum = (float)(2 * $i) / (float)100;
			$xNum = (float)$i / (float)100;
			$yNum= ($wnum * (float)($xNum) + $bnum ) *100.0;
			$sDbg=$yNum . ", " .  $yNum;
//			var_dump($sDbg);
			$item = array();
			$item +=array('xnum'=>((float)$iCt) );
			$item +=array('value'=>$yNum );
			$items[$iCt] = $item;
			$iCt +=1;
		}
		//var_dump($items);
		//exit();		
//		$iNum = $dcount;
//		$iCt =1;
		return $items;
	}
	//
	private function get_jsArray( $dats ){
		$iCt=0;
		$sDat="";
	    foreach ($dats as $dat  ) {
	     if( $iCt==0){
	     	$sDat =$sDat . "["  . $dat["xnum"] . ",". $dat["value"]  ."]";
	     }else{
	     	$sDat =$sDat . ", ["  . $dat["xnum"] . ",". $dat["value"]  ."]";
	     }
	     $iCt++;
	    }
	    return $sDat;
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$rQuery =$this->request->query;
		$this->loadModel('Sensor');
		$this->loadModel('Aidat');
		$rQuery =$this->request->query;
//		var_dump($rQuery["field"]);
//		$cid=1;
		$cid =$rQuery["cid"]; 
		$fnum= $rQuery["field"] ;
		$dim = $this->get_fieldItem( $cid,$fnum);
		$sCond= $this->get_itemCondition(1 , 1 );
		/*
		$this->Sensor->recursive = 0;
	    $this->Paginator->settings = array(
		   'conditions'=>$sCond
          ,'limit' => 10 
	    );
	    $this->set('sensors', $this->Paginator->paginate());
	    var_dump($this->Paginator->paginate() );		
		exit();
		*/
	    $sensor= $this->Sensor->get_last_item($cid  , $fnum);
		$sNow="";
		if($fnum==1){
			$sNow = $sensor["Sensor"]["f1"];
		}
		$aidat =$this->Aidat->get_aidat($cid , $fnum);
//		var_dump($aidat );
		$sensors= $this->get_sensorItem( $cid,$fnum);
//		var_dump($sensors );
		$yNum1 = $this->get_yValue( 1, count($sensors) , $aidat  );
		$yNum1 = number_format($yNum1 ,2);
		$yNum6 = $this->get_yValue( 6, count($sensors) , $aidat  );
		$yNum6 = number_format($yNum6 ,2);
		$sensors_f =$dim["sensors"];
		$yStr      =$dim["yStr"];
//		var_dump($yNum6);
		//
		
		$sCond= $this->get_itemCondition($cid , $fnum );
		$options= array( 'conditions'=>$sCond
			,'fields'=>array('Sensor.f1 , Sensor.f2, Sensor.f3, Sensor.f4 ,Sensor.created' )
			,'order'=>array('Sensor.created  DESC' )
		);
		$sensor_descs = $this->Sensor->find('all' , $options );
//		var_dump($sensor_descs );
		
//          ,'order'=> array('Sensor.created'=>'desc')
/*
		$this->Sensor->recursive = 0;
	    $this->Paginator->settings = array(
		   'conditions'=>$sCond
          ,'limit' => 10 
	    );
	    $this->set('sensors', $this->Paginator->paginate());
*/
//		exit();
		$this->set('sensors_f', $sensors_f );
		$this->set('ydims', $yStr );
		$this->set('sNow', $sNow );
		$this->set('yNum1', $yNum1 );
		$this->set('yNum6', $yNum6 );
		$this->set('sensors', $sensor_descs );
		$this->set('field', $fnum);
//		var_dump($sensors );
	}
	//
	public function test() {
		$this->loadModel('Sensor');
		date_default_timezone_set('Asia/Tokyo');
		$ndiff = 24* (60 * 60);
		$from = strtotime("-" .$ndiff . " second");
		$dif_time = date("Y/m/d H:i:s", $from);
		$aBeff  =$this->get_beforeTime(24);
		var_dump($aBeff );
//		var_dump(date("Y/m/d H:i:s") . "\n") ; //「2015/03/10 06:00:00」
//		var_dump (date("Y/m/01") . "\n") ; //「2015/03/01」
//		echo date("Y/m/t");
		exit();
//		$this->get_xArray(array());
//		$posts = $this->Sensor->find('all' );
		$this->loadModel('Page');
		$pages = $this->Page->find('all' );
		var_dump($pages );
		exit();
	}



}
