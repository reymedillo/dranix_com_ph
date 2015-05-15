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
			<?php echo $this->Form->create('Applicant',array('action' => 'view', 'id' => 'FrmApplicant','method' => 'post')); ?>
			<input type="hidden" name="data[Applicant][pass1]" value="<?php echo $this->request->params['pass'][0]; ?>">
			<input type="hidden" name="data[Applicant][pass2]" value="<?php echo $this->request->params['pass'][1]; ?>">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Submitted</th>
					<th></th>
				</tr>
				<tr>
					<button class="btn btn-default btn-xs pull-right" type="submit" name="btn[]" value="4"><i class="fa fa-floppy-o"></i> Keep for Reference</button>
					<button class="btn btn-default btn-xs pull-right" type="submit" name="btn[]" value="3"><i class="fa fa-list-ul"></i> Shortlist</button>
					<button class="btn btn-default btn-xs pull-right" type="submit" name="btn[]" value="2"><i class="fa fa-eye"></i> Prescreen</button>
					<button class="btn btn-default btn-xs pull-right" type="submit" name="btn[]" value="4"><i class="fa fa-close"></i> Reject</button>
					<button class="btn btn-default btn-xs pull-right" type="submit" name="btn[]" value="4"><i class="fa fa-check"></i> Hire</button>
				</tr>
			</thead>
			<tbody>
			<fieldset>
	 			<?php foreach($applicant as $applicants): ?>
				<tr>
				  <td><?php echo $applicants['Applicant']['name']; ?>
				 	<input type="hidden" name="data[Applicant][id][]" value="<?php echo $applicants['Applicant']['id']; ?>">
				  </td>
				  <td><?php echo $applicants['Applicant']['email']; ?></td>
				  <td><?php echo $applicants['Applicant']['contactno']; ?></td>
				  <td><?php 
				  $date = new DateTime($applicants['Applicant']['created']);
				  echo $date->format('m-d-Y'); 
				  ?></td>
				  <td>
				  	<input name="checkbox[]" required type="checkbox" id="checkbox[]" value="<?php echo $applicants['Applicant']['id']; ?>">
				  </td>
 				</tr>
				<?php endforeach; ?>
				</fieldset>
			</tbody>
			<?php echo $this->Form->end(); ?>
			</table>
			<?php endif; ?>
		  </div>
		</div>
	</div>
</div>
<?php echo $this->element('footer'); ?>