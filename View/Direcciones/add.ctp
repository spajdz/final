<?= $this->Html->script(array('productos.carro', 'direcciones.add'), array('inline' => false)) ;?>
<? $this->set(compact('tipo_header')); ?>
<?= $this->element('productos/pasos-compra'); ?>
    
<div class="container-fluid interior">
  <div class="registro carro-page clearfix">
    <div class="col-md-12">
      <h4><strong>Retiro / Despacho</strong></h4>
    </div>
  </div>

  <div class="col-md-12">
    <div class="col-md-3 tabla-carro">
      <div class="modalidad clearfix">
        <p>* Selecciona despacho </p>
      </div>      
      <div class="formulario-datos">

        <form class="form-horizontal">
          <div class="form-group">
            <div class="col-md-6">
                <select class="form-control" id="selectDespacho">
                    <option value="1">Retiro en tienda</option>
                    <option value="2">Despacho en domicilio </option>
                </select>
            </div>
          </div>
        </form>

      </div>
    </div>

    <? /**RETIRO SUCURSAL*/?>

    <div id="retiroSucursal">
      <div class="col-md-9 tabla-carro">
        <div class="modalidad clearfix">
          <p>| Retiro en tienda</p>
        </div>      
        <div class="formulario-datos">
          <?= 
            $this->Form->create('Sucursal', array(
              'class' => 'form-horizontal',
              'type' => 'post',
              'inputDefaults' => array('label' => false,'div' => false)
              ));
          ?>  
            
          <div class="form-group" >
              <div class="col-lg-6">
                <p>Selecciona la sucursal mas cercana</p>
                <?= $this->Form->input('sucursal_id', array(
                    'options'       => $sucursales,
                    'multiple'      => false,
                    'class'         => 'form-control',
                    'title'         => '-- Selecciona sucursal'
                    )
                ); ?>                                   
              </div> 
          </div>

          <div class="actualizar">
            <?= $this->Html->link('<< volver', array('controller' => 'productos', 'action' => 'carro'), array('class' => 'actualizar-carro')); ?>
            <?= $this->Form->submit('Ir a Finalizar compra >>', array('class' => 'seleccion', 'div' => false)); ?>
          </div> 
        <?= $this->Form->end(); ?> 

        </div>
      </div>
    </div>

    <? /**DESPACHO DOMICILIO*/?>
    <div id="despachoDomicilio" style="display: none">
      <div class="col-md-9 tabla-carro">
        <div class="modalidad clearfix">
          <p>| Despacho en domicilio</p>
        </div>      
        <div class="formulario-datos">

 
              <?= $this->Form->create('Direccion', array(
                          'class' => 'form-horizontal',
                          'type' => 'post',
                          'inputDefaults' => array('label' => false,'div' => false)
                          )
                        );
                  ?>  

                  
                <? if ( ! empty($direcciones) ) : ?>
                  <div class="form-group" >
                      <div class="col-lg-12">
                        <p>Enviamos a tu dirección favorita</p>                        
                        <?= $this->Form->input('id', array('type' => 'select', 'options' => $direcciones, 'class' => 'form-control', 'empty' => '-- Selecciona una dirección', 'div' => false, 'label' => false)); ?>                                 
                      </div> 
                  </div>
                <? endif; ?> 



                <div class="form-group" >
                    <div class="col-lg-12">
                      <p>Ingresa tu dirección</p>                        
                    </div>
                    <div class="col-lg-12">
                      <?= $this->Form->input('tipo_direccion_id', array('class' => 'form-control')); ?>                              
                    </div> 
                 
                    <div class="col-lg-6">
                      <?= $this->Form->input('calle', array('placeholder' => '*Calle', 'class' => 'form-control')); ?>          
                    </div> 
                 
                    <div class="col-lg-6">          
                      <?= $this->Form->input('numero', array('placeholder' => '*Numero', 'class' => 'form-control')); ?>
                    </div> 
                 
                    <div class="col-lg-6">          
                      <?= $this->Form->input('depto', array('placeholder' => 'Casa o Dpto', 'class' => 'form-control')); ?>
                    </div>  
                 
                    <div class="col-lg-6">          
                      <?= $this->Form->input('telefono', array('type' => 'text', 'maxlength' => 10,'placeholder' => '*Telefono', 'class' => 'form-control')); ?>
                    </div> 

                    <div class="col-lg-6">          
                      <?= $this->Form->input('region_id', array('empty' => '-- Selecciona una región', 'class' => 'form-control')); ?>
                    </div> 

                    <div class="col-lg-6">          
                      <?= $this->Form->input('comuna_id', array('empty' => '-- Selecciona una comuna', 'class' => 'form-control')); ?>
                    </div> 

                    <div class="col-lg-6">          
                      <?= $this->Form->input('observaciones', array('type' => 'text', 'maxlength' => 500, 'placeholder' => 'Especificar empresa de despacho', 'class' => 'form-control')); ?>
                    </div> 
                    <?/*
                    <div class="col-lg-6">          
                      <?= $this->Form->input('codigo_postal', array('type' => 'text', 'maxlength' => 7, 'placeholder' => '*Código postal', 'class' => 'form-control')); ?>
                        <p class="help-block">Si quieres conocer tu código postal, <a href="http://www.correos.cl/SitePages/codigo_postal/codigo_postal.aspx" target="_blank">haz click aquí</a>
                        </p>
                    </div>
                    <div class="col-lg-12">          
                      <p><br><strong>Valor Despacho:</strong> <span class="js-valor-despacho"></span>
                        <span class="js-observacion direccion-add-observacion"></span>
                      </p>
                      <?= $this->Form->input('total_despacho', array('type' => 'hidden', 'class' => 'total-despacho-js', 'value' => 0)); ?>
                    </div> 
                    */?>

                </div>

                <div class="form-group" >
                    <div class="col-lg-12" id="texto-legal-flete">
                      <div class="warning">
                          <h5><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Importante </strong></h5>
                          <p>Este valor se gestionara <strong>por pagar </strong>.</p>

                            <?= $this->Form->input('por_pagar', array(
                                    'type' => 'checkbox',
                                    'class' =>  'js-acpetar-pagar-flete'
                                )); ?>
                            <p>estoy de acuerdo</p>

                            <p>(Recuerde que si no especifica empresa de despacho, enviaremos por nuestro proveedor.)</p>
                      </div>
                    </div>
                </div>


                <div class="pull-right actualizar">
                  <?= $this->Html->link('<< volver', array('controller' => 'productos', 'action' => 'carro'), array('class' => 'actualizar-carro')); ?>
                  <?= $this->Form->submit('Ir a Finalizar compra >>', array('class' => 'seleccion', 'div' => false)); ?>
                </div> 

              
            <?= $this->Form->end(); ?> 

        </div>
      </div>
    </div>

  </div>






  <!-- tabla -->
  <div class="col-md-12 tabla-carro" id="no-more-tables">

    <div class="col-md-12 tabla-carro" id="no-more-tables">
      <table class="col-md-12 table-bordered table-condensed cf">
        <thead class="cf">
          <tr>
            <th class="numeric" class="hidden-xs">Imagen</th>
            <th class="numeric table-left">Producto</th>
            <th class="numeric">Cantidad</th>
            <th class="numeric">Precio Unitario</th>
            <th class="numeric">Subtotal</th>
            <th class="numeric">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ( $productos as $catalogo => $data ) : ?>
          <? foreach ( $data['Productos'] as $producto ) : ?>
          <tr class="js-contenedor-producto">
            <td data-title="Imagen:" class="hidden-xs">
              <?= $this->Html->image($this->App->imagen($producto['Data']['Producto']['sku'], true), array('class' => 'img-responsive img-carro')); ?>
            </td>
            <td data-title="Nombre:">
              <?= h($producto['Data']['Producto']['nombre']); ?><br>
              SKU: <?= h($producto['Data']['Producto']['sku']); ?>
            </td>
            <td data-title="Cantidad:">
              <? 
                $n = 100;
                if($esMayorista){
                  $n = 1000;
                }
                $select = array();
              ?>

              <? for($i=1;$i<=$n;$i++): ?>
                  <? $mod = $i % 4; ?>
                  <?if($producto['Data']['Producto']['categoria_id'] != 1 || ($producto['Data']['Producto']['categoria_id'] == 1 && $mod==0) ):?>
                    <? $select[$i] = $i?>  
                <?endif?> 
              <? endfor;
              ?> 
              <?= $this->Form->input(
                'cantidad',
                array(
                  'value'       => $producto['Meta']['Cantidad'],
                  'data-previo'   => $producto['Meta']['Cantidad'],
                  'data-id'     => $producto['Data']['Producto']['id'],
                  'class'       => 'form-control js-input-cantidad-actualizar',
                  'div'       => false,
                  'label'       => false,
                  'options' => $select
                )
              ); ?>
            </td>
            <td data-title="Precio:" class="precio" style="text-align: center">
              <? $precio = $producto['Data']['Producto']['precio_publico'];?>
              <? $preciofinal = $producto['Data']['Producto']['preciofinal_publico'];?>
              <? $dcto = $producto['Data']['Producto']['dcto_publico'];?>
              <? $oferta = $producto['Data']['Producto']['oferta_publico']?>
              <?if($esMayorista):?>
                <? $precio = $producto['Data']['Producto']['precio_mayorista'];?>
                <? $preciofinal = $producto['Data']['Producto']['preciofinal_mayorista'];?>
                <? $dcto = $producto['Data']['Producto']['dcto_mayorista'];?>
                <? $oferta = $producto['Data']['Producto']['oferta_mayorsta']?>
              <?endif;?>

              <?if($oferta):?>
                $<?= number_format($precio, 0, null, '.'); ?> - <?=$dcto?>% = $<?=number_format($preciofinal, 0, null, '.')?>
              <?else:?>
                $<?= number_format($preciofinal, 0, null, '.'); ?>
              <?endif;?>
                
            </td>
            
           
            <td data-title="Subtotal:" class="precio js-producto-subtotal">$<?= number_format(($producto['Data']['Producto']['preciofinal_publico'] * $producto['Meta']['Cantidad']), 0, null, '.'); ?></td>
            <td data-title="Eliminar:">
              <?= $this->Html->link(
                'x', '#',
                array(
                  'class'       => 'equis js-eliminar-producto',
                  'data-id'     => $producto['Data']['Producto']['id'],
                  'data-nombre'   => h($producto['Data']['Producto']['nombre']),
                  'data-imagen'   => "img/{$this->App->imagen($producto['Data']['Producto']['sku'], true)}"
                )
              ); ?>
            </td>
          </tr>
          <? endforeach; ?>
          <? endforeach; ?>
        </tbody>
      </table>
      <div class="col-sm-10">
        <div class="bg-table">
          <p class="pull-right">
            Total IVA incluido
          </p>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="bg-table">
          <p class='js-carro-total-dinero'> $<?= number_format($carro['Subtotal'], 0, null, '.'); ?></p>
        </div>
      </div>
     
    </div>
    <div class="detalles">
      <p>Los envíos son realizados bajo la modalidad  "Envió Por pagar". Es decir tu cancelas el valor del envió al retirar o recibir tus productos.</p>
      <p>Dentro de la Región Metropolitana se utiliza el sistema retiro en tienda o de lo contrario debe ser especificado el envió por pagar</p>
      <p>El envió de los productos es  aprox. dentro de 48 hrs. una vez confirmado todos los datos.</p>
      <p>Si cancelas tu pedido vía transferencia, puedes retirarlo en una de nuestras sucursales cuando te hagamos llegar un mail verificando su retiro.</p>
    </div> 


  </div>
</div>


