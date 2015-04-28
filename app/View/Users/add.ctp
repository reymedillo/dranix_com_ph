<div class="container">
    <div class="col-md-12">
        <h3>Add User</h3>
        <hr/>
        <br/>
        <div class="col-md-4">
            <?php echo $this->Form->create('User');?>
                <?php echo $this->Form->input('username', array('autocomplete' => 'off','class'=>'form-control', 'placeholder' => 'Username','label' => false)); ?>
                <br/>
                <?php echo $this->Form->input('name', array('autocomplete' => 'off','class'=>'form-control', 'placeholder' => 'Name','label' => false)); ?>
                <br/>
                <?php echo $this->Form->input('email', array('autocomplete' => 'off','type' => 'email','class'=>'form-control', 'placeholder' => 'Email', 'label' => false)); ?>
                <br/>
                <?php echo $this->Form->input('role', array(
                'options' => array( 'Regular' => 'Regular', 'HR' => 'HR','Admin' => 'Admin'), 'class' => 'form-control', 'label' => 'Role')); ?>
                <br/>
                <input type="reset" class="btn btn-default btn-xs" value="Clear"> &nbsp;&nbsp;&nbsp;
                <input type="submit" value="Add" id="add" name="add" class="btn btn-success btn-xs" /> 
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