<?php 
/**
* Api for Inquiry
*/
class InquiryController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	public $uses = array('Inquiry');
	public $scaffold;
	
	function index() {
		$this->autoRender = false;
		$inq = $this->Inquiry->find('all');
        $this->set(array(
            'inq' => $inq,
            '_serialize' => array('inq'),
			'_jsonp' => true
        ));
	}
	
	function add() {
		$this->autoRender = false;
		if($this->request->is('post')) {
			if ($this->Inquiry->save($this->request->data)) {
	            $inq = array(
	                'text' => __('Saved'),
	                'type' => 'success'
	            );
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