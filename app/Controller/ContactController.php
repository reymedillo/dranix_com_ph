<?php

class ContactController extends AppController {

    function index(){
		$this->loadModel('Branches');
		$branches = $this->Branches->find('all');
		$this->set(compact('branches'));
      }
}
?>