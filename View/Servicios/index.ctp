<? if ( $banners ) : ?>
	<div class="row row2">
		<div class="col-md-12 col-xs-12">
			<div id="slider-principal" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<? foreach ( $banners as $index => $banner) : ?>
						<li data-target="#slider-principal" data-slide-to="<?= $index; ?>" class="<?= ($index == 0 ? 'active' : '' ); ?>"></li>
					<? endforeach; ?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<? foreach ( $banners as $index => $banner) : ?>
						<div class="item <?= ($index == 0 ? 'active' : ''); ?>">
							<div class="fill">
								<? if(!empty($banner['Banner']['link'])):?>
									<?=
										$this->Html->link(
											$this->Html->image($banner['Banner']['imagen']['bannerhome']),
											$banner['Banner']['link'],
											array(
												'class'     =>  'img-responsive',
												'target'    =>  (empty($banner['Banner']['enlace_externo'])) ? '_blank' : '',
												'escape'    =>  false
											)
										);
									?>
								<? else : ?>
									<?= $this->Html->image(
										$banner['Banner']['imagen']['bannerhome'],
										array('class' => 'img-responsive')
									) ?>
								<? endif; ?>
							</div>
						</div>
					<? endforeach; ?>
				</div>
				
			</div>
		</div>
	</div>
<? endif; ?>

<div class="container-fluid datos-producto">
	<div class="registro clearfix bread-slider">
		<div class="col-md-12">
			<?= $this->element('breadcrumbs'); ?>
		</div>
	</div>
</div>
<div class="general-wrapper general-wrapper-blanco">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 lista-servicios">

	            <?foreach ($servicios as $servicio):?>
					<div class='col-xs-12 col-md-4 col-lg-4' id="caja-servicio">
		                <?= $this->Html->link(
		                        '<div class="bg-hover"></div>',
		                        array('controller' => 'Servicios', 'action' => 'view', $servicio['Servicio']['slug']),
		                        array('escape' => false)
		                    ); 
		                ?>
		                <?= $this->Html->link(
		                        $this->Html->image($servicio['Servicio']['imagen']['interna'], array('class'=>'img-responsive')),
		                        array('controller' => 'servicios', 'action' => 'view', $servicio['Servicio']['slug']),
		                        array('escape' => false)
		                    ); 
		                ?>
						<h3 class="titulo"><?= strtoupper($servicio['Servicio']['nombre']); ?></h3>
					</div>	 
	            <?endforeach ?>
			</div>
		</div>
	</div>
</div>