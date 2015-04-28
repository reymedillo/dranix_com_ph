<div class="container">
    <div class="col-md-12">
        <h3>Account Recovery</h3>
        <hr/>
        <br/>
        <div class="col-md-4">
            <?php echo $this->Form->create('User', array('action' => 'recover'));?>
                <?php echo $this->Form->input('recover_email', array('novalidate'=>true,'autocomplete' => 'off','type' => 'email','class'=>'form-control', 'placeholder' => 'Email', 'label' => false)); ?>
                <br/>
                <input type="submit" value="Recover" id="add" name="add" class="btn btn-success btn-xs" /> 
            <?php echo $this->Form->end(); ?>
            <br/>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
</div>