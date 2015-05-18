<?php 
class CartsController extends AppController {

public function beforeFilter() {
    $this->Auth->allow('index','add','edit');
}

public function index() {
	$this->autoRender = false;
	$this->loadModel('Cart');
	$session = $this->Cart->find('all', array(
			'conditions' => array(
				'Cart.session' => CakeSession::read('Config.userAgent')
			)
	));
	if($session) {
		return json_encode(Set::extract('/Cart/.',$session));
	}
}

public function add() {
	$this->autoRender = false;
	$this->loadModel('Cart');
	if($this->request->is('post')) {
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

public function edit($id) {
	$this->autoRender = false;
	$this->loadModel('Cart');
    $this->Cart->id = $id;
    if ($this->Cart->save($this->request->data)) {
        $message = array(
            'text' => __('Saved'),
            'type' => 'success'
        );
    } else {
        $message = array(
            'text' => __('Error'),
            'type' => 'error'
        );
    }
    $this->set(array(
        'message' => $message,
        '_serialize' => array('message')
    ));
}

}
?>