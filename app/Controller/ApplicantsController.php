<?php

class ApplicantsController extends AppController {
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('apply');
	}

	public function index() {
	}

	public function folders($id = null) {
		$this->loadModel('Career');

		$career = $this->Career->findById($id);
	
		if($career) {
		$this->set(compact('career',$career));
		}
		else {
			$this->Session->setFlash('Invalid', 'flash_notification');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function view($position = null,$status = null) {
		$this->loadModel('Career');
		$this->loadModel('Applicant');
		$this->loadModel('ApplicantStatus');

		$career_name = $this->Career->findById($position);
		$status_name = $this->ApplicantStatus->findById($status);

		$applicant = $this->Applicant->find('all', array(
			'conditions' => array(
				'Applicant.job_title' => $career_name['Career']['title'],
				'Applicant.statusid' => $status
			)
		));
		if($this->request->is(array('post'))) {
			for($i=0;$i<count($this->data['Applicant']['id']);$i++) {
				$status = 2;
				$this->Applicant->updateAll(
					array('Applicant.statusid' => "'$status'"),
				    array('Applicant.id' => $this->data['Applicant']['id'][$i]) // << conditions
				);
			}
			$this->redirect(array('action' => 'index'));
		}
		else {
			if(!$career_name || !$status_name) {
				$this->Session->setFlash('Invalid URL parameters', 'flash_notification');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->set(compact('applicant',$applicant));
				$this->set(compact('career', $career_name));
			}
		}
	}
	public function apply($id=null){
		$this->loadModel('Career');
		// echo $id;
		$career = $this->Career->findById($id);
		$this->set(compact('career'));
		
		//post data
		if ($this->request->is('post')) {
			$this->Applicant->create();
           // Initialize filename-variable
			$filename = null;
			$today = getdate();
			if (
				!empty($this->request->data['Applicant']['upload']['tmp_name'])
				&& is_uploaded_file($this->request->data['Applicant']['upload']['tmp_name'])
			) {
				// Strip path information
				$filename = substr(Security::generateAuthKey(),0,5).'_'.basename();
				move_uploaded_file(
					$this->data['Applicant']['upload']['tmp_name'],
					WWW_ROOT . 'files' . DS . $filename
				);
			}

			// Set the file-name only to save in the database
			$this->request->data['Applicant']['upload'] = $filename;
			$this->request->data['Applicant']['upload_dir'] = WWW_ROOT . 'files' . DS . $filename;


			if ($this->Applicant->save($this->request->data)) {
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect('/');
			} else {
				$this->Session->setFlash('Unable to add your post.');
			}
		}
    }
    public function job($id=null)
	{
		$this->loadModel('Applicant');
		$applicants = $this->Applicant->find('all' ,array(
			'conditions' => array(
				'Applicant.career_id' => $id			
			)
		));
		
		$this->set('applicant', $applicants);
		return json_encode(Set::extract('/Applicant/.', $applicants));
	}
}
?>