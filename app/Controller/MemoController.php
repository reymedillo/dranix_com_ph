<?php 
class MemoController extends AppController {


public function post() {
	$this->loadModel('Department');

	$this->set('department', $this->Department->find('all', array('fields' => array('id', 'description'), 'order' => ['Department.id' => 'DESC'])));

	//post data
	if ($this->request->is('post')) {
		$this->Memo->create();
     // Initialize filename-variable
		$filename = null;
		$today = getdate();
		if (
			!empty($this->request->data['Memo']['upload']['tmp_name'])
			&& is_uploaded_file($this->request->data['Memo']['upload']['tmp_name'])
		) {
			// Strip path information
			$filename = substr(Security::generateAuthKey(),0,5);
			move_uploaded_file(
				$this->data['Memo']['upload']['tmp_name'],
				WWW_ROOT . 'files' . DS . $filename
			);
		}

		// Set the file-name only to save in the database
		$this->request->data['Memo']['upload'] = $filename;
		$this->request->data['Memo']['upload_dir'] = WWW_ROOT . 'files' . DS . $filename;

		if($this->Auth->user('role') != 'pawn') {
			if ($this->Memo->save($this->request->data)) {
				$this->Session->setFlash('Your memo has been saved.');
				$this->redirect('/');
			} else {
				$this->Session->setFlash('Unable to add your memo.');
			}
		}
		else {
			$this->Session->setFlash('You cannot add memo with your current permission.');
		}
	}	
}

public function index() {
	$this->loadModel('Memo');
	if($this->Auth->loggedIn()) {
		$memos = $this->Memo->find('all', array(
			'conditions' => [
				// 'DATE_FORMAT(Memo.created,"%m") = "'.date("m").'"',  //for filtering for current month
				'Memo.deptid' => array(0,$this->Auth->user('deptid'))
			],
			'order' => [
				'Memo.created' => 'DESC'
			]
		));
		$this->set('memo', $memos);
	}
	else {
		$this->Session->setFlash('You cannot access that page.');
		$this->redirect('/');
	}
}

public function view() {
	
}

}

?>