<div class="container" ng-controller="mainController">
	<div class="col-md-12">
		<br/>
		<center></center>
		<h3>Products</h3>
		<hr/>
		<div class="col-md-4">
			<div style="min-height:220px;" ng-init="product.session='<?php echo CakeSession::read('Config.userAgent'); ?>'" class="panel panel-info" ng-repeat="product in products">
			  <div class="panel-heading">
				<h3 class="panel-title">{{product.name}}</h3>
			  </div>
			  <div class="panel-body">
		  	    <a ng-click="openLightboxModal($index)">
			      <img ng-src="/img/products/{{product.thumbUrl}}" class="img-thumbnail" alt="">
			    </a>
			    <br>
			    <p style="text-align:center;font-size: 44px;"><a data-toggle="modal" href="#cart"><i class="fa fa-shopping-cart" style="color:darkred;" ng-click="submitCart(product);"></i></a></p>
			    <!-- Cart Modal -->
				<div class="modal" id="cart" class="modal fade in">
						  <div class="modal-dialog">
						    <div class="panel panel-danger">
						      <div class="panel-heading">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="panel-title">Add to Cart</h4>
						      </div>
						      <div class="panel-body">
						        <div class="users form">
						        <table class="table table-striped table-hover">
									  <thead>
									    <tr>
									      <th>#</th>
									      <th>Item Description</th>
									      <th>Qty</th>
									      <th>Price</th>
									      <th>Total</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr ng-repeat="cart in carts track by $index">
									      <td>{{$index}}</td>
									      <td>{{cart.itemName}}
									      	<input type="hidden" name="data[orderDetails][itemId]" value="cart.itemId">
									      </td>
									      <td>
									      	<select ng-model="cart.qty" ng-options="list.id as list.value for list in listQty track by list.value" ng-change="updateQty(cart)">
									      	   <option style="display:none" value="">{{cart.qty}}</option>
                            				</select>
                            				<input type="hidden" name="data[orderDetails][qty]" value="{{cart.qty}}">
									      </td>
									      <td>{{cart.price}}
									      	<input type="hidden" name="data[orderDetails][price]" value="{{cart.price}}">
									      </td>
									      <td>{{cart.total}}
									      	<input type="hidden" name="data[orderDetails][total]" value="{{cart.total}}">
									      </td>
									    </tr>
									    <tr>
									    	<td>Total</td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>{{netTotal()}}</td>
									    </tr>
									    <tr>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td><button class="btn btn-default btn-xs pull-right" type="submit" name="btn[]" value="4"><i class="fa fa-sign-out"></i> Checkout</button></td>
									    </tr>
									  </tbody>
									</table>
								</div>
						      </div>
						    </div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
				<!-- end cartmodal -->
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<?php echo $this->element('footer'); ?>
