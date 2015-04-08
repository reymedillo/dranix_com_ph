<br/>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
	<br/>
	<div class="panel panel-danger">
	  <div class="panel-heading">
		<h3 class="panel-title">HR LOGIN ACCESS</h3>
	  </div>
	  <div class="panel-body">
		<br/>
		<div class="users form">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User'); ?>
		<?php 
			echo $this->Form->input('username',array('class'=>'form-control'));
			echo $this->Form->input('password',array('class'=>'form-control'));
		?>
		<br/>	
		<?php echo $this->Form->end(__('Login')); ?>	
		</div>
		<?php
		 //echo $this->Html->link( "Add A New User",   array('action'=>'add') ); 
		?>
		<br/>
	  </div>
	</div>
</div>
</div>
<br/>
<br/>
<?php echo $this->element('partners'); ?>
<?php echo $this->element('footer'); ?>