<script> <?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?> </script>
<script>
	$( document ).ready(function() {
		var bwidth = $('.google_view').width();
		
		if(bwidth >= 900){
			$('#dranix').width('900px');
			$('#dranix').height('800px');
		}else if(bwidth >= 750 && bwidth < 900){
			$('#dranix').width('790px');
			$('#dranix').height('700px');
		}else if(bwidth >= 700 && bwidth < 750){
			$('#dranix').width('700px');
			$('#dranix').height('600px');
		}else if(bwidth >= 600 && bwidth < 700){
			$('#dranix').width('600px');
			$('#dranix').height('500px');
		}else if(bwidth >= 500 && bwidth < 600){
			$('#dranix').width('500px');
			$('#dranix').height('400px');
		}else if(bwidth >= 400 && bwidth < 500){
			$('#dranix').width('400px');
			$('#dranix').height('300px');
		}else{
			$('#dranix').width('300px');
			$('#dranix').height('200px');
		}
	});
	$(window).resize(function() {
	
		var bwidth = $('.google_view').width();
		
		if(bwidth >= 900){
			$('#dranix').width('900px');
			$('#dranix').height('800px');
		}else if(bwidth >= 800 && bwidth < 900){
			$('#dranix').width('800px');
			$('#dranix').height('700px');
		}else if(bwidth >= 700 && bwidth < 800){
			$('#dranix').width('700px');
			$('#dranix').height('600px');
		}else if(bwidth >= 600 && bwidth < 700){
			$('#dranix').width('600px');
			$('#dranix').height('500px');
		}else if(bwidth >= 500 && bwidth < 600){
			$('#dranix').width('500px');
			$('#dranix').height('400px');
		}else if(bwidth >= 400 && bwidth < 500){
			$('#dranix').width('400px');
			$('#dranix').height('300px');
		}else{
			$('#dranix').width('300px');
			$('#dranix').height('200px');
		}
	});
</script>
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
		  <div class="panel-body google_view">
			<div class="google_map">
			<?php
				if(!$id){
					echo $this->GoogleMap->map();
				}else{
					if(!$branch['Branches']['images']){
						$image = '<img style="width:100%;" src="'.Router::url('/', true).'img/default.png"/>';
					}else{
						$image = '<img style="width:100%; max-width:400px;" src="'.Router::url('/', true).'img/'.$branch['Branches']['images'].'"/>';
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
					'windowText' => $image.'<br/>'.$branch['Branches']['branchname'].'<br/>'.$branch['Branches']['address'].'<br/>La('.$branch['Branches']['latitude'].') Lo('.$branch['Branches']['longitude'].')'.'<br/>Tel no.: '.$branch['Branches']['phone'].'<br/>Fax no.: '.$branch['Branches']['fax'],
					'markerIcon' => Router::url('/', true).'img/dranix_pointer.png'
					);
					echo $this->GoogleMap->map($marker_options);
				}
			?>
			</div>
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
				$image = '<img style="width:100%; max-width:400px;" src="'.Router::url('/', true).'img/'.$branch['Branches']['images'].'"/>';
			}
			
			$marker_options = array(
				'markerTitle' => $branch['Branches']['branchname'],
				'windowText' => $image.'<br/>'.$branch['Branches']['branchname'].'<br/>'.$branch['Branches']['address'].'<br/>La('.$branch['Branches']['latitude'].') Lo('.$branch['Branches']['longitude'].')'.'<br/>Tel no.: '.$branch['Branches']['phone'].'<br/>Fax no.: '.$branch['Branches']['fax'],
				'markerIcon' => Router::url('/', true).'img/dranix_pointer.png'
				);
				
			if($id==$branch['Branches']['id']){
				$active = 'list-group-item-danger active';
			}else{
				$active = '';
				echo $this->GoogleMap->addMarker("dranix", $branch['Branches']['id'], $location, $marker_options); 
			}
			
			echo $this->Html->link($branch['Branches']['branchname'], array('controller'=>'branches', $branch['Branches']['id']), array('class'=>'list-group-item '.$active));
			
			}
		?>
		</div>
	</div>
</div>
<br/>
<?php echo $this->element('footer');