<?php 
class CartsController extends AppController {

public function index() {
	$this->autoRender = false;
	$this->loadModel('Cart');
	$carts = $this->Cart->find('all');
	return json_encode(Set::extract('/Cart/.',$carts));
}

public function add() {
	$this->autoRender = false;
	$this->loadModel('Cart');
	if($this->request->is('post')) {
		// $this->request->data['Cart']['itemId'] = $this->data['Cart']['itemId'];
		// $this->request->data['Cart']['qty'] = 1;
		// $this->request->data['Cart']['price'] = $this->data['Cart']['price'];
		// $this->request->data['Cart']['total'] = $this->data['Cart']['total'];
		// $this->request->data['Cart']['session'] = CakeSession::read('Config.userAgent');
		if($this->Cart->save($this->request->data,false)) {
			$c = array('text' => __('Saved'), 'type' => 'success');
			$this->redirect('/');
		}
		else {
			$c = array('text' => __('Error'), 'type' => 'error');
		}
		$this->set(array('c' => $c, '_serialize' => array('c'), '_jsonp' => true));
	}
}

}
?>