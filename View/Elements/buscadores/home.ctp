<div class="franja-search">
	<div class="container">
		
		<?= $this->Form->create('Producto', array('url' => '/filtros' , 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'ProductoFiltroForm')); ?>
			<?= $this->Form->input('categoria', array('id' => 'buscador-categoria','type' => 'hidden', 'value' => $categoria)); ?>
			<fieldset>
				<div class="form-group">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label" for="textinput">Estoy buscando</label>  
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">
						<?= $this->Form->input('filtro', array('id' => 'buscador-filtro-home', 'class' => 'form-control input-md', 'placeholder' => 'Escribe tu busqueda')); ?>
					</div>
					<div class="boton col-lg-2 col-md-2 col-sm-2 col-xs-3">
						<button class="js-buscar-productos">Buscar</button>
					</div>
				</div>
			</fieldset>
		<?= $this->Form->end(); ?>
	</div>
</div>