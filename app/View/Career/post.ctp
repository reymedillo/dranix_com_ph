<div class="container">
	<div class="col-md-12">
		<h3>HR - Post Job Opening</h3>
		<hr/>
		<br/>
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
				$branches = $this->requestAction('/career/branches');
					echo $this->Form->create('Career');
					echo $this->Form->input('title', array('class'=>'form-control','label'=>'Position', ));
					echo $this->Form->input('division', array('class'=>'form-control'));
				?>
				<label>Branch</label>
				<select name="data[Career][branchid]" id="CareerBranchid" class="form-control">
					<?php foreach($branches as $branch) { ?>
					<option value="<?php echo $branch['Branches']['id'] ?>"><?php echo $branch['Branches']['branchname'] ?></option>
					<?php } ?>
				</select>
				<?php
					echo $this->Form->input('body', array('type' => 'textarea','label'=>'Details','class'=>'form-control jbody'));
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