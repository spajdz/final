
    <div class="franja-search datos">
      <div class="container-fluid">
        <div class="col-lg-3">
          <h3><strong>Panel de Usuario  </strong></h3>
        </div>
        <div class="col-lg-3">
        <?= $this->Html->link(
          'Mis datos <i class="fa fa-angle-right"></i>',
          array('controller' => 'usuarios', 'action' => 'edit'),
          array('escape' => false, 'class' => ($this->params['controller'] == 'usuarios' ? 'active btn btn-default' : 'btn btn-default'))
        ); ?>          
        </div>
        <div class="col-lg-3">

        <?= $this->Html->link(
          'Mis direcciones <i class="fa fa-angle-right"></i>',
          array('controller' => 'direcciones', 'action' => 'index'),
          array('escape' => false, 'class' => ($this->params['controller'] == 'direcciones' ? 'active btn btn-default' : 'btn btn-default'))
        ); ?>          
        </div>
        <div class="col-lg-3">
      <?= $this->Html->link(
        'Mis compras <i class="fa fa-angle-right"></i>',
        array('controller' => 'compras', 'action' => 'index'),
        array('escape' => false, 'class' => ($this->params['controller'] == 'compras' ? 'active btn btn-default' : 'btn btn-default'))
      ); ?>          
        </div>

      </div>
    </div>  
    <div class="container-fluid datos-producto" >
      <div class="registro clearfix" style="margin-top: 0px">
        <div class="col-md-12">
          <?= $this->element('breadcrumbs'); ?>
        </div>
      </div>
    </div>      

    <div class="container-fluid interior">
      <div class="registro carro-page clearfix">
        

        <div class="col-md-12">
          <h4><strong>Datos de la Orden de Compra N° <?= $compra['Compra']['tbk_orden_compra']; ?></strong></h4>
        </div>
      </div>

      

          <div class="col-md-4 tabla-carro">
            <div class="modalidad clearfix">
              <p>| Datos Despacho</p>
            </div>   

            <div class="formulario-datos">

                <form class="form-horizontal">
                    <div class="form-group" >
                      <div class="col-lg-12">
                            <p><strong>Nombre:</strong>
                            <?= sprintf('%s %s %s', $compra['Usuario']['nombre'], $compra['Usuario']['apellido_paterno'], $compra['Usuario']['apellido_materno']); ?>
                            </p>                                
                      </div> 
                      <div class="col-lg-12">
                            <p><strong>Email:</strong> <?= $compra['Usuario']['email']; ?></p>                               
                      </div> 



                    <? if ( ! empty($compra['Direccion']['id']) ) : ?>


                          <div class="col-lg-12">
                                <p><strong>Dirección:</strong> 
                                    <?= sprintf('%s %s %s', $compra['Direccion']['calle'], $compra['Direccion']['numero'], $compra['Direccion']['depto']); ?>
                                </p>                               
                          </div> 

                          <div class="col-lg-12">
                                <p><strong>Comuna:</strong> <?= $compra['Direccion']['Comuna']['nombre']; ?></p>                             
                          </div> 

                          <div class="col-lg-12">
                                <p><strong>Comuna:</strong> <?= $compra['Direccion']['Comuna']['nombre']; ?></p>                             
                          </div> 

                          <div class="col-lg-12">
                                <p><strong>Región:</strong> <?= $compra['Direccion']['Comuna']['Region']['nombre']; ?></p>
                          </div> 

                          <div class="col-lg-12">
                                <p><strong>Teléfono:</strong> <?= vsprintf('%d %d%d%d %d%d%d', str_split($compra['Direccion']['telefono'])); ?></p>
                          </div> 
 

                    <? endif; ?>


                      <div class="col-lg-12">
                            <p><strong>Estado de Compra:</strong> <?= $compra['EstadoCompra']['nombre']; ?></p>
                      </div> 
                      <div class="col-lg-12">
                            <p><strong>Fecha:</strong> <?= $compra['Compra']['created']; ?></p>
                      </div> 
                    </div>
                </form>                            

            </div>
          </div>

          <!-- tabla -->
          <div class="col-md-8 tabla-carro" id="no-more-tables">

            <div class="col-md-12 tabla-carro" id="no-more-tables">

           
          <table class="col-md-12 table-bordered table-condensed cf">
            <thead class="cf">
              <tr>
                <th class="table-left">Imagen</th>
                <th class="table-left">Nombre</th>
                <th class="table-left">Modalidad</th>
                <th class="table-left">Precio</th>
                <th class="table-left">Cantidad</th>
                <th class="table-left">Subtotal</th>                
              </tr>
            </thead>
            <tbody>

 
        <? foreach ( $compra['DetalleCompra'] as $detalle ) : ?>

            <tr class="js-contenedor-producto">
                <td data-title="Imagen:" >
                    <?= $this->Html->image($this->App->imagen($detalle['Producto']['sku'], true), array('class' => 'img-responsive fotomini', 'alt' => $detalle['Producto']['nombre'])); ?>
                </td>
                <td data-title="Nombre:">
                    <?= $detalle['Producto']['descripcion']; ?>


                </td>
                <td data-title="Modalidad:">
                    <span class="label label-success">Venta</span>
                </td>
                <td data-title="Precio:" class="precio">
                   <? $precio = $detalle['Producto']['precio_publico'];?>
                  <? $preciofinal = $detalle['Producto']['preciofinal_publico'];?>
                  <? $dcto = $detalle['Producto']['dcto_publico'];?>
                  <? $oferta = $detalle['Producto']['oferta_publico']?>
                  <?if($esMayorista):?>
                    <? $precio = $detalle['Producto']['precio_mayorista'];?>
                    <? $preciofinal = $detalle['Producto']['preciofinal_mayorista'];?>
                    <? $dcto = $detalle['Producto']['dcto_mayorista'];?>
                    <? $oferta = $detalle['Producto']['oferta_mayorsta']?>
                  <?endif;?>

                  
                    <span class="valor">$<?= number_format($preciofinal, 0, null, '.'); ?></span>
                </td>
                <td data-title="Cantidad:"><?= $detalle['cantidad']; ?></td>
                <td data-title="Subtotal:" class="precio js-producto-subtotal">
                    $<?= number_format($detalle['total'], 0, null, '.'); ?>

                </td>
            </tr>
            <? endforeach; ?>

            </tbody>
          </table>
          <div class="col-sm-3">
            <div class="bg-table">
                <p>Subtotal : $<?= number_format($compra['Compra']['subtotal'], 0, null, '.'); ?></p>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="bg-table">
            
                <p>Despacho: <span class="">Valor Contra entrega</span></p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="bg-table">
                <?
                    $Totalneto = $compra['Compra']['total']/1.19;
                    $iva = $Totalneto * 0.19;
                ?> 

                <?
                if($esMayorista){
                ?> 
                <p>Total neto: $<?= number_format($Totalneto, 0, null, '.'); ?></p>                
                <p>Total iva: $<?= number_format($iva, 0, null, '.'); ?></p>  
                <?
                }
                ?>              
                <p>Total compra: $<?= number_format($compra['Compra']['total'], 0, null, '.'); ?></p>                
            </div>
          </div>
       

          </div>


          </div>
</div>
      



