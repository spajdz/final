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
      <h4><strong>NOSOTROS</strong></h4>
    </div>

  </div>

  <div class="col-md-7">

    <?= $this->Html->image('quienes-somos.jpg', array('class' => 'img-responsive fotomini')); ?>

    <p><strong>ZS Motor  nace debido a la necesidad e inquietud, por entregar en chile los mejores y más confiables accesorios para vehículos al mejor precio y con un gran respaldo técnico.</strong></p>

    <p>Nuestra estrategia comercial se basa en posicionarse en el mercado de venta de accesorios automotrices con los precios más convenientes, fruto de su calidad de importadores directos y con garantía total de sus partes y piezas. Para esto se escogieron los mejores proveedores en EE.UU. y del Lejano Oriente.</p>

    <p>Se estableció en Santiago de Chile una sala de venta con Profesionales especializados en la materia, todos ellos enfocados a la atención y satisfacción del cliente sin olvidar un complemento vital como es un equipo técnico del más alto nivel.</p>

    <p>Estos son nuestros locales donde podrá encontrar toda nuestra gama de productos junto a la mejor atención que nuestro equipo le puede brindar.</p>

  </div>

   <?if(!empty($miniBanner)):?>
      <div class="col-md-5">
      <div class="banners clearfix">
            <div class='banner'>
             <div class="inner" style="background-image: url('<?= Router::url('/img/'.$miniBanner['Banner']['imagen']['bannerHorizontalHome'], true); ?>');">
                <?
                  if($miniBanner['Banner']['texto'] != "") {
                      echo "<h3>" .$miniBanner['Banner']['texto']. "</h3>";
                    }
                ?>
             </div>
            </div>
      </div>
    </div>
  <?endif;?>




</div>