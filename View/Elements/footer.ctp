<footer>
	<div class="hidden-lg text-center">
        <a href="<?= Router::url('/', true);?>">
          <?= $this->Html->image('logo-zs-motors.png', array('class' => 'img-responsive')); ?>  
        </a>
    </div>
    <div class="container-fluid">
        <div class="col-lg-6 col-md-12 col-xs-12">
        	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 zs-motor">
            	<h5>ZS Motor</h5>
            	<ul>
              		<li>
		                <?=
		                  $this->Html->link(
		                      'Nosotros',
		                      array('controller' => 'pages', 'action' => 'display','nosotros'),
		                      array('escape' => false)
		                  );
		                ?> 
              		</li>
	              	<li>
	                	<?= $this->Html->link(
		                      'Nuestras tiendas',
		                      array('controller' => 'sucursales', 'action' => 'index'),
		                      array('escape' => false)
		                  	);
		                ?>            
	              	</li>                
	              	<li>
	                	<?= $this->Html->link(
			                    'Ventas mayoristas',
			                    array('controller' => 'pages', 'action' => 'display','ventasmayoristas'),
			                    array('escape' => false)
			                );
	                	?> 
	              	</li>
            	</ul>
          	</div>

          	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 redes">
            	<h5>Casa Matriz</h5>
            	<ul>
                	<li>
                  		<a target="_blank" href="http://www.twitter.com/zsmotor" >Av. Maraton 3762, Macul</a>   
                	</li>
	                <li>
	                  <a href="tel:+56226307700" class="hidden-xs">+56 22 630 77 00</a>                  
	                  <a href="tel:+56226307700" class="hidden-md hidden-lg" style="font-size: 10pt;">+56 22 630 77 00</a>                  
	                </li>
	                <li>
	                  <a  href="mailto:info@zsmotor.cl" >info@zsmotor.cl</a>                  
	                </li>
            	</ul>
          	</div>
 
          	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 redes">
            	<h5>Tienda  online</h5>
            	<ul>
              		<li>
	                	<?= $this->Html->link(
		                    	'Formas de pago',
		                      	array('controller' => 'pages', 'action' => 'display','pago'),
		                      	array('escape' => false)
		                  	);
	                	?> 
	              	</li>
              		<li>
		                <?= $this->Html->link(
		                    	'Políticas de tienda online',
		                    	array('controller' => 'pages', 'action' => 'display','politicastiendaonline'),
		                    	array('escape' => false)
		                  	);
		                ?> 
              		</li>              
            	</ul>
          	</div>
        </div>

        <div class="col-lg-6 col-sm-12 col-xs-12 logos hidden-xs">
	        <div class="row">
	        	<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 col-lg-7 col-lg-offset-5">
	            	<div class="row">
		            	<div class="col-md-2 col-sm-2">
		              		<a href="whatsapp://send?text=Hola tengo una consulta&phone=+56964564039" title="Contactanos en WhatsApp" class="redes"><i class="fa fa-whatsapp"></i></a>
		            	</div> 
		            	<div class="col-md-10 col-sm-10">
		              		<h5>¿Tienes consultas? <br> </h5>
		              		Escríbenos:<a href="whatsapp://send?text=Hola tengo una consulta&phone=+56964564039" title="Contactanos en WhatsApp" class="telefono"> +569 6456 4039</a>
		              		<p> Horarios de atención tienda online <br>  Lunes a viernes de 09:00 a 18:00 hrs </p>
		            	</div>
	 				</div>
	          	</div>
	        
	          	<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 col-lg-7 col-lg-offset-5">
	            	<div class="col-md-2 col-sm-2">
	              		<a target="_blank" href="http://www.twitter.com/zsmotor" title="Comparte en Twitter" class="redes"><i class="fa fa-twitter-square"></i></a>        
	            	</div> 
	            	<div class="col-md-2 col-sm-2">
	              		<a target="_blank" href="https://www.facebook.com/ZSMOTOR/" title="Comparte en Facebook" class="redes"><i class="fa fa-facebook-square"></i></a>                  
	            	</div>
	            	<div class="col-md-2 col-sm-2">
	              		<a target="_blank" href="https://www.instagram.com/zs.motor/" title="Comparte en Instagram" class="redes"><i class="fa fa-instagram"></i></a>                  
	            	</div> 
		            <div class="col-md-6 col-sm-6">
		              	<?= $this->Html->image('logo-webpay-plus.png', array('class' => 'img-responsive')); ?>   
		            </div> 
	          	</div>
	        </div>      
        </div>

        <div class="row">
        	<div class="col-xs-12 hidden-lg hidden-md hidden-sm">
            	<div class="row">
              		<div class="col-xs-2 col-xs-offset-1">
                		<a href="whatsapp://send?text=Hola tengo una consulta&phone=+56964564039" title="Contactanos en WhatsApp" class="redes"><i class="fa fa-whatsapp"></i></a>
              		</div>
	              	<div class="col-xs-2">
	                	<a href="tel:+56964564039" title="Llámanos" class="redes"><i class="fa fa-phone"></i></a>
	              	</div>                    
              		<div class="col-xs-2">
                		<a target="_blank" href="http://www.twitter.com/zsmotor" title="Comparte en Twitter" class="redes"><i class="fa fa-twitter-square"></i></a>        
              		</div> 
              		<div class="col-xs-2">
                		<a target="_blank" href="https://www.facebook.com/ZSMOTOR/" title="Comparte en Facebook" class="redes"><i class="fa fa-facebook-square"></i></a>                  
              		</div>
              		<div class="col-xs-2">
                		<a target="_blank" href="https://www.instagram.com/zs.motor/" title="Comparte en Instagram" class="redes"><i class="fa fa-instagram"></i></a>                  
              		</div> 
              		<div class="col-xs-12 clearfix webpay-footer">
                		<?= $this->Html->image('logo-webpay-plus.png', array('class' => 'img-responsive')); ?>   
              		</div>
            	</div> 
          	</div>        
        </div>  
    </div>
</footer>