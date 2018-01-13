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
class SensorsController extends AppController {
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
		// var_dump($this->Session->read('sess_login') ) ;
		$this->Sensor->recursive = 0;
//		$this->Paginator->setting = $this->paginate;
	    $this->Paginator->settings = array(
         'limit' => 10 ,'order'=> array('Sensor.created'=>'desc')
	    );
//        'conditions' => array('Post.id' > 0), 'limit' => 10

//		$data = $this->Paginator->paginate();
//		$this->paginate= array('consitions'=array('limit'=>1 ) );
//		$data = $this->paginate('Post' ,array('title'=>'t1' ));
		//$data = $this->paginate('Post');
		// var_dump($this->Paginator->params() );
		$this->set('sensors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sensor->id = $id;
		if (!$this->Sensor->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sensor->delete()) {
//			$this->Flash->success(__('The post has been deleted.'));
			$this->Flash->success(__('The sensor を削除しました。'));
		} else {
			$this->Flash->error(__('The sensor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	//
	public function test() {
		$sCond= $this->get_itemCondition(1 , 1 );
		$this->Sensor->recursive = 0;
	    $this->Paginator->settings = array(
		   'conditions'=>$sCond
          ,'limit' => 10 
	    );
//	    $this->set('sensors', $this->Paginator->paginate());
	    var_dump($this->Paginator->paginate() );		
		exit();

//		$posts = $this->Sensor->find('all' );
		$this->loadModel('Page');
		$pages = $this->Page->find('all' );
		var_dump($pages );
		exit();
	}



}
