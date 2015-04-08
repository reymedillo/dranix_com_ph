<div class="container">
	<div class="col-md-12">
		<h3>HR - Post News / Event</h3>
		<hr/>
		<br/>
		<div class="col-md-6">
			<div class="alert alert-info">
				<h4>Post a News</h4>
				<hr/>
				<script type="text/javascript">
				tinymce.init({
					mode: "textareas",
					theme: "simple",
					editor_selector: "nbody"
					});
				</script>	
				<?php 
					echo $this->Form->create('News');
					echo $this->Form->input('title', array('class'=>'form-control'));
					echo $this->Form->input('body', array('class'=>'form-control nbody'));
					echo '<br/>';
					echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
					echo $this->Form->end();
				?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="alert  alert-success">
				<h4>Post an Event</h4>
				<hr/>
				<script type="text/javascript">
				tinymce.init({
					mode: "textareas",
					theme: "simple",
					editor_selector: "ebody"
					});
				</script>
				<?php 
					echo $this->Form->create('Events');
					echo $this->Form->input('title', array('class'=>'form-control'));
					echo $this->Form->input('body', array('type' => 'textarea','class'=>'form-control ebody'));
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
<?php echo $this->element('partners'); ?>
<?php echo $this->element('footer'); ?>