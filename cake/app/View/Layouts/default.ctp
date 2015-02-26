<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="http://localhost/link4up/css/bootstrap.min.css" rel="stylesheet">
	<!--<link href="http://www.fuelcdn.com/fuelux/3.5.1/css/fuelux.min.css" rel="stylesheet">
	<script src="http://www.fuelcdn.com/fuelux/3.5.1/js/fuelux.min.js"></script> -->
	<script src="http://localhost/link4up/js/jquery-1.11.2.min.js"></script>
	<script src="http://localhost/link4up/js/bs.js"></script>
	<link rel="stylesheet" href="http://localhost/link4up/css/animated.css">
	<link rel="stylesheet" href="http://localhost/link4up/css/lightbox.css">
	<link rel="stylesheet" href="http://localhost/link4up/css/page.css">
	<link rel="stylesheet" href="http://getbootstrap.com/examples/offcanvas/offcanvas.css">
	<link rel="stylesheet" href="http://getbootstrap.com//dist/css/bootstrap-theme.min.css">
	
	<style>
	.sidebar {
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
    bottom: 0;
    display: block;
    left: 0;
    overflow-x: hidden;
    overflow-y: auto;
    padding: 20px;
    position: fixed;
    top: 51px;
    z-index: 1000;
}
	</style>
</head>
<body class="fuelux">

	<?php echo $this->element('header'); ?>	
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-left">
			<div id="sidebar" class="col-xs-6 col-sm-3 sidebar-offcanvas">
				<?php echo $this->element('sidebar'); ?>	
			</div>
			<div class="col-xs-12 col-sm-9">
				<p class="visible-xs">
					<button class="btn btn-primary btn-xs" data-toggle="offcanvas" type="button">Menus</button>
				</p>

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>

		</div>
	</div>
<script>
	$(document).ready(function () {
		$('[data-toggle="offcanvas"]').click(function () {
			$('.row-offcanvas').toggleClass('active')
		});

	});
</script>

</body>

</html>
