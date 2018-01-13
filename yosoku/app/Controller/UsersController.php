<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	/**
	* Components
	*
	* @var array
	*/
	public $components = array('Paginator' ,'Session' );
	//public $components = array('Paginator' ,'Session');
	
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'User.id' => 'asc'
        )
    );
	//
    public function beforeFilter() {
        $valid= false;
        $exts =array('login', 'add');
        foreach ($exts as $ext ){
        	if ( $ext == $this->action){
//        	  var_dump($this->action);
        	  $valid=true;
//        	  exit();
        	}
        }
        if($valid== false){
             parent::checkFilter();
        }
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// Router::connect('/', array('controller' => 'posts', 'action' => 'index', 'home'));
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	//
	public function login() {
//		var_dump($this->request["data"]["User"]["username"]);
//		exit;
	    if ($this->request->is('post')) {
			 $uname = $this->request["data"]["User"]["username"];
			 $pass  = $this->request["data"]["User"]["password"];
			 $unum = $this->User->find('count'
			 , array('conditions' => array('User.name'=>$uname ,'User.pass'=>$pass )) );
			 var_dump($unum );
//	        if ($this->Auth->login()) {
	        if ($unum >0 ) {
	        	$this->Session->write('sess_login','1');
//	            $this->redirect($this->Auth->redirect());
	            $this->redirect(array('controller'=>'pages' ,'action' => 'index'));
	        } else {
	            $this->Flash->error(__('Invalid username or password, try again'));
	        }
	    }
	}
	//
	public function logout() {
		//sess_login
		$this->Session->delete('sess_login');
	    //$this->redirect($this->Auth->logout());
	}

}
