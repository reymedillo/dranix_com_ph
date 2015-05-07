<?php
//App::uses('AuthComponent', 'Controller/Component');

class Career extends AppModel {
	public $virtualFields = array(
		'unprocessed' => 'select count(statusid) from applicants where job_title = career.title and statusid=1',
		'total' => 'select count(id) from applicants where job_title = career.title'
	);
}

?>