<div id="buscadorHome">
	<div class="row">
		<div id="buscador-header" class="col-xs-12 col-md-12 col-lg-12">
			<?= $this->Form->create('Producto', array('url' => '/filtros', 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'ProductoFiltroForm')); ?>

				<?= $this->Form->input('categoria', array('id' => 'buscador-categoria-llantas', 'type' => 'hidden', 'value' => 'llantas', 'id' => 'buscador-categoria-llantas')); ?>

				<div class="form-group">
					<div class="col-sm-7 col-md-7 col-lg-4">
						<h4>Por modelo de vehículo</h4>
						<div class="col-md-3 col-xs-6">
							<?= $this->Form->input('marca', array('id' =>'buscador-marca-llantas' ,  'class' => 'form-control', 'placeholder' => 'Marca', 'style' => 'width: 200px', 'options' => $marcas_vehiculo, 'empty' => 'Marca','data-tipo' => 'llantas', 'onChange' => 'changeMarca(this)')); ?>
						</div>
						<div  class="col-md-3 col-xs-6">
							<?= $this->Form->input('modelo', array('id' =>'buscador-modelo-llantas' ,'class' => 'form-control', 'placeholder' => 'Modelo', 'style' => 'width: 200px', 'options' => $modelos_vehiculo, 'empty' => 'Modelo','data-tipo' => 'llantas', 'onChange' => 'changeModelo(this)')); ?>
						</div>
						<div class="col-md-3 col-xs-6">
							<?= $this->Form->input('version', array('id' =>'buscador-version-llantas' ,'class' => 'form-control', 'placeholder' => 'Version', 'style' => 'width: 200px', 'options' => $versiones_vehiculo, 'empty' => 'Versión','data-tipo' => 'llantas', 'onChange' => 'changeVersion(this)')); ?>
						</div>
						 <div  class="col-md-3 col-xs-6">
						 	<?= $this->Form->input('ano', array('id' =>'buscador-ano-llantas','class' => 'form-control', 'placeholder' => 'Año', 'style' => 'width: 200px', 'options' => $anos_vehiculo, 'empty' => 'Año','data-tipo' => 'llantas', 'onChange' => 'changeAno(this)')); ?>
						 </div>
					</div>
				</div>
				<div class="form-group" id="medidas-llantas">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<h4>Buscador de llantas</h4>
						<div class="col-md-6 col-xs-6">
							<?= $this->Form->input('aro', array('id' =>'buscador-aro-llantas','class' => 'form-control', 'placeholder' => 'Aro', 'style' => 'width: 200px', 'options' => $aros_llantas_vehiculos, 'empty' => 'Aro','data-tipo' => 'llantas', 'onChange' => 'changeAro(this)')); ?>
						</div>
						<div class="col-md-6 col-xs-6">
							<?= $this->Form->input('apernadura', array('id' =>'buscador-apernadura-llantas','class' => 'form-control', 'placeholder' => 'Apernadura', 'style' => 'width: 200px', 'options' => $apernaduras_vehiculos, 'empty' => 'Apernadura','data-tipo' => 'llantas')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 col-md-12 col-lg-5">
						<h4>Filtros</h4>
						 <div class="buscador-libre col-md-12 col-xs-12">
						 	<?= $this->Form->input('filtro', array('id' => 'buscador-filtro-llantas','class' => 'form-control', 'placeholder' => 'Escribe tu busqueda')); ?>
						 </div>
					</div>
				</div>
				<div class="contselect">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
						<button class="js-buscar-productos btn btn-default btn-buscar" onclick="return clickSearch(this)" data-tipo = 'llantas'>Buscar</button>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
