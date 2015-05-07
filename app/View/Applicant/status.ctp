<div class="container">
<hr/>
	<div class="col-md-7">
	<div class="panel panel-primary">
	  <div class="panel-heading">
		<h4><?php echo $career['Career']['title']; ?></h4>
	  </div>
	  <div class="panel-body">
		<table class="table table-condensed table-hover">
		<thead>
			<tr class="info">
				<td>Folder</td>
				<td>Resumes</td>
				<td>Auto-moved</td>
				<td>Avg Days in Folder</td>
				<td>Total Applications</td>
				<td></td>
			</tr>
		</thead>
	  	<tbody>
			<tr>
				<td>Unprocessed</td>
				<td><center><?php echo $career['Career']['unprocessed']; ?></center></td>
				<td><center>-</center></td>
			</tr>
			<tr>
				<td>Prescreened</td>
				<td><center><?php echo $career['Career']['prescreened']; ?></center></td>
			</tr>
			<tr>
				<td>Shortlisted</td>
				<td><center><?php echo $career['Career']['shortlisted']; ?></center></td>
			</tr>
			<tr>
				<td>Hired</td>
				<td><center><?php echo $career['Career']['hired']; ?></center></td>
			</tr>
			<tr>
				<td>Kept for Reference</td>
				<td><center><?php echo $career['Career']['keptfor']; ?></center></td>
			</tr>
			<tr>
				<td>Rejected</td>
				<td><center><?php echo $career['Career']['rejected']; ?></center></td>
			</tr>
		</tbody> 
		</table>
	  </div>
	</div>
	</div>
</div>

<?php echo $this->element('footer'); ?>