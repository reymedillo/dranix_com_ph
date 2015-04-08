<div class="container">
	<div class="col-md-12">
		<br/>
		<center><img style="width:100%;" src="<?php echo Router::url('/', true).'img/news.png'; ?>"/></center>
		<h3>News</h3>
		<hr/>
		<?php foreach($news as $new): ?>
			<div class="col-md-6">
				<div class="panel panel-danger">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $new['News']['title'];?></h3>
				  </div>
				  <div class="panel-body">
					<div class="p_details">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $new['News']['body'];?> </p>
					</div>
					<small class="pull-right" ><?php echo date("Y-m-d", strtotime($new['News']['created']));?></small>
				  </div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	
	<div class="col-md-12">
		<h3>Events</h3>
		<hr/>
		<?php foreach($events as $event): ?>
			<div class="col-md-6">
				<div class="panel panel-info">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $event['Events']['title'];?></h3>
				  </div>
				  <div class="panel-body">
					<div class="p_details">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $event['Events']['body'];?> </p>
					</div>
					<small class="pull-right" ><?php echo date("Y-m-d", strtotime($event['Events']['created']));?></small>
				  </div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php echo $this->element('footer'); ?>
