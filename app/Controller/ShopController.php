<?php
// App::uses('CakeEmail', 'Network/Email');

class ShopController extends AppController {

public function index() {
	$this->loadModel('Product');
	$this->loadModel('Cart');
	$this->loadModel('orderDetail');
	$this->loadModel('Order');

	$products = $this->Product->find('all');
	$this->set('products',$products);

	if($this->request->is('post')) {
		if($this->Auth->loggedIn()) {
			if($this->Auth->user('role') == 'Admin') {
				// Sending email
				$email = new CakeEmail();
	        	$email->config('default');
	        	$email->template('default',null);
	        	$email->emailFormat(null);
	        	$email->from(array('itsupport@dranix.com.ph' => 'Dranix Distributors Website'));
	        	$email->to('rmmedillo@dranix.com.ph');
	        	$email->subject('Orders for Luminarc from '.$this->Auth->user('name'));
        		$content = array();
        		array_push($content, 'To whom it may concern:');
        		array_push($content, '');
        		array_push($content, '');
        		array_push($content, 'I would like to order the following item:');
        		array_push($content, '');

        		// Order Header
        		$this->Order->create();
        		$this->request->data['Order']['name'] = $this->Auth->user('name');
        		$this->request->data['Order']['email'] = $this->Auth->user('email');
        		if($this->Order->save($this->request->data)) {
	        		// Order Detail
	        		for($i=0;$i<count($_POST['orderDetail']['itemId']);$i++) {
						$detail = array(
							'orderId' => $this->Order->getInsertId(),
							'itemId' => $_POST['orderDetail']['itemId'][$i],
							'qty' => $_POST['orderDetail']['qty'][$i],
							'price' => $_POST['orderDetail']['price'][$i],
							'total' => $_POST['orderDetail']['total'][$i]
						);
						array_push($content, $i.'. '.$_POST['orderDetail']['cartName'][$i].'     Qty:'.$_POST['orderDetail']['qty'][$i].'     Price:'.$_POST['orderDetail']['price'][$i].'     Total:'.$_POST['orderDetail']['total'][$i]);
						$this->orderDetail->create();
						$this->orderDetail->save($detail);
						$this->Cart->delete($_POST['orderDetail']['cartId']);
					}
					array_push($content, 'Total Amount:  Php'.$this->request->data['Order']['total']);
					array_push($content, '');
					array_push($content, '');
					array_push($content, '');
					array_push($content, 'Regards,');
					array_push($content, $this->Auth->user('name'));
		            if (!$email->send($content)) {
		                $this->Session->setFlash(__('Problem in sending email for your order.'),'flash_notification');
						$this->redirect(array('action' => 'index'));
		            }
					$this->Session->setFlash(__('Cart successfully checked out. An email has been sent. Thank you.'),'flash_notification');
					$this->redirect(array('action' => 'index'));
				}
			}
			else {
				$this->Session->setFlash(__('Only allowed users can checkout items.'),'flash_notification');
				$this->redirect(array('action' => 'index'));
			}
		}
		else {
			$this->Session->setFlash(__('You must be logged in to check out items.'),'flash_notification');
			$this->redirect(array('action' => 'index'));
		}
	}
}

}
?>