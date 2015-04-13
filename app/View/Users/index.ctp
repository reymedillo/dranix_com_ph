<div class="container">
	<h3>Dashboard</h3>
	<hr/>
	<div class="col-md-3">
	<?php if($current_user['role'] == 'pawn'): ?>
	<?php else: ?>
		<?php echo $this->Html->link('POST A MEMO', ['controller' => 'memo', 'action' => 'post'], ['class' => 'btn btn-info form-control']); ?>
		<br/>
		<br/>
		<?php echo $this->Html->link('POST A NEWS',array('controller'=>'news','action'=>'post'), array('class'=>'btn btn-info form-control'));?>
		<br/>
		<br/>
		<?php echo $this->Html->link('POST A CAREER',array('controller'=>'career','action'=>'post'), array('class'=>'btn btn-primary form-control'));?>
		<br/>
		<br/>
		<?php echo $this->Html->link('POST AN EVENT',array('controller'=>'news','action'=>'post'), array('class'=>'btn btn-success form-control'));?>
	<?php endif; ?>
	</div>
	<div class="col-md-9">
		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3 class="panel-title">Top 5 news</h3>
		  </div>
		  <div class="panel-body">
			<table class="table table-condensed table-hover">
			<tbody>
				<?php $x=1; foreach($news as $new): ?>
				<tr>
				  <td><?php echo $x++; ?></td>
				  <td><?php echo $new['News']['title']; ?></td>
				  <td><?php echo substr($new['News']['body'],0,500); ?></td>
				  <td><?php echo $new['News']['created']; ?></td>
				  <td><?php echo $this->Html->link('view',array('controller'=>'News','action'=>'view',$new['News']['id'])) ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>

		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">Top latest 5 careers</h3>
		  </div>
		  <div class="panel-body">
			<table class="table table-condensed table-hover">
			<tbody>
				<?php $x=1; foreach($careers as $career): ?>
				<tr>
				  <td><?php echo $x++; ?></td>
				  <td><?php echo $career['Careers']['title']; ?></td>
				  <td><?php echo $career['Careers']['division']; ?></td>
				  <td><?php echo $career['Careers']['upload']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>

		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">Top 5 new events</h3>
		  </div>
		  <div class="panel-body">
			<table class="table table-condensed table-hover">
			<tbody>
				<?php $x=1; foreach($events as $event): ?>
				<tr>
				  <td><?php echo $x++; ?></td>
				  <td><?php echo $event['Events']['title']; ?></td>
				  <td><?php echo substr($event['Events']['body'],0,500); ?></td>
				  <td><?php echo $event['Events']['created']; ?></td>
				  <td><?php echo $this->Html->link('view',array('controller'=>'news','action'=>'view',$event['Events']['id'])) ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>
		<div class="panel panel-danger">
		  <div class="panel-heading">
			<h3 class="panel-title">Who contaced us!</h3>
		  </div>
		  <div class="panel-body">
			<table class="table table-condensed table-hover">
			<tbody>
				<?php $x=1; foreach($contacts as $contact): ?>
				<tr>
				  <td><?php echo $x++; ?></td>
				  <td><?php echo $contact['Contacts']['title']; ?></td>
				  <td><?php echo substr($contact['Contacts']['body'],0,500); ?></td>
				  <td><?php echo $contact['Contacts']['created']; ?></td>
				  <td><?php echo $this->Html->link('view',array('controller'=>'contacts','action'=>'view',$contact['Contacts']['id'])) ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>
	</div>
</div>
<?php echo $this->element('footer'); ?>