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
class ApisController extends AppController {
//	public $components = array('Paginator' ,'Session');
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
    //
	public function index() {
		// var_dump($this->Session->read('sess_login') ) ;
		$this->Page->recursive = 0;
//		$this->Paginator->setting = $this->paginate;
	    $this->Paginator->settings = array(
         'limit' => 10 ,'order'=> array('Page.created'=>'asc')
	    );
//        'conditions' => array('Post.id' > 0), 'limit' => 10

//		$data = $this->Paginator->paginate();
//		$this->paginate= array('consitions'=array('limit'=>1 ) );
//		$data = $this->paginate('Post' ,array('title'=>'t1' ));
		//$data = $this->paginate('Post');
		// var_dump($this->Paginator->params() );
		$this->set('pages', $this->Paginator->paginate());
	}
	/*
	apikey=XXXX
	field1=1
	field2=2
	field[n]=0
	*/
	public function update() {
		$request =$this->request;
// var_dump($request->query );
// exit();
	if ($this->request->is('get')) {
//		$this->loadModel('Channel');
//		$options= array('conditions' => array('Channel.apikey'=>$request->query["apikey"] ));
//	    $unum = $this->Channel->find('count', $options );
	    $id = $this->check_channnel_id($request->query["apikey"]);
	    if ($id < 1){
	       print("501");
	       exit();
	    }
		$sensor = array();
		$sensor["channel_id"]=$id;
		if(isset($request->query["field1"])){
			$sensor["f1"]=$request->query["field1"];
		}
		if(isset($request->query["field2"])){
			$sensor["f2"]=$request->query["field2"];
		}
		if(isset($request->query["field3"])){
			$sensor["f3"]=$request->query["field3"];
		}
		if(isset($request->query["field4"])){
			$sensor["f4"]=$request->query["field4"];
		}
		if(isset($request->query["field5"])){
			$sensor["f5"]=$request->query["field5"];
		}
		if(isset($request->query["field6"])){
			$sensor["f6"]=$request->query["field6"];
		}
		if(isset($request->query["field7"])){
			$sensor["f7"]=$request->query["field7"];
		}
		if(isset($request->query["field8"])){
			$sensor["f8"]=$request->query["field8"];
		}
// var_dump($sensor );
		
			$this->loadModel('Sensor');
			$cid=1;
			$this->Sensor->create();
			if ($this->Sensor->save($sensor  )) {
				//$this->Flash->success(__('The post has been saved.'));
				//return $this->redirect(array('action' => 'index'));
				print("200");
			} else {
//				$this->Flash->error(__('The post could not be saved. Please, try again.'));
				print("502");
			}			
			
		}
		exit();
	}
	//
	public function get_items() {
		$rQuery =$this->request->query;
		if ($this->request->is('get')) {
//			var_dump($rQuery["field"]);
		    $cid = $this->check_channnel_id($rQuery["apikey"] );
		    if ($cid < 1){
		       print("501");
		       exit();
		    }
		    if (isset($rQuery["field"])==false){
		       print("501");
		       exit();
		    }
			$sCond= $this->get_itemCondition($cid , $rQuery["field"]);
			$fOpt = array('Sensor.f1 ,Sensor.f2, Sensor.f3, Sensor.f4, Sensor.created');
			$this->loadModel('Sensor');
			// var_dump($fOpt);
			$options= array( 'conditions'=>$sCond
			   ,'order'=>array('Sensor.created asc')
			   ,'fields'=>$fOpt  );
	//		$options= array( 'limit'=>48 );
			$sensors=$this->Sensor->find('all' ,$options  );
	//		var_dump($sensors );
			print(json_encode($sensors) );
		}
		exit();
	}
	//
	public function get_items_count() {
		$rQuery =$this->request->query;
		if ($this->request->is('get')) {
//			var_dump($rQuery["field"]);
			$sCond= array('Sensor.channel_id'=>1);
			if(isset($rQuery["field"])){
				if($rQuery["field"] =='1'){
					$sCond += array('Sensor.f1 IS not NULL');
				}
				if($rQuery["field"] =='2'){
					$sCond += array('Sensor.f2 IS not NULL');
				}
				if($rQuery["field"] =='3'){
					$sCond += array('Sensor.f3 IS not NULL');
				}
				if($rQuery["field"] =='4'){
					$sCond += array('Sensor.f4 IS not NULL');
				}
			}
			$this->loadModel('Sensor');
			$options= array( 'conditions'=>$sCond
			   ,'limit'=>48
			   ,'order'=>array('Sensor.id DESC')
			   ,'fields'=>array('count(*) as ctnum') );
	//		$options= array( 'limit'=>48 );
			$sensors=$this->Sensor->find('first' ,$options  );
			//var_dump($sensors );
			print(json_encode($sensors) );
		}
		exit();
	}
	//
	public function get_last_item() {
		$rQuery =$this->request->query;
		if ($this->request->is('get')) {
//			var_dump($rQuery["field"]);
			$sCond= array('Sensor.channel_id'=>1);
			$fOpt = array();
			if(isset($rQuery["field"])){
				if($rQuery["field"] =='1'){
					$sCond += array('Sensor.f1 IS not NULL');
					$fOpt = array('Sensor.f1');
				}
				if($rQuery["field"] =='2'){
					$sCond += array('Sensor.f2 IS not NULL');
					$fOpt = array('Sensor.f2');
				}
				if($rQuery["field"] =='3'){
					$sCond += array('Sensor.f3 IS not NULL');
					$fOpt = array('Sensor.f3');
				}
				if($rQuery["field"] =='4'){
					$sCond += array('Sensor.f4 IS not NULL');
					$fOpt = array('Sensor.f4');
				}
				
			}
//			var_dump($sCond  );
			$this->loadModel('Sensor');
			$options= array( 'conditions'=>$sCond
			   ,'order'=>array('Sensor.id DESC')
			   ,'fields'=>$fOpt  );
	//		$options= array( 'limit'=>48 );
			$sensor=$this->Sensor->find('first' ,$options  );
	//		var_dump($sensors );
			print(json_encode($sensor) );
		}
		exit();
	}
	//
	public function test() {
//		$id = $this->check_channnel_id('u2c1');
		$cond= $this->get_itemCondition(1 , 1);
		var_dump($cond);
		exit;
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
