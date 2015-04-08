
<div class="container">
	<div class="col-md-12">
		<h3>News</h3>
		<hr/>
		<h4 class="lead"><?php echo $news['News']['title'];?></h4>
		<p><?php echo $news['News']['body'];?> </p>
		<small class="text-danger"><?php echo date("Y-m-d", strtotime($news['News']['created']));?></small>
		<small class="pull-right"><?php echo $this->Html->link('news',array('action'=>'index'),array('class'=>'text-danger'));?></small>
		<small class="pull-right"><?php echo $this->Html->link('home','/',array('class'=>'text-danger'));?>&nbsp;&nbsp;</small>
	</div>
	
</div>
<br/>
<br/>
<?php echo $this->element('partners'); ?>
<?php echo $this->element('footer'); ?>