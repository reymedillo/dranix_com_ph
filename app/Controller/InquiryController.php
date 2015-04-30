<?php 
/**
* Api for Inquiry
*/
class InquiryController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	public $uses = array('Inquiry');
	
public function index() {
	$this->autoRender = false;
	$inq = $this->Inquiry->find('all');
	echo json_encode($inq);
}

}

?>