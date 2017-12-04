<div id="buscadorHome">
	<div class="row" id="neumaticos">
		<div id="buscador-header" class="col-xs-12 col-md-12 col-lg-12">
			<?= $this->Form->create('Producto', array('url' => '/filtros' , 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'ProductoFiltroForm')); ?>
				<?= $this->Form->input('categoria', array('type' => 'hidden', 'value' => 'neumaticos', 'id' => 'buscador-categoria-neumaticos')); ?>
				<div class="form-group">
					<div class="col-sm-7 col-md-7 col-lg-4">
						<h4>Por modelo de vehículo</h4>
						<div class="col-md-3 col-xs-6">
							<?= $this->Form->input('marca', array('id' =>'buscador-marca-neumaticos' ,  'class' => 'form-control input-md', 'placeholder' => 'Marca', 'options' => $marcas_vehiculo, 'empty' => 'Marca', 'data-tipo' => 'neumaticos', 'onChange' => 'changeMarca(this)')); ?>
						</div>
						<div class="col-md-3 col-xs-6">
							<?= $this->Form->input('modelo', array('id' =>'buscador-modelo-neumaticos' ,'class' => 'form-control input-md', 'placeholder' => 'Modelo', 'options' => $modelos_vehiculo, 'data-tipo' => 'neumaticos', 'data-tipo' => 'neumaticos','onChange' => 'changeModelo(this)')); ?>
						</div>
						<div class="col-md-3 col-xs-6">
							<?= $this->Form->input('version', array('id' =>'buscador-version-neumaticos' ,'class' => 'form-control input-md', 'placeholder' => 'Version', 'options' => $versiones_vehiculo, 'data-tipo' => 'neumaticos','data-tipo' => 'neumaticos', 'onChange' => 'changeVersion(this)')); ?>
						</div>
						<div class="col-md-3 col-xs-6">
							<?= $this->Form->input('ano', array('id' =>'buscador-ano-neumaticos','class' => 'form-control input-md', 'placeholder' => 'Año', 'options' => $anos_vehiculo, 'data-tipo' => 'neumaticos', 'data-tipo' => 'neumaticos','onChange' => 'changeAno(this)')); ?>
						</div>
					</div>
				</div>

				<div class="form-group" id="medidas-neumaticos">
					<div class="col-sm-5 col-md-5 col-lg-3">
						<h4>Buscador de neumáticos</h4>
						<div class="col-md-4 col-xs-4">
                            <?= $this->Form->input('ancho', array('id' => 'buscador-ancho-neumaticos','class' => 'form-control input-md', 'placeholder' => 'Ancho', 'options' => $anchos_neumaticos, 'empty' => 'Ancho', 'data-tipo' => 'neumaticos','onChange' => 'changeAncho(this)')); ?>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <?= $this->Form->input('perfil', array('id' => 'buscador-perfil-neumaticos', 'class' => 'form-control input-md', 'placeholder' => 'Perfil', 'options' => $perfiles_vehiculos, 'empty' => 'Perfil','data-tipo' => 'neumaticos', 'onChange' => 'changePerfil(this)')); ?>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <?= $this->Form->input('aro', array('id' => 'buscador-aro-neumaticos', 'class' => 'form-control input-md', 'placeholder' => 'Aro', 'options' => $aros_vehiculos, 'empty' => 'Aro', 'data-tipo' => 'neumaticos','onChange' => 'changeAro(this)')); ?>
                        </div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12 col-md-12 col-lg-5">
						<h4>Filtros</h4>
						<div class="buscador-libre col-md-12 col-xs-12">
							<?= $this->Form->input('filtro', array('id' => 'buscador-filtro-neumaticos','class' => 'form-control input-md', 'placeholder' => 'Escribe tu busqueda')); ?>
						</div>
					</div>
				</div>

				<div class="contselect">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
						<button class="js-buscar-productos btn btn-default btn-buscar" onclick="return clickSearch(this)" data-tipo = 'neumaticos'>Buscar</button>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>