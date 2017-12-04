<div class="container-fluid datos-producto" style="margin-top: 50px;">
	<div class="registro clearfix">
		<div class="col-md-12">
			<?= $this->element('breadcrumbs'); ?>
		</div>
	</div>
</div>
<?= $this->element('buscadores/index'); ?>

<div class="container-fluid datos-producto">
	<div class="col-md-12 clearfix">
		<div class="col-md-8">
          <h4><strong><?= $producto['Categoria']['nombre'];?></strong></h4>
        </div>
	</div>
	<div class="col-md-12 border">
		<div class="col-sm-6">
			<div class="col-sm-12">
			 	<?if(!empty($imagenes)):?>
			 		<div id="detalleCarousel" class="carousel slide home">
			 			<div class="carousel-inner">
			 				<div class="item active imagenesproducto img-producto-zoom imagen0">
					            <?= $this->Html->image($this->App->imagen($producto['Producto']['sku'], false,'N'));?>
					        </div>
					        <?php
				              $i = 0;
				              foreach ($imagenes as $key => $ImagenesGal):
								$ActiveClass = "";
				               	if ($i == 0){ 
				                	$ActiveClass = "active";
				               	}
			                ?>
			                   	<div class="item imagenesproducto imagen<?=$ImagenesGal['ImagenProducto']['id']?>"> 
			                     	<?= $this->Html->image($ImagenesGal['ImagenProducto']['imagen']['path']);?>
			                   	</div>    
			                 <?$i++;endforeach;?>    
			 			</div>
			 			<ol class="carousel-indicators">
         						 <?= "<li  class='olimagen' data-target='#detalleCarousel' data-imagen='imagen0' data-slide-to='0' class = 'active'>".
						                     $this->Html->image($this->App->imagen($producto['Producto']['sku'], true))."</li>"; ?>
						        <?php
						            if(count($imagenes)>1):
						                $i = 1;
						                foreach ($imagenes as $key => $ImagenesGal):  
						                      $ActiveClass = "";
						                      ?>
						                       <?if(file_exists(IMAGES_URL .$ImagenesGal['ImagenProducto']['imagen']['path'])):?> 
						                      <?= "<li class='olimagen' data-target='#detalleCarousel' data-imagen='imagen".$ImagenesGal['ImagenProducto']['id']."' data-slide-to='" .$i. "' " .$ActiveClass. ">".
						                      $this->Html->image($ImagenesGal['ImagenProducto']['imagen']['mini'])."</li>"; ?>
						                      <?endif;?>
						                      <?$i++;endforeach;
						           endif;
						        ?>
						    </ol>
			 		</div>
			 	<?else:?>
			 		<div class="item active imagenesproducto img-producto-zoom imagen0">
			            <?= $this->Html->image($this->App->imagen($producto['Producto']['sku'], false,'N'));?>
			        </div>
			 	<?endif;?>
			</div>
			<div class="col-md-12 border">
                <div id="wrapper-pestanas">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#tab-overview" id='btn-tab-overview'>Ficha técnica</a></li>
                        <li class="active"><a data-toggle="tab" href="#tab-reviews" id='btn-tab-reviews'>Comentarios</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-overview" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-contenido" id="tab-overview-descripcion">
                                    <h5 class="titulo-pestana">Ficha técnica</h5>
                                    <?
                                        if(!empty($producto['Producto']['ficha'])){
                                            echo  '<p>'.$producto['Producto']['ficha'].'</p>';
                                        }else{
                                            echo '<p>No se tiene ficha técnica de este producto</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div id="tab-reviews" class="tab-pane fade in active">
                           
                           <div class="comentarios">
								<div class="sdk-facebook">
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
									var js, fjs = d.getElementsByTagName(s)[0];
									if (d.getElementById(id)) return;
									js = d.createElement(s); js.id = id;
									js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1938664143025395";
									fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
								</div>
								<div class="fb-comments"
									 data-href="<?= $this->Html->url(array('controller' => 'productos', 'action' => 'view', $producto['Producto']['sku']), true); ?>"
									 data-numposts="4" data-width="100%">
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
              

		</div>
		<div class="col-sm-6">
            <div class="detalles-producto">
              <p>Producto</p>
              <h4><?= $producto['Producto']['nombre'];?></h4>
              <p class="sku">SKU:&nbsp;&nbsp;<?= $producto['Producto']['sku'];?></p>

                <? if ($esMayorista):?>    
                    <p class="stock"><span class="glyphicon glyphicon-ok-sign"></span> <?= $producto['Producto']['stock'];?></p>
                <? else: ?>        
                    <p class="stock"><span class="glyphicon glyphicon-ok-sign"></span> Stock</p>
                <? endif ?>

                <p class="cant-valoraciones"> 
                    <a class="link animated link-to-reviews" title="Add a review" onclick="Resenas_EscribirResena ();">
                    <?php 
                        $valoracion = 0;
                         foreach ($producto['ValoracionProducto'] as $review) {
                                $valoracion += $review['valoracion'];
                            }
                            if($valoracion != 0){
                                $valoracion = round($valoracion / count($producto['ValoracionProducto']));
                            }
                    ?>
                        Valoración (<span class="valoracion-numero"> <?= $valoracion; ?> </span>)</br>
                    </a>
                     <div id="puntaje">
                        <?php
                            for ($i = 1; $i <= 5; $i++) {

                                echo "<a class='link' id='" .$i. "' onclick='Resenas_Puntos_MarcarPuntaje(this);valorarProducto(".$i.",".$producto['Producto']['id'].")' onmouseover='Resenas_Puntos_MouseOver(this);' onmouseout='Resenas_Puntos_MouseOut(this);'>";
                                echo $this->Html->image('estrella-vacia.jpg');
                                echo "</a>";

                            }
                        ?>
                    </div>
                   
                </p>                  
                <div class="precio">
                    <p>Precio</p>
                    <? $precio = $producto['Producto']['precio_publico'];?>
                    <? $preciofinal = $producto['Producto']['preciofinal_publico'];?>
                    <? $dcto = $producto['Producto']['dcto_publico'];?>
					<?if($esMayorista):?>
						<? $precio = $producto['Producto']['precio_mayorista'];?>
                    	<? $preciofinal = $producto['Producto']['preciofinal_mayorista'];?>
                    	<? $dcto = $producto['Producto']['dcto_mayorista'];?>
					<?endif;?>

                    <h4>$<?= number_format($preciofinal, 0, '', '.'); ?></h4>
                    <? if($precio != $preciofinal):?>    
                            <p>Antes <strike>$<?= number_format($precio, 0, '', '.'); ?></strike></p>
                    <?endif;?> 

                    <?if($esMayorista && $producto['Producto']['oferta_mayorista']):?>
                    	<div class="oferta ofertadetalle">
                            <span ><?= $producto['Producto']['dcto_mayorista'];?>%</span>
                        </div>
                        <br>
                   	<?endif;?>  

                   	 <?if(!$esMayorista && $producto['Producto']['oferta_publico']):?>
                    	<div class="oferta ofertadetalle">
                            <span >OFERTA <?= $producto['Producto']['dcto_publico'];?>%</span>
                        </div>
                        <br>
                   	<?endif;?>          

                </div>
                <br>
                <div class="precio">
                    <?= $producto['Producto']['descripcion_ficha'];?>
                </div>


                <div class="cantidad">
                    <br>
                    <p>Cantidad</p>
                    <span class="agregar"> 
						<? 
							$n = 100;
							if($esMayorista){
								$n = 1000;
							}
						?>

						<select id="selectCantidad<?= $producto['Producto']['id']; ?>" class="form-control">
						<? for($i=1;$i<=$n;$i++): ?>
						    <? $mod = $i % 4; ?>
						    <?if($producto['Producto']['categoria_id'] != 1 || ($producto['Producto']['categoria_id'] == 1 && $mod==0) ):?>
						       <option value="<?=$i;?>"><?= $i;?></option>
							<?endif?> 
						<? endfor;
						?> 
						</select>
            		</span> 
            		<span class="agregar"> 
						<?= $this->Html->link(
							" <span class='fa-stack fa-1x icon hidden-sm hidden-xs'>
                                <i class='fa fa-circle fa-stack-2x'></i>
                                <i class='fa fa-circle-thin fa-stack-2x'></i>
                                <i class='fa fa-shopping-cart fa-stack-1x'></i>
                            </span> Agregar",
							'#',
							array(
								'class'				=> 'js-producto-stock js-talla-stock agregar js-agregar-producto',
								'data-id'			=> $producto['Producto']['id'],
								'data-nombre'		=> h($producto['Producto']['nombre']),
								'data-imagen'		=> "img/{$this->App->imagen($producto['Producto']['sku'], true)}",
								'data-cantidad'		=> 1,
								'escape'			=> false
							)
						); ?>
            		</span>
               
                </div>
                <div class="whatsapp" >
                    <p>Consultas</p> 
                    <a href="whatsapp://send?text=Hello World!&phone=+56964564039" title="Consultas en WhatsApp"><i class="fa fa-whatsapp"></i> +569 6456 4039</a>        
                </div>  
                <div class="whatsapp" >


                <?
                        if (!empty($usuario))
                        {
                            $usuario_nombre  = $usuario['nombre'].' '.$usuario['apellido_paterno'].' '.$usuario['apellido_materno'];
                            $usuario_email  = $usuario['email'];
                            $usuario_telefono  = $usuario['telefono'];
                        }else{

                            $usuario_nombre  = 'Usuario no inicio sesión';
                            $usuario_email  = '';
                            $usuario_telefono  = 'N/A';
                        }
                        $url= $_SERVER["REQUEST_URI"];

                ?>            
                        <div class="formulario" id="formulario">
                            <div class="contacto forms "> 
                                <p><strong>CONSULTAS TÉCNICAS DEL PRODUCTO</strong></p>           
                                <p><?= $producto['Producto']['nombre'];?></p>           
                                <div><?= $this->element('form-alerta'); ?></div>
                                <?//= $this->Form->create('Contacto', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false))); ?>  
                                <?= $this->Form->create('Contacto', array(
                                      'url' => array('controller' => 'contacto', 'action' => 'index'),                        
                                      'class' => 'form-horizontal',
                                      'type' => 'file',
                                      'inputDefaults' => array('label' => false,'div' => false)
                                      )
                                ); ?>


                                        <?= $this->Form->input('redirect', array('class' => 'hidden', 'value' => $url)); ?>
                                        <?= $this->Form->input('consultaproducto', array('class' => 'hidden', 'value' => 1)); ?>

                                        
                                        <div class="form-group">
                                            <label class="col-md-12 sr-only" for="name">name</label>  
                                            <div class="col-xs-12">
                                                <?= $this->Form->input('nombre', array('class' => 'hidden','value' => $usuario_nombre )); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <?
                                            if(!empty($usuario)):
                                        ?>
                                        <label class="sr-only" for="email">email</label>  
                                            <div class="col-xs-12">
                                                <?= $this->Form->input('email', array('class' => 'hidden','value' => $usuario_email )); ?>
                                            </div>
                                        </div>
                                        <?else:?>
                                             <label class="sr-only" for="email">email</label>  
                                            <div class="col-xs-12">
                                                <?= $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Ingrese su correo')); ?>
                                            </div>
                                        </div>
                                        <?endif;?>
                                        <div class="form-group">
                                            <label class="sr-only" for="telefono">telefono</label>  
                                            <div class="col-xs-12">
                                                <?= $this->Form->input('telefono', array('class' => 'hidden','value' => $usuario_telefono)); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="telefono">Producto consultado</label>  
                                            <div class="col-xs-12">
                                                <?= $this->Form->input('producto', array('class' => 'hidden', 'value' => $producto['Producto']['nombre'])); ?>
                                                <?= $this->Form->input('producto_url', array('class' => 'hidden','value' => $url)); ?>
                                                <?= $this->Form->input('sku', array('class' => 'hidden','value' => $producto['Producto']['sku'])); ?>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="sr-only" for="mensaje">mensaje</label>  
                                            <div class="col-xs-12">

                                                <?= $this->Form->textarea('mensaje', array('class' => 'form-control', 'placeholder' => 'Ingrese comentario', 'row' => 65, 'cols' => 50 ));?>                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="enviar">enviar</label>                        
                                            <div class="col-md-12">
                                                <?= $this->Form->input('Enviar', array('type' => 'button', 'class' => 'btn btn-primary')); ?>                            
                                            </div>
                                        </div>
                                <?= $this->Form->end(); ?>
                            </div>
                        </div> 
                    
                <?
                        // }
                ?>        



                </div>                                 
            </div>

            <div class="redes" >
                <span class="comparte">Comparte con tus amigos</span>
                <?/*
                <a id="facebook" onclick="CompartirFacebook('<?= $urlCompartir; ?>', '<?= $producto['Producto']['foto']['mini']; ?>');"></a>
                <a id="twitter" onclick="CompartirTwitter('<?= $urlCompartir; ?>');"></a>  
                */?>
                <a id="facebook"  title="Comparte en Facebook" onclick="
                // alert(fullwebroot+'<?php echo substr($this->here, 1); ?>')
                        var url1 = fullwebroot+'<?php echo substr($this->here, 1); ?>';
                        FB.init({
                            appId      : '1539009782817759',
                            status     : true,
                            xfbml      : true,
                            version    : 'v2.4'
                        });
                        FB.ui({
                          method: 'share',
                          href:url1 ,
                        }, function(response){});
                    ">
                      
                    </a>

                <a id="twitter" href="javascript:void(0)" target="_blank"></a>    

            </div>

        </div>
	</div>

</div>
