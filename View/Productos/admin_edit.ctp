<?= $this->Html->script(array('admin_productos'), array('inline' => false)); ?>
<div class="page-title">
    <h2><span class="fa fa-list"></span> Productos</h2>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Editar Producto</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <?= $this->Form->create('Producto', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
                <table class="table">
                    <?= $this->Form->input('id'); ?>
                    <tr> 
                        <th><?= $this->Form->label('activo', 'Producto activo'); ?></th>
                        <td><label class="switch">
                            <?= $this->Form->input('activo', array('type' => 'checkbox'));?>
                            <span></span>
                        </label>
                        </td>                       
                    </tr> 
                    <tr> 
                        <th><?= $this->Form->label('marca', 'Marca'); ?></th>
                        <td><?= $this->Form->input('marca', array('class' => 'form-control', 'style' => 'color:#000' ,'disabled' => true, 'value' => $this->request->data['Marca']['nombre'])); ?></td>
                    </tr>

 
                    <tr>
                        <th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
                        <td><?= $this->Form->input('nombre', array('class' => 'form-control','style' => 'color:#000' ,'disabled' => true)); ?></td>
                    </tr>
 
                    <tr>
                        <th><?= $this->Form->label('descripcion_ficha', 'Descripción completa'); ?></th>
                        <td><?= $this->Form->input('descripcion_ficha', array( 'class' => 'js-summernote')); ?></td>      
                    </tr> 
                    <tr>
                        <th><?= $this->Form->label('categoria', 'Categoría'); ?></th>
                        <td><?= $this->Form->input('categoria', array('class' => 'form-control select', 'disabled' => true, 'style' => 'color:#000', 'value' => $this->request->data['Categoria']['nombre'])); ?></td>
                    </tr> 

                    <tr> 
                        <th><?= $this->Form->label('sku', 'Sku'); ?></th>
                        <td><?= $this->Form->input('sku' , array('class' => 'form-control', 'disabled' => true,'style' => 'color:#000',)); ?></td>
                        <td><?= $this->Form->input('sku' , array('class' => 'form-control', 'type' => 'hidden')); ?></td>
                    </tr> 
                    <tr>
                        <th><?= $this->Form->label('preciofinal_publico', 'Precio Público'); ?></th>
                        <td><?= $this->Form->input('preciofinal_publico', array('class' => 'form-control','style' => 'color:#000', 'disabled' => true)); ?></td>
                    </tr>

                    <tr>
                        <th><label>Agregue Imágenes</label></th>
                        <td>
                            <table class="table" id="lista-imagenes">
                                <tr>
                                    <td></td>
                                    <td align="right"><a class="btn btn-success" onclick="Admin_Imagenes_AgregarOtraImagen();" title="Agregar Otra Imagen"><i class="fa fa-plus"></i> Agregar Otra</a></td>
                                </tr>
                                    <td><?= $this->Form->input('ImagenProducto.0.imagen', array('data-model' => 'ImagenProducto', 'data-field' => 'portada', 'type' => 'file', 'class' => '')); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Imágenes Actuales</label></th>
                        <td>

                            <table class="table">
                                <tr>
                                    <td>
                                        <?php
                                            if (count($ImagenesAsociadas) > 0) {
                                                for ($i = 0; $i < count($ImagenesAsociadas); $i++) {
                                                    echo "<div class='col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center'>";
                                                    echo "  <div>";
                                                    echo $this->Html->image($ImagenesAsociadas[$i]['ImagenProducto']['imagen']['chica']);
                                                    echo "  </div>";
                                                    echo "  <div>";
                                                    echo "      <a class='btn btn-xs btn-danger' title='Eliminar esta imagen' onclick='Admin_Imagenes_EliminarImagen(this, " .$ImagenesAsociadas[$i]['ImagenProducto']['id']. ");'><i class='fa fa-remove'></i> Eliminar</a>";
                                                    echo "  </div>";
                                                    echo "</div>";
                                                }
                                            }
                                            else {
                                                echo "<p class='btn-danger'>No existen imágenes asociadas al producto.</p>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>

                            <input type="hidden" id="imageneseliminadas" name="imageneseliminadas" value="" />

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("input#imageneseliminadas").val("");
                                });
                            </script>
                        </td>
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
