<?php 
class UomController extends AppController {

public function beforeFilter() {
    $this->Auth->allow('index','view');
}

public function index() {
	$this->autoRender = false;
	echo 'asdfadsf';
}
public function view($id,$uom) {
	$this->autoRender = false;
	$this->loadModel('Uom');

	$item = $this->Uom->find('all', array(
		'conditions' => array(
			'Uom.itemId' => $id,
			'Uom.uomName' => $uom
		)
	));
	return json_encode(Set::extract('/Uom/.',$item));
}

}

?>