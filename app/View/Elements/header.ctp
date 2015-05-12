<?php 
$dir = Router::url('/');
$branches = $this->requestAction('/career/branches');
?>
<div style="margin-bottom:0px; border-bottom:2px solid #ea2f10;" class="navbar navbar-default">
  <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	&nbsp;&nbsp;<a href="<?php if($loggedIn){echo '/dashboard';}else{echo '/';} ?>"><img src="<?php echo Router::url('/',true).'img/dranix.png'; ?>"/></a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
	<ul class="nav navbar-nav navbar-right">
	  <li class="<?php if($this->here == $dir){echo 'active';} ?>"><?php echo $this->Html->link('Home', '/');?></li>
	  <li class="dropdown <?php if($this->here == $dir.'aboutus/history' || $this->here == $dir.'aboutus/mvv' || $this->here == $dir.'aboutus/ar'){echo 'active';} ?>">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <li ><?php echo $this->Html->link('History', array('controller'=>'aboutus', 'action' => 'history')); ?></li>
		  <li><?php echo $this->Html->link('Mission, Vision & Values', array('controller'=>'aboutus', 'action' => 'mvv')); ?></li>
		  <li><?php echo $this->Html->link('Awards & Recognition', array('controller'=>'aboutus', 'action' => 'ar')); ?></li>
		  <li><?php echo $this->Html->link('Outreach Programs', array('controller'=>'aboutus', 'action' => 'outreach')); ?></li>
		</ul>
	  </li>
	  <li class="<?php if(strpos($this->here, 'branch') === false){}else{echo 'active';} ?>" ><?php echo $this->Html->link('Branches', array('controller'=>'branches','action' => 'index'));?></li>
	  <li class="<?php if($this->here == $dir.'news'){echo 'active';} ?>"  ><?php echo $this->Html->link('News & Events', array('controller'=>'news'));?></li>
	  <?php if($loggedIn): ?>
	  <li class="<?php if($this->here == $dir.'memo'){echo 'active';} ?>"  ><?php echo $this->Html->link('Memos', array('controller'=>'memo','action'=>'index'));?></li>
	  <li class="<?php if($this->here == $dir.'applicants'){echo 'active';} ?>"  ><?php echo $this->Html->link('Applications', array('controller'=>'applicants','action'=>'index'));?></li>
	  <?php endif; ?>
	  <li class="<?php if($this->here == $dir.'career'){echo 'active';} ?>">
	  	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Careers<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<?php foreach($branches as $branch) { ?>
			<li ><a href="/career/view/<?php echo $branch['Branches']['id']; ?>"><?php echo $branch['Branches']['branchname'] ?></a></li>
			<?php } ?>
		</ul>
	  </li>
	  <li class="<?php if($this->here == $dir.'contact'){echo 'active';} ?>"><?php echo $this->Html->link('Contact Us', array('controller'=>'contact'));?></li>

	  <?php if($loggedIn): ?>
	  <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i></a>
		<ul class="dropdown-menu">
			<?php if($current_user['role'] == 'Admin'): ?>
 			<li class="<?php if($this->here == $dir.'contact'){echo 'active';} ?>"><?php echo $this->Html->link('Add User', array('controller'=>'users','action'=>'add'));?></li>
 			<?php endif; ?>
 			<li class="<?php if($this->here == $dir.'contact'){echo 'active';} ?>"><?php echo $this->Html->link('Change Password', array('controller'=>'users','action'=>'changepass'));?></li>
 			<li class="<?php if($this->here == $dir.'contact'){echo 'active';} ?>"><?php echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));?></li>
		</ul>
	  </li>
	  <?php else: ?>
	  	<li><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a>
	  	</li>
	  <?php endif; ?>
	</ul>
  </div>
</div>

<!-- Login Modal -->
<div class="modal" id="myModal" class="modal fade in">
  <div class="modal-dialog">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="panel-title">Employee Access</h4>
      </div>
      <div class="panel-body">
        <div class="users form">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User',array('action' => 'login')); ?>
		<?php 
			echo $this->Form->input('username',array('class'=>'form-control'));
			echo $this->Form->input('password',array('class'=>'form-control'));
		?>
		<br/>
		<?php echo $this->Form->end(__('Login')); ?>
		<br/>
		<?php echo $this->Html->link('Forgot Password', array('controller'=>'users','action'=>'recover'));?>
		</div>
      </div>
    </div>
  </div>
</div>
