<div class="container">
	<div class="col-md-12">
		<br/>
		<center><img style="width:100%;" src="<?php echo Router::url('/', true).'img/careers.png'; ?>"/></center>
		<h3>Careers</h3>
		<hr/>
		<?php foreach($careers as $career): ?>
			<div class="col-md-6">
				<div class="panel panel-info">
				  <div class="panel-heading">
					<h3 class="panel-title" style="font-weight:bold;"><?php echo $career['Career']['title'];?></h3>
				  </div>
				  <div class="panel-body">
					<div class="p_details">
						<?php echo $career['Career']['body']; ?>
						<!--<iframe width='100%' height='100%' src="<?php echo Router::url('/', true).'files/'.$career['Career']['upload'];?>" frameborder='0'></iframe>-->
<!-- 						<embed src="<?php echo Router::url('/', true).'files/'.$career['Career']['upload'];?>" width="100%" height="100%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep.html"> -->
					</div>
					<?php if($loggedIn): ?>
					/ 
					<small><?php echo $this->Html->link('Applicants', array('controller' => 'Applicant', 'action' => 'job', $career['Career']['id'])); ?></small>
					<?php elseif(!$loggedIn): ?>
					<small><?php echo $this->Html->link('Get the job!',array('controller'=>'Applicant','action'=>'apply',$career['Career']['id'])) ?></small>
					<?php endif; ?>
					<small class="pull-right" ><?php echo date("Y-m-d", strtotime($career['Career']['created']));?></small>
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
								<form action="/shop" method="post">
						        <table class="table table-striped table-hover">
									  <thead>
									    <tr>
									      <th>#</th>
									      <th>Item Description</th>
									      <th>Qty</th>
									      <th>Unit of Measure</th>
									      <th>Price</th>
									      <th>Total</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr ng-repeat="cart in carts track by $index">
									      <td>{{$index}}</td>
									      <td>{{cart.itemName}}
									      	<input type="hidden" name="orderDetail[itemId][]" value="{{cart.itemId}}">
									      	<input type="hidden" name="orderDetail[cartId][]" value="{{cart.id}}">
									      	<input type="hidden" name="orderDetail[cartName][]" value="{{cart.itemName}}">
									      </td>
									      <td>
									      	<select ng-model="cart.qty" ng-options="list.id as list.value for list in listQty track by list.value" ng-change="updateQty(cart)">
									      	   <option style="display:none" value="">{{cart.qty}}</option>
		                    				</select>
		                    				<input type="hidden" name="orderDetail[qty][]" value="{{cart.qty}}">
									      </td>
									      <td>
									      	<select name="orderDetail[uom][]">
									      		<option value="{{cart.uom1}}">{{cart.uom1}}</option>
									      		<option value="{{cart.uom2}}">{{cart.uom2}}</option>
									      	</select>
									      </td>
									      <td>{{cart.price}}
									      	<input type="hidden" name="orderDetail[price][]" value="{{cart.price}}">
									      </td>
									      <td>{{cart.total}}
									      	<input type="hidden" name="orderDetail[total][]" value="{{cart.total}}">
									      </td>
									    </tr>
									    <tr>
									    	<td>Total</td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>{{netTotal()}}
									    	<input type="hidden" name="data[Order][total]" value="{{netTotal()}}">
									    	</td>
									    </tr>
									    <tr>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td><button class="btn btn-default btn-xs pull-right" type="submit" name="btn"><i class="fa fa-sign-out"></i> Checkout</button></td>
									    </tr>
									  </tbody>
									</table>
								</div>
								</form>
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
		<?php endforeach; ?>
	</div>
</div>
<?php echo $this->element('footer'); ?>
