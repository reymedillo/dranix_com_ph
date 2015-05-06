<div class="container" ng-controller="mainController">
	<div class="col-md-12">
		<br/>
		<center><img style="width:100%;" src="<?php echo Router::url('/', true).'img/contact.png'; ?>"/></center>
		<h3>Contact Details</h3>
		<hr/>
		<?php foreach($branches as $branch): ?>
			<div class="col-md-4">
				<div style="min-height:220px;" class="panel panel-danger">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $branch['Branches']['branchname']; ?></h3>
				  </div>
				  <div class="panel-body">
					<label>Address:</label>
					<p><?php echo $branch['Branches']['address']; ?></p>
					<small><i class="fa fa-phone"></i> <?php echo $branch['Branches']['phone']; ?></small><br/>
					<small><i class="fa fa-fax"></i> <?php echo $branch['Branches']['fax']; ?></small>
				  </div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="col-md-12">
		<h3>Inquires</h3>
		<hr/>
		<div class="col-md-6">
			<div class="alert alert-dismissable alert-info">
				<h4>Submit an Inquiry</h4>
				<hr/>
				<div class="alert alert-dismissible alert-success" ng-show="successMsg">
				  <strong>Well done!</strong> You've successfully sent you're inquiry.
				</div>
				<form ng-submit="submitInquiry()" method="post">
					<label for="name">Name</label>
					<input ng-model="inquiryData.name" name="inquiryName" class="form-control">
					<label for="email">Email</label>
					<input ng-model="inquiryData.email" name="inquiryEmail" class="form-control">
					<label for="message">Message</label>
					<textarea style="resize:none" ng-model="inquiryData.message" name="inquiryMessage" id="" cols="30" rows="5" class="form-control"></textarea>
					<br>
					<button type="submit" class="btn btn-success">Send</button>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="alert alert-dismissable alert-danger">
				<h4>Live Chat</h4>
				<hr/>
				<br/>
				<br/>
				<center><h1><i class="fa fa-weixin fa-3x"></i></h1></center>
				<center><h1>SOON TO SERVE</h1></center>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
			</div>
		</div>
	</div>
</div>
<?php echo $this->element('partners'); ?>
<?php echo $this->element('footer'); ?>
