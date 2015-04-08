<?php

class BranchesController extends AppController {
	public $helpers = array('GoogleMap');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view');
	}
	
	public function index($id=null){
		$this->loadModel('Branches');
		if($id!=null){
			$branches = $this->Branches->find('all');
			$this->set(compact('branches'));
			
			$branch = $this->Branches->findById($id);
			$this->set(compact('branch'));
			
			$id = $id;
			$this->set(compact('id'));
		}else{
			$branches = $this->Branches->find('all');
			$this->set(compact('branches'));
			
			$id = $id;
			$this->set(compact('id'));
		}
	}
	
	public function view($size=null){
		$this->layout='blank';
		$this->loadModel('Branches');
		$this->set(compact('size'));
	}
}

?>