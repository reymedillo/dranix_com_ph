<?php 
/* API for products */

class ProductsController extends AppController {

public function index() {
	$this->autoRender = false;

	$this->loadModel('Product');
	$products = $this->Product->find('all');
	return json_encode(Set::extract('/Product/.', $products));
}

}
?>