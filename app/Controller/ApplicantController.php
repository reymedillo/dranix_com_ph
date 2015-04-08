<?php

class ApplicantController extends AppController {
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('apply');
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
				$filename = substr(Security::generateAuthKey(),0,5).'_'.basename($this->request->data['Applicant']['upload']['name']);
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
	}
	// public function view($id=null) {
	// 	$this->loadModel('Applicant');
	// 	$person = $this->Applicant->find('first', array(
	// 		'conditions' => array(
	// 			'Applicant.id' => $id
	// 		)
	// 	));
	// 	$this->set('person', $person);
	// }
}
?>