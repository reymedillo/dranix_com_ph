<?php
$dranix = 'Dranix';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $dranix; ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<!--[if lt IE 9]><?php echo $this->Html->script(array('html5shiv.js', 'respond.min.js')); ?><![endif]-->
	<?php
		echo $this->Html->meta('icon', Router::url('/', true).'img/dranix.icon.png');
		echo $this->Html->css(array('font-awesome.min.css', 'yeti.css', 'css.css'));
		echo $this->Html->script(array('bootstrap.min.js'));
		echo $this->Html->script('tiny_mce/tiny_mce.js', array('inline' => false));
		echo $this->Html->script(array('js.js'));
	?>
	
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->fetch('css'); ?>
	<?php echo $this->fetch('script'); ?>	
</head>
<body>
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