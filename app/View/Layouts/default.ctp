<?php
$dranix = 'Dranix';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $dranix; ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<link rel="stylesheet" href="/css/fancyzoom.css"/>
	<link rel="stylesheet" href="/js/node_modules/angular-bootstrap-lightbox/dist/angular-bootstrap-lightbox.css"/>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<!--[if lt IE 9]><?php echo $this->Html->script(array('html5shiv.js', 'respond.min.js')); ?><![endif]-->
	
	<!-- ANGULAR -->
    <script src="/js/node_modules/angular/angular.min.js"></script>
    <script src="/js/controllers/mainCtrl.js"></script>
    <script src="/js/services/mainService.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/node_modules/moment.min.js"></script>
    <script src="/js/node_modules/angular-moment.js"></script>
    <script src="/js/node_modules/dirPagination.js"></script>
	<script src="/js/jquery.fancyzoom.js"></script>
	<script src="/js/node_modules/angular-bootstrap-lightbox/dist/angular-bootstrap-lightbox.js"></script>
	<script>
	$(document).ready(function() {
		$(".fancy").fancyZoom();
	});
	</script>	
	<?php
		echo $this->Html->meta('icon', Router::url('/', true).'img/dranix.icon.png');
		echo $this->Html->css(array('font-awesome.min.css', 'yeti.css', 'css.css'));
		echo $this->Html->script(array('bootstrap.min.js'));
		echo $this->Html->script('tiny_mce/tiny_mce.js', array('inline' => false));
		echo $this->Html->script(array('js.js', 'ui-bootstrap-tpls-0.9.0.js'));
	?>
	
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->fetch('css'); ?>
	<?php echo $this->fetch('script'); ?>	
</head>
<body ng-app="myApp">
	<div id="header">
		<?php echo $this->element('header'); ?>
	</div>
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>