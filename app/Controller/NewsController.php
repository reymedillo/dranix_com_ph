<?php

class NewsController extends AppController {
	
	public function index(){
		$this->loadModel('News');
		$this->loadModel('Events');
	
		$news = $this->News->find('all', array('limit'=>'4','order'=>'created DESC'));
		$this->set(compact('news'));
		
		$events = $this->Events->find('all', array('limit'=>'4','order'=>'created DESC'));
		$this->set(compact('events'));
	}
	
	function post(){
		 if ($this->request->is('post')) {
			$this->News->create();
		
			if($this->request->data){
				if ($this->News->save($this->request->data)) {
					$this->Session->setFlash('Your post has been saved.');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Unable to add your post.');
				}
			}
		 }
    }
	
	function view($id){
		 
		 if ($id) {
			$news = $this->News->findById($id);
			if($news){
				$this->set(compact('news'));
			}else{
				$this->redirect(array('action' => 'index'));
			}
		 }
		 else{
			$this->redirect(array('action' => 'index'));
		 }
    }
	
}

?>