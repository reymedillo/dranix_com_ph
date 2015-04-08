<?php

class CareerController extends AppController {
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('apply');
	}

    public function index(){
		$careers = $this->Career->find('all');
		$this->set(compact('careers'));
      }
	  
	public function apply(){
	
      }
	  
	public function post(){
		 if ($this->request->is('post')) {
			$this->Career->create();
           // Initialize filename-variable
			$filename = null;

			if (
				!empty($this->request->data['Career']['upload']['tmp_name'])
				&& is_uploaded_file($this->request->data['Career']['upload']['tmp_name'])
			) {
				// Strip path information
				$filename = basename($this->request->data['Career']['upload']['name']); 
				move_uploaded_file(
					$this->data['Career']['upload']['tmp_name'],
					WWW_ROOT . 'files' . DS . $filename
				);
			}

			// Set the file-name only to save in the database
			$this->request->data['Career']['upload'] = $filename;
			$this->request->data['Career']['upload_dir'] = WWW_ROOT . 'files' . DS . $filename;


        if ($this->Career->save($this->request->data)) {
            $this->Session->setFlash('Your post has been saved.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Unable to add your post.');
        }
     }
      }
}
?>