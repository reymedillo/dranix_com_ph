<div class="container">
	<div class="col-md-12">
		<h3>Change Password</h3>
		<hr/>
		<br/>
		<div class="col-md-3">
			<?php echo $this->Form->create('User', array('id' => 'ajax-contact-form')); ?>
              <?php echo $this->Form->input('password', array('autocomplete' => 'off','type' => 'password','class'=>'form-control', 'placeholder' => 'New Password', 'label' => false)); ?>
              <br/>
              <?php echo $this->Form->input('password_confirm', array('autocomplete' => 'off','type' => 'password','class'=>'form-control', 'placeholder' => 'Confirm Password', 'label' => false)); ?>
              <br/>
              <input type="reset" class="btn btn-default btn-xs" value="Clear"> &nbsp;&nbsp;&nbsp;
              <input type="submit" value="Change Password" id="login" name="submit" class="btn btn-success btn-xs" /> 
            <?php echo $this->Form->end(); ?>
            <br/>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
</div>
<?php echo $this->element('footer'); ?>