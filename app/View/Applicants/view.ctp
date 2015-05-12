<div class="container">
<hr/>
	<div class="col-md-9">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">Applicants</h3>
		  </div>
		  <div class="panel-body">
		  	<?php if(count($applicant) == 0): ?>
		  		<center>No records found.</center>
			<?php else: ?>
			<table class="table table-condensed table-hover">
			<?php echo $this->Form->create('Applicant',array('action' => 'view', 'id' => 'FrmApplicant')); ?>
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Submitted</th>
					<th>
						<div class="btn-group">
						    <a href="#" class="btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="true">Action  <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu">
						        <li><a href="" onclick="document.getElementById('FrmApplicant').submit();">Prescreen</a></li>
						        <li><a href="" onclick="document.getElementById('FrmApplicant').submit();">Shortlist</a></li>
						        <li><a href="" onclick="document.getElementById('FrmApplicant').submit();">Hired</a></li>
						        <li><a href="" onclick="document.getElementById('FrmApplicant').submit();">Keep for Reference</a></li>
						        <li><a href="" onclick="document.getElementById('FrmApplicant').submit();">Reject</a></li>
						    </ul>
						</div>
				    </th>
				</tr>
			</thead>
			<tbody>
	 			<?php foreach($applicant as $applicants): ?>
				<tr>
				  <td><?php echo $applicants['Applicant']['name']; ?>
				 	<input type="text" name="data[Applicant][id][]" value="<?php echo $applicants['Applicant']['id']; ?>">
				  </td>
				  <td><?php echo $applicants['Applicant']['email']; ?></td>
				  <td><?php echo $applicants['Applicant']['contactno']; ?></td>
				  <td><?php 
				  $date = new DateTime($applicants['Applicant']['created']);
				  echo $date->format('m-d-Y'); 
				  ?></td>
				  <td>
				  	<input type="checkbox">
				  </td>
 				</tr>
				<?php endforeach; ?>
			</tbody>
			<?php echo $this->Form->end(); ?>
			</table>
			<?php endif; ?>
		  </div>
		</div>
	</div>
</div>
<?php echo $this->element('footer'); ?>