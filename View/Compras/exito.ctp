<? $this->set(compact('tipo_header')); ?>
<?= $this->element('productos/pasos-compra'); ?>           


<div class="container-fluid interior">
  <div class="registro carro-page clearfix">
    <div class="col-md-12">
      <h4><strong>Finalizar Compra | Datos de la Compra </strong></h4>
    </div>
  </div>
      <!-- tabla -->
      <div class="col-md-12 tabla-carro">
        <div class="felicidades clearfix">
          <h5><strong>¡Felicidades!</strong></h5>
          <p><?= $compra['Usuario']['nombre']; ?>.</p>
          <p>Se ha realizado su compra de manera satisfactoria.</p>
          <p>En instantes recibirás el comprobante de compra en tu correo electrónico.</p>
          <p>Si tienes alguna pregunta sobre la <strong>Orden de Compra N° <?= $compra['Compra']['tbk_orden_compra']; ?></strong>, por favor <?= $this->Html->link('contactenos', array('controller' => 'contacto', 'action' => 'index')); ?></p>
          <p><?= $this->Html->link('Volver a la tienda', array('controller' => 'productos', 'action' => 'home'), array('class' => 'volver-tienda')); ?></p>
        </div>
      </div>

          <div class="col-md-6 tabla-carro">
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
                      <p><strong>Email:</strong> <?= $compra['Usuario']['email']; ?></p>                               

                  <? if ( ! empty($compra['Direccion']['id']) ) : ?>

                    <p><strong>Dirección:</strong>
                      <?= sprintf('%s %s %s', $compra['Direccion']['calle'], $compra['Direccion']['numero'], $compra['Direccion']['depto']); ?>
                    </p>                               
                    <p><strong>Comuna:</strong> <?= $compra['Direccion']['Comuna']['nombre']; ?></p>                             
                    <p><strong>Comuna:</strong> <?= $compra['Direccion']['Comuna']['nombre']; ?></p>                             
                    <p><strong>Región:</strong> <?= $compra['Direccion']['Comuna']['Region']['nombre']; ?></p>
                    <p><strong>Teléfono:</strong> <?= vsprintf('%d %d%d%d %d%d%d', str_split($compra['Direccion']['telefono'])); ?></p>
                    <?/*<p><strong>Código Postal:</strong> <?= $compra['Direccion']['codigo_postal']; ?></p>*/?>

                  <? endif; ?>


                    <p><strong>Estado de Compra:</strong> <?= $compra['EstadoCompra']['nombre']; ?></p>
                    <p><strong>Fecha:</strong> <?= $compra['Compra']['created']; ?></p> 
                  </div>
                </div>
              </form>                            

            </div>
          </div>



          <div class="col-md-6 tabla-carro">
            <div class="modalidad clearfix">
              <p>| Información del pago</p>
            </div>   
            <div class="formulario-datos">
              <form class="form-horizontal">
                  <div class="form-group" >
                    <div class="col-lg-12">
                      <p><span>Método de pago:</span> Webpay Transbank</p>                              
                      <p><span>Moneda de pago:</span> Pesos Chilenos (CLP)</p> 
                      <p><span>Tipo de Transacción:</span> Venta</p>
                      <p><span>Nombre comercio:</span> ZS Motor.</p>
                      <p><span>URL comercio:</span> <?= Router::url('/', true); ?></p>
                      <p><span>Resultado transacción:</span> <span class="label label-success">Aprobada</span></p>
                      <p><span>Orden de compra N°:</span> <?= $compra['Compra']['id']; ?></p>
                      <p><span>Código de autorización:</span> <?= $compra['Compra']['tbk_codigo_autorizacion']; ?></p>
                      <p><span>Fecha:</span> <?= $compra['Compra']['tbk_fecha_transaccion']; ?> <?= $compra['Compra']['tbk_hora_transaccion']; ?></p>
                      <p><span>Número de tarjeta:</span> **** **** **** <?= $compra['Compra']['tbk_final_numero_tarjeta']; ?></p>
                      <p><span>Tipo de Pago:</span> <?= $compra['Compra']['tipo_pago']; ?></p>
                      <p><span>Tipo de Cuotas:</span> <?= $compra['Compra']['tipo_cuota']; ?></p>
                      <p><span>Número Cuotas:</span> <?= (empty($compra['Compra']['tbk_numero_cuotas']) ? '00' : $compra['Compra']['tbk_numero_cuotas']); ?></p>
                    </div> 
                  </div>
              </form>                            
          </div>  
          </div>

          <!-- tabla -->
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

          <!-- ./resumen compra -->
</div>
      



<script>
ga('ecommerce:addTransaction', {
  id: '<?= $compra['Compra']['id']; ?>',
  revenue: '<?= number_format($compra['Compra']['total'], 0, '', '.'); ?>',
  shipping: '<?= number_format($compra['Compra']['total_despacho'], 0, '', '.'); ?>',
  currency: 'CLP'
});
ga('ecommerce:send');
</script> 
