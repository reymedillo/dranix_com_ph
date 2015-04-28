<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AuthComponent', 'Controller/Component');

class UsersController extends AppController {
	public $name = 'Users';

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->deny('index','add');
        $this->Auth->allow('login','logout','recover');
    }
	

	public function login() {
		if($this->request->is(array('post')))
		{
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
			}
			else{
				$this->Session->setFlash('Your username/password is incorrect.','flash_notification');
				$this->redirect($this->Auth->redirect());
			}
		}
		if ($this->Session->read('Auth.User')) {
       	$this->redirect('/');
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
        	$password = substr(str_shuffle('zxcvbmnlkjhgfdsapoiuytrewq'),0,8);
        	$this->request->data['User']['password'] = $password;
        	$this->User->create();

        	$email = new CakeEmail();
        	$email->config('default');
        	$email->template('default',null);
        	$email->emailFormat(null);

        	$email->from(array('itsupport@dranix.com.ph' => 'Dranix Distributors Website'));
        	$email->to($this->data['User']['email']);
        	$email->subject('Account Activation');
        	$content = array();

        	array_push($content, 'Welcome to Dranix Distributors Inc. Website');
            array_push($content, 'Your Dranix Account info:');
            array_push($content, 'Username: ' . $this->data['User']['username']);
            array_push($content, 'Password: ' . $password);
            array_push($content, 'You may change your password after you login.');
            // array_push($content, 'To complete your registration to the Dranix Website please click on the link below');
            // array_push($content, '<a href="' . "http://hris.dranix.com.ph/users/accountActivation/?id=" . $this->User->getLastInsertID() . "&activation_code=" . $user['activation_key'] . '">Activate Your HRIS Account</a>');

            if (!$email->send($content)) {
                $this->Session->setFlash(__('Problem in sending email for new user'),'flash_notification');
				$this->redirect(array('action' => 'add'));
            }
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'),'flash_notification');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'),'flash_notification');
			}	
        }
    }

    public function recover() {
    if($this->Auth->loggedIn()) {
    	$this->redirect(array('action' => 'index'));
    }
    else {
		if ($this->request->is('post')) {
        	$recover = $this->User->find('first', array(
        		'conditions' => array(
        			'User.email' => $this->data['User']['recover_email']
        		)
        	));
        	if($recover) {
        		$password = substr(str_shuffle('zxcvbmnlkjhgfdsapoiuytrewq'),0,8);
        		$hashed = AuthComponent::password($password);
				$this->User->updateAll(
					array('User.password' => "'$hashed'"),
				    array('User.email' => $this->data['User']['recover_email'])
				);
	        	$email = new CakeEmail();
	        	$email->config('default');
	        	$email->template('default',null);
	        	$email->emailFormat(null);

	        	$email->from(array('itsupport@dranix.com.ph' => 'Dranix Distributors Website'));
	        	$email->to($this->data['User']['recover_email']);
	        	$email->subject('Account Recovery');
	        	$content = array();

	        	array_push($content, 'Welcome to Dranix Distributors Inc. Website');
	            array_push($content, 'Your Dranix Account info:');
	            array_push($content, 'Username: ' . $recover['User']['username']);
	            array_push($content, 'New Password: ' . $password);
	            array_push($content, 'You may change your password after you login.');
	            // array_push($content, 'To complete your registration to the Dranix Website please click on the link below');
	            // array_push($content, '<a href="' . "http://hris.dranix.com.ph/users/accountActivation/?id=" . $this->User->getLastInsertID() . "&activation_code=" . $user['activation_key'] . '">Activate Your HRIS Account</a>');

	            if (!$email->send($content)) {
	    			$this->Session->setFlash(__('Problem in sending email for new user'),'flash_notification');
	        	}
	        	$this->Session->setFlash(('Account recovery, successful. Please check your email.'),'flash_notification');
	    		$this->redirect('/');
        	}
        	else
        	{
        		$this->Session->setFlash(__('Account does not exist.'),'flash_notification');
        		$this->redirect('/users/recover');
        	}

			// if ($this->User->save($this->request->data)) {
			// 	$this->Session->setFlash(__('The user has been created'),'flash_notification');
			// 	$this->redirect(array('action' => 'index'));
			// } else {
			// 	$this->Session->setFlash(__('The user could not be created. Please, try again.'),'flash_notification');
			// }	
        }
    }

    }

	
    public function edit($id = null) {

	    if (!$id) {
			$this->Session->setFlash('Please provide a user id','flash_notification');
			$this->redirect(array('action'=>'index'));
		}

		$user = $this->User->findById($id);
		if (!$user) {
			$this->Session->setFlash('Invalid User ID Provided','flash_notification');
			$this->redirect(array('action'=>'index'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->User->id = $id;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been updated'),'flash_notification');
				$this->redirect(array('action' => 'edit', $id));
			}else{
				$this->Session->setFlash(__('Unable to update your user.'),'flash_notification');
			}
		}

		if (!$this->request->data) {
			$this->request->data = $user;
		}
    }

	public function changepass() {
		if($this->Auth->user('id')) {
			$this->User->id = $this->Auth->user('id');
			if(!$this->User->exists()) {
				throw new NotFoundException(__('Invalid User.'));
			}
			if($this->request->is(array('post','put'))) {
				if($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Password successfully changed.'),'flash_notification');
					$this->redirect(array('action' => 'logout'));
					$this->Session->setFlash(__('Please login with your new password.'),'flash_notification');
				}
				else {
					$this->Session->setFlash(__('Problem in changing password.'),'flash_notification');
				}
			}
		}
	}	

    public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id','flash_notification');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided','flash_notification');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'),'flash_notification');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'),'flash_notification');
        $this->redirect(array('action' => 'index'));
    }
	
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id','flash_notification');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided','flash_notification');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'),'flash_notification');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'),'flash_notification');
        $this->redirect(array('action' => 'index'));
    }

}

?>