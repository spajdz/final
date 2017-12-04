<div class="page-title">
	<h2><span class="fa fa-bullhorn"></span> Novedades</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo novedad</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Novedad', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('titulo', 'Titulo'); ?></th>
						<td><?= $this->Form->input('titulo'); ?></td>
					</tr>
					<!-- IMAGEN_DESTACADA -->
					<tr class="control-group">
						<th><?= $this->Form->label('imagen_destacada', 'Imagen Destacada', array('class' => 'control-label')); ?></th>
						<td><?= $this->Form->input('imagen_destacada', array('required' => false, 'type' => 'file', 'class' => '')); ?></td>
					</tr>
					<!-- IMAGEN -->
					<tr class="control-group">
						<th><?= $this->Form->label('imagen', 'Imagen', array('class' => 'control-label')); ?></th>
						<td><?= $this->Form->input('imagen', array('required' => false,'type' => 'file', 'class' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('texto', 'Texto'); ?></th>
						<td><?= $this->Form->input('texto', array('required' => false, 'class' => 'form-control js-summernote')); ?></td>
					</tr>
				</table>

				<div class="pull-right">
					<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
					<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
