<?php 
/**
* Api for Rapplicant
*/
class RapplicantController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	
	function index() {
		$this->loadModel('Career');
		$this->autoRender = false;
		$career = $this->Career->find('all');

		 return json_encode(Set::extract('/Career/.', $career));
	}
	
	// function add() {
	// 	$this->autoRender = false;
	// 	if($this->request->is('post')) {
	// 		if ($this->Inquiry->save($this->request->data)) {
	//             $inq = array(
	//                 'text' => __('Saved'),
	//                 'type' => 'success'
	//             );
	//            		$this->redirect('/');
	//         } else {
	//             $inq = array(
	//                 'text' => __('Error'),
	//                 'type' => 'error'
	//             );
	//         }
	//         $this->set(array(
	//             'inq' => $inq,
	//             '_serialize' => array('inq'),
	// 			'_jsonp' => true
	//         ));
	// 	}
	// }

	function edit($id = null) {
		$applicant = $this->Applicant->findById($id);
		if($applicant) {
			if($this->request->is('put')) {
				$status = $this->data['Applicant']['statusid'];
				$this->Applicant->updateAll(array(
					array('Applicant.statusid' => "'$status'" ),
					array('Applicant.id' => $id)
				));
			}
		}
	}
}

?>