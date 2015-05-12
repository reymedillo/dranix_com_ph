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
				<td><a href="/applicants/view/<?php echo $career['Career']['id']; ?>/1">Unprocessed</a></td>
				<td><center><?php echo $career['Career']['unprocessed']; ?></center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
				<td><center><?php echo $career['Career']['total']; ?></center></td>
			</tr>
			<tr>
				<td><a href="/applicants/view/<?php echo $career['Career']['id']; ?>/2">Prescreened</a></td>
				<td><center><?php echo $career['Career']['prescreened']; ?></center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
			</tr>
			<tr>
				<td><a href="/applicants/view/<?php echo $career['Career']['id']; ?>/3">Shortlisted</a></td>
				<td><center><?php echo $career['Career']['shortlisted']; ?></center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
			</tr>
			<tr>
				<td><a href="/applicants/view/<?php echo $career['Career']['id']; ?>/4">Hired</a></td>
				<td><center><?php echo $career['Career']['hired']; ?></center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
			</tr>
			<tr>
				<td><a href="/applicants/view/<?php echo $career['Career']['id']; ?>/5">Kept for Reference</a></td>
				<td><center><?php echo $career['Career']['keptfor']; ?></center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
			</tr>
			<tr>
				<td><a href="/applicants/view/<?php echo $career['Career']['id']; ?>/6">Rejected</a></td>
				<td><center><?php echo $career['Career']['rejected']; ?></center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
				<td><center>-</center></td>
			</tr>

		</tbody> 
		</table>
	  </div>
	</div>
	</div>
</div>

<?php echo $this->element('footer'); ?>