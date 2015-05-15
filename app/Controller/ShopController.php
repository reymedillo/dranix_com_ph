<?php 
class ShopController extends AppController {

public function index() {
	$this->loadModel('Product');
	$this->loadModel('Cart');
	$products = $this->Product->find('all');
	$this->set('products',$products);

	if($this->request->is('post')) {
		if ($this->Cart->save($this->data)) {
			$this->Session->setFlash(__('cart add'),'flash_notification');
			$this->redirect(array('action' => 'index'));
		}
	}
}

}
?>