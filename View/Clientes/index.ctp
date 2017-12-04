<?= $this->Html->script(array(
    'vendor/jquery.maskedinput.min',
    'vendor/jquery.validate.min',
    'vendor/jquery.Rut.min',
    'vendor/jquery.alphanumeric.pack'
), array('inline' => false)) ;?>
 
      
<div class="container-fluid datos-producto" style="margin-top: 50px;">
  <div class="registro clearfix">
    <div class="col-md-12">
      <?= $this->element('breadcrumbs'); ?>
    </div>
  </div>
</div>
       
<div class="container interior">

    <div class="registro clearfix">
        <div class="col-md-12">
          <h4><strong>Nuestros clientes</strong></h4>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row item-servicio col-md-12 text-justify">
                <?php foreach ( $clientes as $cliente ) : ?>
                   <div class="col-md-2 img-clientes" style="text-align: center;">
                    <?= $this->Html->image($cliente['Cliente']['imagen']['interna']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

  