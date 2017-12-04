<div class="modal fade" id="myPopup" tabindex="-1" role="dialog" aria-labelledby="myPopupLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="modal-title" id="myPopupLabel">
            <?= $this->Html->image('logo-zs-motors.png', array('alt' => 'ZS Motors', 'class' => 'img-responsive'));  ?>
          </div>
      </div>
      <div class="modal-body">
      	Producto agregado correctamente
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Continuar comprando</button>
          <?=
              $this->Html->link(
                  '
                  <button type="button" class="btn btn-primary">
                      <span class="glyphicon glyphicon-shopping-cart"></span> 
                      <span class="text-cart "><span class="hidden-xs">ver carro</span>
                        (<span id="cantidadCarropopup" class="js-total-articulos"></span>)</span>
                  </button>
                  ',
                  array('controller' => 'carro', 'action' => 'index'),
                  array('escape' => false, 'class' => 'btn_carro')
              );
          ?>

      </div>
    </div>
  </div>
</div>
