<div class="container">
<hr/>
	<div class="col-md-9">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">Applicants</h3>
		  </div>
		  <div class="panel-body">
			<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
					<td>Contact Number</td>
					<td>Submitted On</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($applicant as $applicants): ?>
				<tr>
				  <td><?php echo $applicants['Applicant']['name']; ?></td>
				  <td><?php echo $applicants['Applicant']['email']; ?></td>
				  <td><?php echo $applicants['Applicant']['contactno']; ?></td>
				  <td><?php 
				  $date = new DateTime($applicants['Applicant']['created']);
				  echo $date->format('m-d-Y'); 
				  ?></td>
				  <td><a href="<?php echo Router::url('/', false).'files/'.$applicants['Applicant']['upload'];?>">Download Resume</a></td>
 				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>
	</div>
</div>
<?php echo $this->element('footer'); ?>