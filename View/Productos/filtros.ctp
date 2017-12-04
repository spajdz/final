<div class="container-fluid datos-producto" style="margin-top: 50px;">
	<div class="registro clearfix">
		<div class="col-md-12">
			<?= $this->element('breadcrumbs'); ?>
		</div>
	</div>
</div>
<?if(!empty($texto_busqueda)):?>
	<div class="container-fluid datos-producto" >
		<div class="col-md-8">
			<h4>
				<strong>Estas buscando <?= $texto_busqueda?></strong>
			</h4>
		</div>
	</div>
<?endif;?>
<div class="contenedor catalogos">
	<div class="row">
		<div class="col-md-12 contenido">
			<div class="container-fluid">
				<div class="display-productos datos-producto">
					<div class="row">
						<div class="col-sm-6">
							<p>Ordernar por:</p>
							<?= $this->Paginator->sort('nombre', null, array('title' => 'Haz click para ordenar por este criterio')); ?> |
							<?if($esMayorista):?>
								<?= $this->Paginator->sort('preciofinal_mayorista', 'Precio', array('title' => 'Haz click para ordenar por este criterio')); ?>
							<?else:?>
								<?= $this->Paginator->sort('preciofinal_publico', 'Precio', array('title' => 'Haz click para ordenar por este criterio')); ?>
							<?endif;?> 
						</div>
						<div class="col-sm-6">
							<p style="float: right;">
								Tamaño página:
								<?= $this->Paginator->link('10 productos', array('limite' => 10)); ?> |
								<?= $this->Paginator->link('20 productos', array('limite' => 20)); ?> |
								<?= $this->Paginator->link('30 productos', array('limite' => 30)); ?> |
								<?= $this->Paginator->link('40 productos', array('limite' => 40)); ?>
							</p>
						</div>
					</div>
					<?= $this->element('buscadores/index'); ?>
					<div class="row">	

						<? foreach ( $productos as $producto ) : ?>
							<? $this->set(compact('producto')); ?>
							<?= $this->element('productos/producto'); ?>
						<? endforeach; ?>
					</div>
				</div>
			</div>
			<div class="display-productos datos-producto">
				<div class="row">
					<div class="col-sm-6">
						<p>Ordernar por:</p>
						<?= $this->Paginator->sort('nombre', null, array('title' => 'Haz click para ordenar por este criterio')); ?> |
						<?if($esMayorista):?>
							<?= $this->Paginator->sort('preciofinal_mayorista', 'Precio', array('title' => 'Haz click para ordenar por este criterio')); ?>
						<?else:?>
							<?= $this->Paginator->sort('preciofinal_publico', 'Precio', array('title' => 'Haz click para ordenar por este criterio')); ?>
						<?endif;?> 
					</div>
					<div class="col-sm-6">
						<p style="float: right;">
							Tamaño página:
							<?= $this->Paginator->link('10 productos', array('limite' => 10)); ?> |
							<?= $this->Paginator->link('20 productos', array('limite' => 20)); ?> |
							<?= $this->Paginator->link('30 productos', array('limite' => 30)); ?> |
							<?= $this->Paginator->link('40 productos', array('limite' => 40)); ?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-12 ordenar-productos blanco col-xs-12">
				<ul class="pagination pagination-sm col-md-5 col-xs-12">
					<?= $this->Paginator->prev('« Anterior', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'first disabled hidden')); ?>
					<?= $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'modulus' => 8, 'currentClass' => 'active', 'separator' => '')); ?>
					<?= $this->Paginator->next('Siguiente »', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'last disabled hidden')); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
