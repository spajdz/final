<? $this->set(compact('tipo_header')); ?>
<?= $this->element('productos/pasos-compra'); ?>       

<div class="container-fluid interior">
  <div class="registro carro-page clearfix">
    <div class="col-md-4">
      <h4><strong>Datos de la Orden de Compra N° <?= $compra['Compra']['id']; ?></strong></h4>
    </div>
    <? if ($esMayorista):?>               
      <div class="col-md-8">
        <h4><strong>Comprador mayorista <?=$_SESSION['Auth']['Usuario']['nombre'].' '.$_SESSION['Auth']['Usuario']['apellido_paterno'].' '.$_SESSION['Auth']['Usuario']['apellido_materno']?></strong></h4>
      </div>
    <? endif; ?>
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

  <div class="col-md-8 tabla-carro" id="no-more-tables">
          <table class="col-md-12 table-bordered table-condensed cf">
            <thead class="cf">
              <tr>
                <th class="table-left hidden-xs">Imagen</th>
                <th class="table-left">Nombre</th>
                <th class="table-left hidden-xs">Modalidad</th>
                <th class="table-left">Precio</th>
                <th class="table-left">Cantidad</th>
                <th class="table-left hidden-xs">Subtotal</th>                
              </tr>
            </thead>
            <tbody>

  
        <? foreach ( $compra['DetalleCompra'] as $detalle ) : ?>
      
            <tr class="js-contenedor-producto">
                <td data-title="Imagen:" class="hidden-xs">
                    <?= $this->Html->image($this->App->imagen($detalle['Producto']['sku'], true), array('class' => 'img-responsive fotomini', 'alt' => $detalle['Producto']['nombre'])); ?>
                </td>
                <td data-title="Nombre:">
                    <?= $detalle['Producto']['descripcion']; ?>


                </td>
                <td data-title="Modalidad:" class="hidden-xs">
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

                  $<?= number_format($preciofinal, 0, null, '.'); ?>
                </td>
                <td data-title="Cantidad:"><?= $detalle['cantidad']; ?></td>
                <td data-title="Subtotal:" class="precio js-producto-subtotal hidden-xs">
                    $<?= number_format(( $detalle['total']), 0, null, '.'); ?>
                        <?//= number_format($detalle['ubtotal'], 0, '', '.'); ?>

                </td>
            </tr>
        <? endforeach; ?>


            </tbody>
          </table>
          <div class="col-sm-8">
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




          

        <?



                    //tipo de usuario
                    if (isset($_SESSION['Auth']['Usuario']['usuario_tipo_id'])) {
                        $TipoUsuario = $_SESSION['Auth']['Usuario']['usuario_tipo_id'];
                    }
                    else {
                        $TipoUsuario = 1;
                    }



                    //tipo de usuario
                    if ($TipoUsuario != 1) { 
                                


                    ?>        

                        <div class="pull-right actualizar">


                            <div class="col-sm-3">
                                <?= $this->Html->link('<< volver', array('controller' => 'direcciones', 'action' => 'add'), array('class' => 'actualizar-carro')); ?>
                            </div>    



                            <div class="col-sm-6 col-md-offset-3">
                                <?= $this->Form->create('Compra', array(
                                    'url' => array('controller' => 'compras', 'action' => 'vendedor'),                        
                                    'class' => 'form-horizontal',
                                    'type' => 'file',
                                    'inputDefaults' => array('label' => false,'div' => false)
                                    )
                                ); ?>   


                                    <span id="tipopagoheader" class="input-group-addon"><span class="fa fa-search"></span> Medios de pago autorizados</span>    
                                    <?= $this->Form->input('tipoPago', array(
                                            'data-tipo'     => 'tipoPago',
                                            'options'       => $TipoPagos,
                                            'multiple'      => false,
                                            'selected'      => 0,
                                            'class'         => 'form-control',
                                            'title'         => '-- Selecciona Medio de pago'
                                        )
                                    ); ?> 


                                    <br>                       
                                    <span id="tipopagoheader" class="input-group-addon"> Comentario</span>    
                                    <?= $this->Form->textarea('comentario', array('class' => 'form-control', 'placeholder' => 'Ingrese comentario', 'row' => 65, 'cols' => 50 ));?>
                                    <br>                        

                                    <button type="submit" class="seleccion" >Finalizar compra</button>
                                <?= $this->Form->end(); ?>
                            </div>    

                        </div> 

                    <?




                    }else{


                     
        ?>                
                        <div class="pull-right actualizar">
                            <div class="text-right">
                                <?= $this->Html->image('logo-webpay.jpg', array('class' => 'logo-webpay')); ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $this->Html->link('<< volver', array('controller' => 'direcciones', 'action' => 'add'), array('class' => 'actualizar-carro')); ?>
                            </div> 
                            <div class="col-sm-6 col-md-offset-3">
                           

                                <?= $this->Form->create('Compra', array(
                                    'url' => array('controller' => 'compras', 'action' => 'vendedor'),                        
                                    'class' => 'form-horizontal',
                                    'type' => 'file',
                                    'inputDefaults' => array('label' => false,'div' => false)
                                    )
                                ); ?>   

                                    <span id="tipopagoheader" class="input-group-addon"><span class="fa fa-search"></span> Medios de pago autorizados</span>    
                                    <?= $this->Form->input('tipoPago', array(
                                            'data-tipo'     => 'tipoPago',
                                            'options'       => $TipoPagos,
                                            'multiple'      => false,
                                            'selected'      => 0,
                                            'class'         => 'form-control',
                                            'title'         => '-- Selecciona Medio de pago'
                                        )
                                    ); ?> 

                                    <?= $this->Form->textarea('comentario', array('class' => 'hidden'));?>

                                    <br>                        

                                    <button type="submit" class="seleccion" >Finalizar compra</button>
                                <?= $this->Form->end(); ?>
                            </div> 


                        </div> 

        <?
                    }

        ?> 






       
     <div class="detalles">
      <p>Los envíos son realizados bajo la modalidad  "Envió Por pagar". Es decir tu cancelas el valor del envió al retirar o recibir tus productos.</p>
      <p>Dentro de la Región Metropolitana se utiliza el sistema retiro en tienda o de lo contrario debe ser especificado el envió por pagar</p>
      <p>El envió de los productos es  aprox. dentro de 48 hrs. una vez confirmado todos los datos.</p>
      <p>Si cancelas tu pedido vía transferencia, puedes retirarlo en una de nuestras sucursales cuando te hagamos llegar un mail verificando su retiro.</p>
    </div> 

  </div>
</div>
      





