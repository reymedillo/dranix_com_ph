<script> <?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?> </script>
<div class="container">
	<br/>
	<div class="col-md-9">
		<div class="panel panel-danger">
		  <div class="panel-heading">
			<h3 class="panel-title">
				<?php 
					if(!$id){
						echo 'Dranix Locations';
					}else{
						echo $branch['Branches']['branchname'];
					}
				?>
			</h3>
		  </div>
		  <div class="panel-body">
			<?php
				if(!$id){
					echo $this->GoogleMap->map();
				}else{
					if(!$branch['Branches']['images']){
						$image = '<img style="width:100%;" src="'.Router::url('/', true).'img/default.png"/>';
					}else{
						$image = '<img style="width:100%;" src="'.Router::url('/', true).'img/'.$branch['Branches']['images'].'.png"/>';
					}
				
					$marker_options = array(
					'id' => 'dranix',
					'width' => '800px',
					'height' => '700px',
					'style' => '',
					'zoom' => 13,
					'type' => 'ROADMAP',
					'custom' => null,
					'localize' => false,
					'latitude' => ((float)$branch['Branches']['latitude']),
					'longitude' => ((float)$branch['Branches']['longitude']),
					'address' => $branch['Branches']['address'],
					'marker' => true,
					'markerTitle' => $branch['Branches']['branchname'],
					'windowText' => $image.'<br/>'.$branch['Branches']['branchname'].'<br/>'.$branch['Branches']['address'].'<br/>Tel no.: '.$branch['Branches']['phone'].'<br/>Fax no.: '.$branch['Branches']['fax'],
					'markerIcon' => Router::url('/', true).'img/dranix_pointer.png'
					);
					echo $this->GoogleMap->map($marker_options);
				}
			?>
		  </div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="list-group">
		<?php foreach( $branches as $branch ) 
			{
			
			$location = array('latitude'=>$branch['Branches']['latitude'],'longitude'=>$branch['Branches']['longitude']);
			
			if(!$branch['Branches']['images']){
				$image = '<img style="width:100%;" src="'.Router::url('/', true).'img/default.png"/>';
			}else{
				$image = '<img style="width:100%;" src="'.Router::url('/', true).'img/'.$branch['Branches']['images'].'.png"/>';
			}
			
			$marker_options = array(
				'markerTitle' => $branch['Branches']['branchname'],
				'windowText' => $image.'<br/>'.$branch['Branches']['branchname'].'<br/>'.$branch['Branches']['address'].'<br/>Tel no.: '.$branch['Branches']['phone'].'<br/>Fax no.: '.$branch['Branches']['fax'],
				'markerIcon' => Router::url('/', true).'img/dranix_pointer.png'
				);
				
			if($id==$branch['Branches']['id']){
				$active = 'list-group-item-danger active';
			}else{
				$active = '';
				echo $this->GoogleMap->addMarker("dranix", $branch['Branches']['id'], $location, $marker_options); 
			}
			
			echo $this->Html->link($branch['Branches']['branchname'], array('controller'=>'branches','action' => 'index', $branch['Branches']['id']), array('class'=>'list-group-item '.$active));
			
			}
		?>
		</div>
	</div>
</div>
<br/>
<?php echo $this->element('footer');