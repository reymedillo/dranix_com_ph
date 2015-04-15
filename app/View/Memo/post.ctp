<div class="container">
	<div class="col-md-12">
		<h3>Post a Memo</h3>
		<hr/>
		<br/>
		<div class="col-md-6">
			<div class="alert alert-dismissable alert-info">
				<?php 
				echo $this->Form->create('Memo',['type' => 'file'],['action'=>'post']);
				echo $this->Form->input('subject', array('class'=>'form-control', 'required' => true));
				echo $this->Form->input('description', array('class'=>'form-control','required' => true));
				?>
				<label>Department</label>
				<select name="data[Memo][deptid]" class="form-control" id="MemoDeptid">
				<option value="0"></option>
				<?php foreach($department as $dept) { ?>
                <option value="<?php echo $dept['Department']['id']; ?>"><?php echo $dept['Department']['description']; ?></option>
                <?php } ?>
                </select>
				<h5>Upload Scanned Copy</h5>
				<?php
					echo $this->Form->input('upload', array('type' => 'file', 'label' => 'Memo','required' => true, 'accept' => 'image/jpeg,image/png'));
					echo $this->Form->input('upload_dir', array('type' => 'hidden', 'value' => 'Post','required' => true));
					echo '<br/>';
					echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
					echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
	<br/>
		<br/>
		<br/>
		<br/>
</div>
<?php echo $this->element('footer'); ?>