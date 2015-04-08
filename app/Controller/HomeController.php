<?php

class HomeController extends AppController {
	public $helpers = array('GoogleMap');
	
	public function index(){
		$this->loadModel('News');

		$news = $this->News->find('all', array('limit'=>'2'));
		$this->set(compact('news'));
	}
	
}

?>