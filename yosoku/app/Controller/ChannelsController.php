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
class ChannelsController extends AppController {
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
		$this->Channel->recursive = 0;
	    $this->Paginator->settings = array(
         'limit' => 10 
          ,'order'=> array('Channel.created'=>'asc'
            ,'fields'=>'Channel.create as created_s' )
	    );
//        'conditions' => array('Post.id' > 0), 'limit' => 10

//		$data = $this->Paginator->paginate();
//		$this->paginate= array('consitions'=array('limit'=>1 ) );
//		$data = $this->paginate('Post' ,array('title'=>'t1' ));
		//$data = $this->paginate('Post');
		$channels=$this->Paginator->paginate();
		/*
		foreach($channels as $channel){
			$dif_time = date("Y-m-d H:i:s", strtotime($channel["Channel"]["created"]) );
			var_dump($dif_time );
		}
		*/
//		var_dump($this->Paginator->paginate() );
		$this->set('channels', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Channel->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Channel.' . $this->Channel->primaryKey => $id));
		$this->set('channel', $this->Channel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
//var_dump($this->request );
//exit;
		if ($this->request->is('post')) {
			$this->Channel->create();
			if ($this->Channel->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}else{
		  var_dump('not- pages');
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Channel->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('channel', 'put'))) {
			if ($this->Channel->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Channel.' . $this->Channel->primaryKey => $id));
			$this->request->data = $this->Channel->find('first', $options);
//			var_dump($this->request->data);
			//
//			$this->set('post', $this->request->data );
			$this->set('channel', $this->request->data );
			
//			var_dump($this->request->data );
//			exit();
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
//			$this->Flash->success(__('The post has been deleted.'));
			$this->Flash->success(__('The post を削除しました。'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	//
	public function test() {
		$channels = $this->Channel->find('all' );
		// var_dump($posts[0]["Tag"][0]["tag"] );
		//var_dump($posts[0]["Tag"][0]["tag"] );
		foreach( $channels  as $channel){
			$sensor= $channel["Sensor"];
			var_dump($sensor );
//			foreach($tags  as $tag){
//				echo $tag["id"] . ", " .$tag["tag"] . "<br />";
//			}
		}
		exit();
	}
}
