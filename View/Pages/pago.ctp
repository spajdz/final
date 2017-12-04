<div class="container-fluid datos-producto" style="margin-top: 50px;">
  <div class="registro clearfix">
    <div class="col-md-12">
      <?= $this->element('breadcrumbs'); ?>
    </div>
  </div>
</div>
<div class="container interior">

 


  <div class="col-md-7">

  	<h4><strong>Formas de Pago internet</strong></h4>
  	<p>&nbsp;</p>

    <p>Siga estas simples instrucciones para poder realizar sus pedidos en línea. Tómese su tiempo para leer como opera nuestro sistema de comercio electrónico. Si aún así tiene dudas por favor escríbanos a info@zsmotor.cl.</p>

    <p>&nbsp;</p>
    <h4><strong>Tarjetas de Crédito</strong></h4>
    <p>&nbsp;</p>

    <p>Si desea usar tarjetas de crédito (VISA, MASTERCARD, AMERICAN EXPRESS), puede pagar en tres cuotas conservando el precio contado. El pago se realizará a través de Webpay Plus.</p>

    <p>Ponga atención a las siguientes condiciones:</p>

    <ol>
    	<li>Para Operar con Webpay Plus debe contar con la clave de acceso a Internet  de su banco.</li>
    	<li>La orden de pedido Web, así como la boleta, solo puede ser realizada a nombre del titular de la tarjeta.</li>
    	<li>Las compras de regiones serán enviadas con los mismos datos de la boleta.</li>
    	<li>Pago en cuotas es sólo para tarjetas de crédito emitidas en Chile.</li>
    	<li>Toda promoción publicada por los Bancos en relación a la cantidad de cuotas ofrecidas como cuota contado será de exclusiva responsabilidad de la entidad bancaria emisora la cual debe reflejar el descuento pertinente según corresponda.</li>
    	<li>﻿También ponemos a su disposición el canal de pago  Servipag , con ellos podrás cancelar con cualquiera de los comercios asociados a este medio de pago </li>
    	<li>Aunque el pago se halla realzado con tarjetas de crédito , nosotros debemos decepcionar el pago y esto es realizado por un reporte que nos es enviado por parte de transbank junto al historial de nuestro banco.﻿﻿﻿ </li>
    </ol>

    <p>&nbsp;</p>
    <h4><strong>Pago Efectivo Vía Depósito Bancario</strong></h4>
    <p>&nbsp;</p>

    <p>Para el pago en efectivo puede hacer un depósito bancario. El pago de su compra debe realizarse con los siguientes datos:</p>

    <table>
    	<tr><td width="100x">Titular:</td><td>Comercial Cardepot Ltda</td></tr>
    	<tr><td width="100x">R.U.T.:</td><td>77.358.700 - 0</td></tr>
    	<tr><td width="100x">Banco:</td><td>Santander · Santiago</td></tr>
    	<tr><td width="100x">Nº Cuenta:</td><td>63 26 519 - 5  /  Cuenta Corriente</td></tr>
    	<tr><td width="100x">Mail:</td><td>info@zsmotor.cl</td></tr>
    	<tr><td width="100x">Teléfono:</td><td>635 39 89</td></tr>
    </table>

    <p>* El comprobante de depósito debe enviarlo a través del correo electrónico a info@zsmotor.cl</p>

    <p>&nbsp;</p>
    <h4><strong>Pago Efectivo Vía Transferencia Electrónica</strong></h4>
    <p>&nbsp;</p>

    <p>La transferencia debe realizarse a nuestra cuenta corriente. Los datos son los siguientes:</p>

    <table>
    	<tr><td width="100x">Titular:</td><td>Comercial Cardepot Ltda</td></tr>
    	<tr><td width="100x">R.U.T.:</td><td>77.358.700 - 0</td></tr>
    	<tr><td width="100x">Banco:</td><td>Santander · Santiago</td></tr>
    	<tr><td width="100x">Nº Cuenta:</td><td>63 26 519 - 5</td></tr>
    	<tr><td width="100x">Mail:</td><td>info@zsmotor.cl</td></tr>
    	<tr><td width="100x">Teléfono:</td><td>635 39 89</td></tr>
    </table>

    <p>* El comprobante de depósito podrá enviarlo a través del correo electrónico a  info@zsmotor.cl﻿</p>

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