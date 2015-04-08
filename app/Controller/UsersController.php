<?php

class UsersController extends AppController {
	public $name = 'Users';

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->deny('index');
        $this->Auth->allow('login','logout');
    }
	

	public function login() {
		if($this->request->is('post'))
		{
			if($this->Auth->login()){
				// $this->redirect($this->Auth->redirect());
				$this->redirect($this->Auth->redirect());
			}else{
					
			}
		}
	}

	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	
    public function index() {
		$this->loadModel('Careers');
		$careers = $this->Careers->find('all',array('order' => 'created DESC','limit'=>'5'));
		$this->set(compact('careers'));
		
		$this->loadModel('News');
		$news = $this->News->find('all',array('order' => 'created DESC','limit'=>'5'));
		$this->set(compact('news'));
		
		$this->loadModel('Events');
		$events = $this->Events->find('all',array('order' => 'created DESC','limit'=>'5'));
		$this->set(compact('events'));
		
		$this->loadModel('Contacts');
		$contacts = $this->Contacts->find('all',array('order' => 'created DESC','limit'=>'5'));
		$this->set(compact('contacts'));
		
    }


    public function add() {
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }
    }

	
    public function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

	
    public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

}

?>