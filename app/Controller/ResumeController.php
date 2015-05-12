<?php 
/**
* Api for Resume
*/
class ResumeController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	
	function index() {
		$this->autoRender = false;

		$this->loadModel('Career');
		$this->loadModel('Applicant');
		$this->loadModel('ApplicantStatus');

		$career_name = $this->Career->findById($position);
		$status_name = $this->ApplicantStatus->findById($status);

		$resume = $this->Applicant->find('all', array(
			'conditions' => array(
				'Applicant.job_title' => $career_name['Career']['title'],
				'Applicant.statusid' => $status
			)
		));

		return json_encode(Set::extract('/Applicant/.', $resume));
	}
	
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
	function view($id) {
		$this->autoRender = false;

	}
}

?>