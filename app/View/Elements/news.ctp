
	<div style="margin-bottom:0px;" class="alert alert-dismissable alert-danger" >
		<br/>
		<div class="container">
			<div class="col-md-6">
			<h3>News</h3>
			<hr/>
				<?php foreach($news as $post): ?>
					<div class="col-md-6">
						<h5><?php echo $post['News']['title'];?></h5>
						<p><?php echo substr($post['News']['body'], 0, 310);?> </p>
						<small><?php echo date("Y-m-d", strtotime($post['News']['created']));?></small>
						<small class="pull-right events"><?php echo $this->Html->link('read more...', array('controller'=>'event','action'=>'view','tag'=>$post['News']['id']));?></small>
					</div>
				<?php endforeach;?>
			</div>
			<div class="col-md-3">
				<h3>Social</h3>
				<hr/>
				<h5><i class="fa fa-facebook fa-lg"></i> &nbsp;&nbsp;&nbsp;Facebook</h5>
				<h5><i class="fa fa-twitter fa-lg"></i> &nbsp;Twitter</h5>
			</div>
		</div>
		<br/>
		<br/>
	</div>