<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ZS Motor</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<?= $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon')); ?>
		<?= $this->fetch('meta'); ?>
		<meta property="fb:app_id" content="1938664143025395">
		<meta property="fb:admins" content="100001456867452">
		<meta property="fb:admins" content="100000398977447">
		<?= $this->Html->css(array(
			// 'base-css',
			//'nprogress', 'bootstrap.min', 'font-awesome.min', 'animate',
			// 'sitio', 
			'select2.min',
			'sitio-especial', 'movil', 'custom'
			, 'zsmotor'
		)); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->Html->scriptBlock(sprintf("var webroot = '%s';", $this->webroot)); ?>
		<?= $this->Html->scriptBlock(sprintf("var fullwebroot = '%s';", $this->Html->url('/', true))); ?>
		<? if ( AuthComponent::user() ) : ?>
		<?= $this->Html->scriptBlock(sprintf("var uid = '%s';", AuthComponent::user('id'))); ?>
		<? endif; ?>
		<?= $this->Html->script(array(
			'analytics',
			'vendor/base-vendors',
			//'vendor/nprogress', 'vendor/jquery-1.11.2.min', 'vendor/bootstrap.min',
			//'vendor/jPushMenu',
			//'vendor/less.min',
			//'vendor/jquery.alphanumeric.pack', 'vendor/jquery.validate.min.hotkeys',
			'vendor/jquery.chained.remote',
			'vendor/jquery.maskedinput.min',
			'vendor/jquery.validate.min',
			'jquery.elevateZoom-3.0.8.min.js',
			'jquery.zoom.min',
			'funciones', 'sitio', 'sitio-zs',
			'vendor/select2.full.min',
			// 'direcciones.add'
		)); ?>
		<?= $this->fetch('script'); ?>
	</head>
	<body>
		<?= $this->Html->scriptBlock('NProgress.start();'); ?>

			<?= $this->element('header'); ?>
				
			<?= $this->fetch('content'); ?>
			<?= $this->element('footer'); ?>
			<?= $this->element('popup_agregar_producto'); ?>
			<?= $this->element('popup_eliminar_producto'); ?>
			<?= $this->element('popup_generico'); ?>
		<?= $this->Html->scriptBlock('analytics.pageview();'); ?>

	</body>
</html>
