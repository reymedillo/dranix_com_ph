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
					echo $this->Form->create('Applicant',array('type' => 'file'));
					echo $this->Form->input('name', array('class'=>'form-control', 'required' => true));
					echo $this->Form->input('email', array('class'=>'form-control', 'type' => 'email','required' => true));
					echo $this->Form->input('contactno', array('class' => 'form-control', 'label' => 'Contact Number','required' => true,'pattern' => '(\+?\d[- .]*){7,13}'));
					echo $this->Form->input('job_title', array('class'=>'form-control','value' => $career['Career']['title'], 'readonly' => true));
					echo $this->Form->input('career_id', array('type' => 'hidden', 'value' => $career['Career']['id']));
				?>
				<br>
				<h5>Upload Resume</h5>
				<?php
					echo $this->Form->input('upload', array('type' => 'file', 'label' => 'Resume','required' => true, 'accept' => 'application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'));
					echo $this->Form->input('upload_dir', array('type' => 'hidden', 'value' => 'Post','required' => true));
					echo '<br/>';
					echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
					echo $this->Form->end();
				?>
			</div>
		</div>
		<!-- <div class="col-md-6">
				<div class="panel panel-info" style="min-height:407px;">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $career['Career']['title'];?></h3>
				  </div>
				  <div class="panel-body">
					<div class="p_details">
						<small>full view</small>
						<embed src="<?php echo Router::url('/', true).'files/'.$career['Career']['upload'];?>" width="100%" height="100%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep.html">
					</div>
					<small class="pull-right" ><?php echo date("Y-m-d", strtotime($career['Career']['created']));?></small>
				  </div>
				</div>
		</div> -->
		
	</div>
	<br/>
		<br/>
		<br/>
		<br/>
</div>
<?php echo $this->element('footer'); ?>