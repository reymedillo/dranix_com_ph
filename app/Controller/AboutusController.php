<?php

class AboutusController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('mvv','ar','history','outreach');
	}
	
	public function index(){
	
	}
	
	public function history(){
		
	}
	
	public function mvv(){
		
	}
	
	public function ar(){
		
	}
	
	public function outreach(){
		
	}
	
}

?>