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
				  <td><!-- <a class="fancy" href="<?php echo Router::url('/', false).'files/'.$memos['Memo']['upload'];?>">View Memo</a> -->
				  <a href="<?php echo Router::url('/', false).'files/'.$memos['Memo']['upload'];?>" class="fancy"><img src="<?php echo Router::url('/', false).'files/'.$memos['Memo']['upload'];?>" width="50" height="40"></a>
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
