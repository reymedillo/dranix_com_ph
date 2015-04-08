<div class="container">
	<div class="col-md-12">
		<h3>HR - Post Job Opening</h3>
		<hr/>
		<br/>
<!-- 		<div class="col-md-6">
			<div class="alert alert-dismissable alert-info">
				<h4>Post a Job via Upload PDF</h4>
				<hr/> -->
				<?php 
					// echo $this->Form->create('Career',array('type' => 'file'));
					// echo $this->Form->input('title', array('class'=>'form-control','label'=>'Job Title'));
					// echo $this->Form->input('division', array('class'=>'form-control'));
					// //echo $this->Form->input('upload', array('type'=>'file','class'=>'form-control','label'=>'Upload a PDF file'));
					// echo $this->Form->input('upload', array('type' => 'file', 'label' => 'Image'));
					// echo $this->Form->input('upload_dir', array('type' => 'hidden', 'value' => 'Post'));
					// echo '<br/>';
					// echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
					// echo $this->Form->end();
				?>
<!-- 			</div>
		</div> -->
		<div class="col-md-6">
			<div class="alert  alert-success">
				<h4>Post an Job via Text</h4>
				<hr/>
				<script type="text/javascript">
				tinymce.init({
					mode: "textareas",
					theme: "simple",
					editor_selector: "jbody"
					});
				</script>
				<?php 
					echo $this->Form->create('Career');
					echo $this->Form->input('title', array('class'=>'form-control','label'=>'Position', ));
					echo $this->Form->input('division', array('class'=>'form-control'));
					echo $this->Form->input('body', array('type' => 'textarea','label'=>'Details','class'=>'form-control jbody'));
					// echo $this->Form->input('upload', array('type' => 'file', 'label' => 'Image'));
					// echo $this->Form->input('upload_dir', array('type' => 'hidden', 'value' => 'Post'));
					echo '<br/>';
					echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
					echo $this->Form->end();
				?>
			</div>
		</div>
		
	</div>
</div>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
<?php echo $this->element('footer'); ?>