<?php
App::uses('AppController', 'Controller');

//
class AidatsController extends AppController {
	public $components = array('Paginator' ,'Session');
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
    //
	public function index() {
		// var_dump($this->Session->read('sess_login') ) ;
		$this->Aidat->recursive = 0;
//		$this->Paginator->setting = $this->paginate;
	    $this->Paginator->settings = array(
         'limit' => 10 ,'order'=> array('Aidat.created'=>'DESC')
	    );
//        'conditions' => array('Post.id' > 0), 'limit' => 10

//		$data = $this->Paginator->paginate();
//		$this->paginate= array('consitions'=array('limit'=>1 ) );
//		$data = $this->paginate('Post' ,array('title'=>'t1' ));
		//$data = $this->paginate('Post');
		// var_dump($this->Paginator->params() );
		$this->set('aidats', $this->Paginator->paginate());
	}
	/*
	apikey=XXXX
	field1=1
	field2=2
	field[n]=0
	*/
	public function update() {
//		$request =$this->request;
// http://localhost/yosoku/aidat/update?apikey=xxx&field=1%wnum=1&bnum=1$sttim=1$endtm=1
		$rQuery =$this->request->query;
	    $cid = $this->check_channnel_id($rQuery["apikey"] );
	    if ($cid < 1){
	       print("501");
	       exit();
	    }		
		if(isset($rQuery["field"])==false){
			print ('600');
			exit();
		}
		if ($this->request->is('get')) {
			$aidat=array();
			$aidat["channel_id"]=$cid;
			$aidat["field"]=$rQuery["field"];
			$aidat["wdat"]=$rQuery["wnum"];
			$aidat["bdat"]=$rQuery["bnum"];
			$aidat["st_time"]=$rQuery["sttm"];
//			$aidat["st_time"]= '2009-08-25 11:38:23';
			$aidat["end_time"]=$rQuery["endtm"];
			$this->loadModel('Aidat');
			$this->Aidat->create();
			if ($this->Aidat->save($aidat  )) {
				print ("200");
			}else{
				print ("502");
			}
		}
		exit();
	}
	//
	public function get_aidat() {
		$rQuery =$this->request->query;
		if(isset($rQuery["field"])==false){
			print ('600');
			exit();
		}
		if ($this->request->is('get')) {
			$sCond= array('Aidat.channel_id'=>1);
			$sCond += array('field'=> $rQuery["field"] );
			$this->loadModel('Aidat');
			$options=array('conditions'=>$sCond 
			 ,'order'=>array('Aidat.created DESC')
			 ,'fields'=>array('Aidat.wdat, Aidat.bdat') );
			$aidat =$this->Aidat->find('first', $options);
//			var_dump($aidat );
			print(json_encode( $aidat ) );
		}
		exit();
	}

	//
	public function test() {
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
