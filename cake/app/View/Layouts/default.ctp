<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	
	<link href="http://localhost/link4up/css/bootstrap.min.css" rel="stylesheet">
	<!--<link href="http://www.fuelcdn.com/fuelux/3.5.1/css/fuelux.min.css" rel="stylesheet">
	<script src="http://www.fuelcdn.com/fuelux/3.5.1/js/fuelux.min.js"></script> -->
	<script src="http://localhost/link4up/js/jquery-1.11.2.min.js"></script>
	<script src="http://localhost/link4up/js/bs.js"></script>


	<link rel="stylesheet" href="http://localhost/link4up/css/animated.css">
	
	

	<link rel="stylesheet" href="http://localhost/link4up/css/lightbox.css">
	<link rel="stylesheet" href="http://localhost/link4up/css/page.css">

</head>
<body class="fuelux">
<?php echo $this->element('header'); ?>
<div class="container">
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
</div>


</body>

</html>
