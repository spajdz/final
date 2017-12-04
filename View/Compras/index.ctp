
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
          <div class="registro clearfix">
           
            <div class="col-md-12">
              <h4><strong>Mis compras</strong></h4>
            </div>
          </div>

        <div class="col-md-12 tabla-carro tabla-datos" id="no-more-tables">
            <table class="col-md-12 table-condensed cf">
    <thead class="cf">
        <tr>
            <th class="table-left">OC</th>
            <th class="table-left">Dirección</th>
            <th class="table-left">Subtotal</th>
            <th class="table-left">Total</th>
            <th class="table-left">Estado</th>
            <th class="table-left">Fecha</th>
            <th class="table-left">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ( $compras as $compra ) : ?>
        <?
        //if($compra['EstadoCompra']['nombre']=='pagado'){
        ?>     
        <tr>
            <td><?= h($compra['Compra']['id']) ?></td>
            <? if ( ! empty($compra['Direccion']['calle']) ) : ?>
            <td><?= sprintf('%s %s %s', $compra['Direccion']['calle'], $compra['Direccion']['numero'], $compra['Direccion']['depto']); ?></td>
            <? else : ?>
            <td>N/A</td>
            <? endif; ?>
            <td>$<?= number_format($compra['Compra']['subtotal'], 0, ',', '.'); ?></td>
            <td>$<?= number_format($compra['Compra']['total'], 0, ',', '.'); ?></td>
            <td class="table-right"><?= h($compra['EstadoCompra']['nombre']); ?></td>
            <td><?= h($compra['Compra']['created']) ?></td>
            <td data-title="Ver Detalles">
                <?= $this->Html->link('<i class="fa fa-search" aria-hidden="true"></i>', array('action' => 'view', $compra['Compra']['id']), array('escape' => false)); ?>
            </td>
        </tr>
        <?
        //}
        ?>
        <? endforeach; ?>
    </tbody>
</table>
        </div>
    </div>

         