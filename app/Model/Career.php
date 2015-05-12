<?php

class Career extends AppModel {
	public $virtualFields = array(
		'unprocessed' => 'select count(statusid) from applicants where job_title = career.title and statusid=1',
		'prescreened' => 'select count(statusid) from applicants where job_title = career.title and statusid=2',
		'shortlisted' => 'select count(statusid) from applicants where job_title = career.title and statusid=3',
		'hired' => 'select count(statusid) from applicants where job_title = career.title and statusid=4',
		'keptfor' => 'select count(statusid) from applicants where job_title = career.title and statusid=5',
		'rejected' => 'select count(statusid) from applicants where job_title = career.title and statusid=6',
		'total' => 'select count(id) from applicants where job_title = career.title'
	);

	// public $hasOne = 'Applicant';
}

?>