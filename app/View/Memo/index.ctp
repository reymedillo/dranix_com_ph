<div class="container">
	<br/>
	<div class="col-md-9">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">Memo</h3>
		  </div>
		  <div class="panel-body">
			<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<td>Title</td>
					<td>Description</td>
					<td>Created On</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($memo as $memos): ?>
				<tr>
				  <td><?php echo $memos['Memo']['subject']; ?></td>
				  <td><?php echo $memos['Memo']['description']; ?></td>
				  <td><?php 
				  $date = new DateTime($memos['Memo']['created']);
				  echo $date->format('m-d-Y'); 
				  ?></td>
				  <td><a data-toggle="modal" href="#memoModal">View Memo</a>
					<div class="modal" id="memoModal" class="modal fade in">
					  <div class="modal-dialog">
					    <div class="panel panel-danger">
					      <div class="panel-heading">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					        <h4 class="panel-title"><?php echo $memos['Memo']['subject']; ?></h4>
					      </div>
					      <div class="panel-body">
					        <figure>
								 <img src="<?php echo Router::url('/', false).'files/'.$memos['Memo']['upload'];?>" alt="Smiley face" height="800" width="550" /> 
							</figure>
					      </div>
					    </div>
					  </div>
					</div>
				  </td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>
	</div>
</div>

<?php echo $this->element('footer'); ?>
