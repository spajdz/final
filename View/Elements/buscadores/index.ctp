<div id="buscadorFiltros">
	<div class="row">
		<div id="buscador-header" class="col-xs-12 col-md-12 col-lg-12">
			<?= $this->Form->create('Producto', array('url' => '/filtros', 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'ProductoFiltroForm')); ?>

				<?= $this->Form->input('categoria', array( 'type' => 'hidden', 'value' => $categoria, 'id' => 'buscador-categoria-index-'.$categoria)); ?>
				
				<?if($categoria == 'neumaticos' || $categoria == 'llantas'):?>
					<div class="form-group">
						<div class="col-sm-7 col-md-7 col-lg-4">
							<h4>Por modelo de vehículo</h4>
							<div class="col-md-3 col-xs-6">
								<?= $this->Form->input('marca', array('id' =>'buscador-marca-index-'.$categoria ,  'class' => 'form-control', 'placeholder' => 'Marca', 'style' => 'width: 200px', 'options' => $marcas_vehiculo, 'empty' => 'Marca','data-tipo' => 'index-'.$categoria , 'onChange' => 'changeMarca(this)')); ?>
							</div>
							<div  class="col-md-3 col-xs-6">
								<?= $this->Form->input('modelo', array('id' =>'buscador-modelo-index-'.$categoria ,'class' => 'form-control', 'placeholder' => 'Modelo', 'style' => 'width: 200px', 'options' => $modelos_vehiculo, 'empty' => 'Modelo','data-tipo' => 'index-'.$categoria , 'onChange' => 'changeModelo(this)')); ?>
							</div>

							<div class="col-md-3 col-xs-6">
								<?= $this->Form->input('version', array('id' =>'buscador-version-index-'.$categoria ,'class' => 'form-control', 'placeholder' => 'Version', 'style' => 'width: 200px', 'options' => $versiones_vehiculo, 'empty' => 'Versión','data-tipo' => 'index-'.$categoria , 'onChange' => 'changeVersion(this)')); ?>
							</div>
							 <div  class="col-md-3 col-xs-6">
							 	<?= $this->Form->input('ano', array('id' =>'buscador-ano-index-'.$categoria,'class' => 'form-control', 'placeholder' => 'Año', 'style' => 'width: 200px', 'options' => $anos_vehiculo, 'empty' => 'Año','data-tipo' => 'index-'.$categoria , 'onChange' => 'changeAno(this)')); ?>
							 </div>
						</div>
					</div>
					<div class="form-group" >
						<div class="col-sm-3 col-md-3 col-lg-3">
							<h4>Buscador de <?=$categoria ?></h4>
							<?if($categoria == 'neumaticos'):?>
								<div class="col-md-4 col-xs-4">
		                            <?= $this->Form->input('ancho', array('id' => 'buscador-ancho-index-'.$categoria,'class' => 'form-control input-md', 'placeholder' => 'Ancho', 'options' => $anchos_neumaticos, 'empty' => 'Ancho', 'data-tipo' => 'index-'.$categoria,'onChange' => 'changeAncho(this)')); ?>
		                        </div>
		                        <div class="col-md-4 col-xs-4">
	                            <?= $this->Form->input('perfil', array('id' => 'buscador-perfil-index-'.$categoria, 'class' => 'form-control input-md', 'placeholder' => 'Perfil', 'options' => $perfiles_vehiculos, 'empty' => 'Perfil','data-tipo' => 'index-'.$categoria, 'onChange' => 'changePerfil(this)')); ?>
	                        </div>
							<?endif;?>

							<div class="<?=($categoria == 'neumaticos') ? 'col-md-4 col-xs-4' : 'col-md-6 col-xs-6' ?>">
								<?= $this->Form->input('aro', array('id' =>'buscador-aro-index-'.$categoria,'class' => 'form-control', 'placeholder' => 'Aro', 'style' => 'width: 200px', 'options' => $aros_llantas_vehiculos, 'empty' => 'Aro','data-tipo' => 'index-'.$categoria , 'onChange' => 'changeAro(this)')); ?>
							</div>
							<?if($categoria == 'llantas'):?>
								<div class="col-md-6 col-xs-6">
									<?= $this->Form->input('apernadura', array('id' =>'buscador-apernadura-index-'.$categoria,'class' => 'form-control', 'placeholder' => 'Apernadura', 'style' => 'width: 200px', 'options' => $apernaduras_vehiculos, 'empty' => 'Apernadura','data-tipo' => 'index-'.$categoria )); ?>
								</div>
							<?endif;?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-5 col-md-5 col-lg-5">
							<h4>Filtros</h4>
							 <div class="buscador-libre col-md-9 col-xs-12">
							 	<?= $this->Form->input('filtro', array('id' => 'buscador-filtro-index-'.$categoria,'class' => 'form-control', 'placeholder' => 'Escribe tu busqueda')); ?>
							 </div>
							 <div class="col-md-3 col-xs-12 col-md-6 div-buscar">
								<button class="js-buscar-productos btn btn-default btn-buscar" onclick="return clickSearch(this)" data-tipo = 'index-<?=$categoria?>'>Buscar</button>
							</div>
						</div>
					</div>
				<?endif;?>

				<?if($categoria == 'accesorios'):?>
					<div class="form-group">
						<div class="col-sm-12 col-md-6 col-lg-6">
							<h4>Estoy buscando</h4>
							<div id="item-search" class="col-md-7 col-sm-6 col-xs-12">
								<?= $this->Form->input('filtro', array('id' => 'buscador-filtro-accesorios', 'class' => 'form-control input-md', 'placeholder' => 'Escribe tu busqueda')); ?>
							</div>
							<div class="boton col-lg-2 col-md-2 col-sm-2 col-xs-12 div-buscar"> 
								<button class="js-buscar-productos btn btn-default btn-buscar btn-accesorios">Buscar</button>
							</div>
						</div>
					</div>
				<?endif;?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
