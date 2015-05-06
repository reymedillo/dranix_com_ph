<?php 
/**
* Api for Inquiry
*/
class InquiryController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	
	function index() {
		$this->loadModel('User');
		$this->autoRender = false;
		$inquiry = $this->Inquiry->find('all');
		$this->set('inquiry', $inquiry);
		$this->set('_serialize', array('inquiry'));

		return json_encode(Set::extract('/Inquiry/.', $inquiry));
	}
	
	function add() {
		$this->autoRender = false;
		if($this->request->is('post')) {
			if ($this->Inquiry->save($this->request->data)) {
	            $inq = array(
	                'text' => __('Saved'),
	                'type' => 'success'
	            );
	           		$this->redirect('/');
	        } else {
	            $inq = array(
	                'text' => __('Error'),
	                'type' => 'error'
	            );
	        }
	        $this->set(array(
	            'inq' => $inq,
	            '_serialize' => array('inq'),
				'_jsonp' => true
	        ));
		}
	}

}

?>