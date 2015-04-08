<script> <?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?> </script>
	<?php
		echo $this->GoogleMap->map();
	?>
		