<div class="modal fade" id="popup-eliminar-producto" tabindex="-1" role="dialog" aria-labelledby="myPopupLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="modal-title" id="myPopupLabel">
            <?= $this->Html->image('logo-zs-motors.png', array('alt' => 'ZS Motors', 'class' => 'img-responsive'));  ?>
          </div>
      </div>
      <div class="modal-body" style="color:#fff">
       ¿Seguro que desea eliminar este producto del carro?
      </div>
      <div class="modal-footer">
      	<a href="#" class="btn js-confirma-eliminar js-focus btn btn-default">Eliminar producto <i class="fa fa-times"></i></a>
      </div>
    </div>
  </div>
</div>
