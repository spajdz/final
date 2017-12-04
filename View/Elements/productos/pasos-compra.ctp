<div class="franja-search carro">
  <div class="container-fluid">
    <div class="col-md-3">
      <h3><strong>Proceso de Compra</strong></h3>
    </div>
    <div class="col-md-2">
      <a href="#" class="btn btn-default <?= ($tipo_header == 'carro') ? 'active':''; ?>">01 | Modificar Carro</a>
      <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
    </div>
    <div class="col-md-2">
      <a href="#" class="btn btn-default <?= ($tipo_header == 'despacho') ? 'active':''; ?>">02 | Retiro/Despacho</a>
      <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
    </div>
    <div class="col-md-2">
      <a href="#" class="btn btn-default <?= ($tipo_header == 'resumen') ? 'active':''; ?>">03 | Finalizar Compra</a>
      
    </div>

    <? if($tipo_header=='finalizada'){ ?>
      <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
      <div class="col-md-2">
        <a href="#" class="btn btn-default <?= ($tipo_header == 'finalizada') ? 'active':''; ?>">04 | Finalizada con exito</a>
      </div>
    <? } ?>

    <? if($tipo_header=='fracaso'){ ?>
      <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
      <div class="col-md-2">
        <a href="#" class="btn btn-default <?= ($tipo_header == 'fracaso') ? 'active':''; ?>">04 | Fracaso</a>
      </div>
    <? } ?>

  </div>
</div>                    