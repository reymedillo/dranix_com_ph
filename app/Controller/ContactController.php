<?php

class ContactController extends AppController {

    public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('inquiry');
    }

	function index(){
		$this->loadModel('Branches');
		$branches = $this->Branches->find('all');
		$this->set(compact('branches'));
	}

	function inquiry() {

	}
}
?>