<div class="container">
	<div class="col-md-12">
		<h3>Apply for this job</h3>
		<hr/>
		<br/>
		<div class="col-md-6">
			<div class="alert alert-dismissable alert-info">
				<h4>I'll get this job.</h4>
				<hr/>
				<?php 
					echo $this->Form->create('Career',array('type' => 'file'));
					echo $this->Form->input('name', array('class'=>'form-control'));
					echo $this->Form->input('email', array('class'=>'form-control'));
					echo $this->Form->input('job title', array('class'=>'form-control'));
					echo $this->Form->input('send your resume', array('type'=>'file','class'=>'form-control'));
					echo '<br/>';
					echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
					echo $this->Form->end();
				?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="alert alert-dismissable alert-success">
				<h4>Connect to us</h4>
				<hr/>
				<br/>
				<center><h1><i class="fa fa-weixin fa-3x"></i></h1></center>
				<center><h1>SOON TO SERVE</h1></center>
				<br/>
				<br/>
				<br/>
				<br/>
			</div>
		</div>
		
	</div>
	<br/>
		<br/>
		<br/>
		<br/>
</div>
<?php echo $this->element('footer'); ?>