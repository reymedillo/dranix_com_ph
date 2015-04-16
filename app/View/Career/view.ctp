<div class="container">
	<div class="col-md-12">
		<br/>
		<center><img style="width:100%;" src="<?php echo Router::url('/', true).'img/careers.png'; ?>"/></center>
		<h3>Careers</h3>
		<hr/>
		<?php foreach($careers as $career): ?>
			<div class="col-md-6">
				<div class="panel panel-info">
				  <div class="panel-heading">
					<h3 class="panel-title" style="font-weight:bold;"><?php echo $career['Career']['title'];?></h3>
				  </div>
				  <div class="panel-body">
					<div class="p_details">
						<?php echo $career['Career']['body']; ?>
						<!--<iframe width='100%' height='100%' src="<?php echo Router::url('/', true).'files/'.$career['Career']['upload'];?>" frameborder='0'></iframe>-->
<!-- 						<embed src="<?php echo Router::url('/', true).'files/'.$career['Career']['upload'];?>" width="100%" height="100%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep.html"> -->
					</div>
					<?php if($loggedIn): ?>
					/ 
					<small><?php echo $this->Html->link('Applicants', array('controller' => 'Applicant', 'action' => 'job', $career['Career']['id'])); ?></small>
					<?php elseif(!$loggedIn): ?>
					<small><?php echo $this->Html->link('Get the job!',array('controller'=>'Applicant','action'=>'apply',$career['Career']['id'])) ?></small>
					<?php endif; ?>
					<small class="pull-right" ><?php echo date("Y-m-d", strtotime($career['Career']['created']));?></small>
				  </div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php echo $this->element('footer'); ?>
