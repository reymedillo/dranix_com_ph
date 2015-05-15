<div class="container" ng-controller="mainController">
	<div class="col-md-12">
		<br/>
		<center></center>
		<h3>Products</h3>
		<hr/>
		<div class="col-md-4">
			<div style="min-height:220px;" class="panel panel-info" ng-repeat="product in products">
			  <div class="panel-heading">
				<h3 class="panel-title">{{product.name}}</h3>
			  </div>
			  <div class="panel-body">
		  	    <a ng-click="openLightboxModal($index)">
			      <img ng-src="/img/products/{{product.thumbUrl}}" class="img-thumbnail" alt="">
			    </a>
			    <br>
			    <p style="text-align:center;font-size: 44px;"><a href=""><i class="fa fa-shopping-cart" style="color:darkred;"></i></a></p>
			  </div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<?php echo $this->element('footer'); ?>
