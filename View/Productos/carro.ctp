<?= $this->Html->script(array('productos.carro'), array('inline' => false)) ;?>
<? $this->set(compact('tipo_header')); ?>
<?= $this->element('productos/pasos-compra'); ?>

<div class="container-fluid interior">
  <div class="registro clearfix">
    <div class="col-md-12">
      <h4><strong>Mi Carro de Compras</strong></h4>
    </div>
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
     
        <div class="pull-right actualizar">
          <a href="javascript:history.back()" class="actualizar-carro"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</a>
          <?= $this->Html->link('Ir a selección de despacho', array('controller' => 'direcciones', 'action' => 'add'), array('class' => 'btn js-accion-carro-1 seleccion')); ?>
        </div>
       
    </div>
  </div>
</div>


