<? $categoria = (empty($categoria) ? 'otro' : $categoria)?>
<nav class="navbar navbar-default">
	<div class="container">
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar7">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	      	<div class="btn hidden-lg hidden-md hidden-sm navbar-brand pull-right">
		        <span class="fa-stack fa-1x icon">
		          <i class="fa fa-circle fa-stack-2x"></i>
		          <i class="fa fa-circle-thin fa-stack-2x"></i>
		          <i class="fa fa-shopping-cart fa-stack-1x"></i>
		        </span>
		        <?= $this->Html->link(
		          	sprintf('
						<span class="numero-carro"><span class="js-carro-total-items items">%d</span></span>
						Mi Carro',
						($estado_carro['Cantidad'] ? $estado_carro['Cantidad'] : 0)
					),
					array('controller' => 'productos', 'action' => 'carro'),
					array('escape' => false, 'class' => 'btn_carro')
				); ?>       
	      	</div>
	        <a class="navbar-brand" href="<?= Router::url('/', true);?>">
				<? if($usuario = AuthComponent::user()):?>
	            	<?if(!empty($usuario['mostrar_imagen']) && !empty($usuario['Usuario']['imagen']['mini'])): ?>
	                	<?= $this->Html->image($usuario['Usuario']['imagen']['mini'], array('class' => 'img-responsive')); ?>            
	                <?else:?>
	                    <?= $this->Html->image('logo-zs-motors.png', array('class' => 'img-responsive')); ?>        
	                <?endif;?>
	          <? else : ?> 
	                <?= $this->Html->image('logo-zs-motors.png', array('class' => 'img-responsive')); ?>            
	          <? endif; ?> 
	      	</a>
	    </div>
	    <div id="navbar7" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<? if ( ! AuthComponent::user() ) : ?>
				    <li class="hidden-sm hidden-md hidden-lg">
				      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Iniciar Sesión</a>
				      <ul class="login dropdown-menu">
				        <?= $this->Form->create('Usuario', array(
			                  'url' => array('controller' => 'usuarios', 'action' => 'login'),                        
			                  'class' => 'form-horizontal',
			                  'inputDefaults' => array('label' => false,'div' => false)
			                  )
			            ); ?>                      
					        <?= $this->Form->input('email', array('placeholder' => 'Email')); ?><br />
					        <?= $this->Form->input('clave', array('autocomplete' => 'new-password', 'type' => 'password', 'placeholder' => 'Contraseña')); ?><br/>
					        <?= $this->Form->button('Entrar', array('class' => 'btn btn-default', 'div' => false)); ?>                  
					        <?= $this->Html->link('Regístrate ', array('controller' => 'usuarios', 'action' => 'add'), array('class' => 'btn btn-default registro', 'div' => false)); ?>
					        <?= $this->Html->link('Recuperar contraseña', array('controller' => 'usuarios', 'action' => 'add'), array('class' => 'contra')); ?></br>                    
				        <?= $this->Form->end(); ?>
				      </ul>
				    </li>
			    <? else : ?>            
			        <li class="dropdown hidden-sm hidden-md hidden-lg">
			        	<span class="fa-stack fa-1x icon hidden-sm hidden-xs">
				            <i class="fa fa-circle fa-stack-2x"></i>
				            <i class="fa fa-circle-thin fa-stack-2x"></i>
				            <i class="fa fa-user fa-stack-1x"></i>
				        </span>
				        <?= $this->Html->link(
				            sprintf('Bienvenido %s', AuthComponent::user('nombre')),
				            '#',
				            array('escape' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')
				        ); ?>
			          	<ul class="login dropdown-menu">
			            	<a class="inicio" href="#">Mi Cuenta</a>
				            <li><?= $this->Html->link('Cerrar sesion',
				                    array('controller' => 'usuarios', 'action' => 'logout'),
				                    array('escape' => false, 'class' => 'logout')
				                ); ?>
				            </li>
				            <li><?= $this->Html->link('Mis datos', array('controller' => 'usuarios', 'action' => 'edit')); ?></li>
				            <li><?= $this->Html->link('Mis compras', array('controller' => 'compras', 'action' => 'index')); ?></li>
			          	</ul>
			        </li>
			    <? endif; ?>     

				<li id="llantas" class="dropdown <?= ($categoria == 'llantas') ? 'active':''; ?>" >
					<? $GoogleAnalytics = "ga('send', 'event', 'Menú Principal', 'Llantas');" ?>
					<?= $this->Html->link( 
					        'llantas',
					        array('controller' => 'llantas', 'action' => 'index'),
					        array(
					          'escape' => false,
					          'id'=>'dropllantas',
					          'role'=>'button',
					          'data-toggle'=>'dropdown',
					          'aria-haspopup'=>'true',
					          'aria-expanded'=>'false'
					        )
					    );
					?>
				  	<ul class="dropdown-menu" aria-labelledby="dropllantas">
					    <div class="col-xs-12 col-md-10 col-md-offset-1">
					        <?= $this->element('buscadores/llantas'); ?>                              
					    </div>
					</ul>                   
				</li> 

				<li id="neumaticos" class="dropdown <?= ($categoria == 'neumaticos') ? 'active':''; ?> " >
					<? $GoogleAnalytics = "ga('send', 'event', 'Menú Principal', 'Neumáticos');" ?>
				  	<?= $this->Html->link( 
				        	'neumáticos',
				          	array('controller' => 'neumaticos', 'action' => 'index'),
				          	array(
					            'escape' => false,
					            'id'=>'dropneumaticos',
					            'role'=>'button',
					            'data-toggle'=>'dropdown',
					            'aria-haspopup'=>'true',
					            'aria-expanded'=>'false'
				            )
				      	); 
				  	?>
				  	<ul class="dropdown-menu" aria-labelledby="dropneumaticos">
				    	<div class="col-md-10 col-xs-12 col-md-offset-1">
				      		<?= $this->element('buscadores/neumaticos'); ?>                              
				    	</div>
				  	</ul>   
				</li>      

				<li id="accesorios" class="<?= ($categoria == 'accesorios') ? 'active':''; ?>">

					<? $GoogleAnalytics = "ga('send', 'event', 'Menú Principal', 'Accesorios');" ?>
				  	<?= $this->Html->link(
					        'Accesorios',
					        array('controller' => 'accesorios', 'action' => 'index'),
					        array(
					            'escape' => false,
					            'class'=>'dropdown-toggle',
					            'id'=>'dropaccesorios',
					            'role'=>'button',
					            'data-toggle'=>'dropdown',
					            'aria-haspopup'=>'true',
					            'aria-expanded'=>'false'
					        )
					    );
				  	?>
					<ul class="dropdown-menu" aria-labelledby="dropaccesorios">
						<div class="col-md-11 col-xs-12 col-md-offset-1">
							<?$i = 1;?>
							<? foreach ( $categorias_menu['accesorios'] as $categoria ) : ?>
								<li class="sub-categoria">
									<?= $this->Html->link(
										h($categoria['Categoria']['nombre']), '/categoria/' .  $categoria['Categoria']['slug']
									); ?>
									<ul class="hidden-xs">
										<? $x = 0; foreach ( $categoria['children'] as $children ) : ?>
										<? if ( ++$x >= 10 ) continue; ?>
										<li>
											<?= $this->Html->link(
												h($children['Categoria']['nombre']),'/categoria/'.$categoria['Categoria']['slug'].'/'.$children['Categoria']['slug']
											); ?>
										</li>
										<? endforeach; ?>
									</ul>
								</li>
								<?if($i==5):?>
						        	<div class="clearfix"></div>
						        <? endif;$i++;  ?>
							<? endforeach; ?>
							<div class="contselect">
					          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">

					            <?=
					                $this->Html->link(
					                    '<button type="submit" class="btn btn-default">ver todos los Accesorios</button>',
					                    array('controller' => 'accesorios', 'action' => 'index'),
					                    array(
					                      'escape' => false,
					                      'class'=>''
					                      )
					                );
					            ?>
					          </div>
					        </div>
						</div>
					</ul>
				</li>

			  	<li id="servicios" class="dropdown <?= ($categoria == 'servicios') ? 'active':''; ?>" >         
			      	<? $GoogleAnalytics = "ga('send', 'event', 'Menú Principal', 'Servicios');" ?>
			      	<?= $this->Html->link( 
			            'Servicios',
			            array('controller' => 'servicios', 'action' => 'index'),
			            array(
			            	'escape' => false,
			            	'id'=>'dropservicios',
			            	'role'=>'button',
			            	'aria-haspopup'=>'true',
			            	'aria-expanded'=>'false'                            
			            )
			          );
			      	?>                  
			  </li> 
			</ul>
	      	<ul class="nav navbar-nav navbar-right">
	        	<? if ( ! AuthComponent::user() ) : ?>
					<li class="hidden-xs">
						<span class="fa-stack fa-1x icon hidden-sm hidden-xs">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-circle-thin fa-stack-2x"></i>
						  <i class="fa fa-user fa-stack-1x"></i>
						</span>
						<?= $this->Html->link(
						        '<a class="dropdown-toggle" data-toggle="dropdown" href="#">Iniciar Sesión</a>',
						        array('controller' => 'usuarios', 'action' => 'login'),
						        array('escape' => false)
						    );
						?>              

						<ul class="login dropdown-menu">
						  <a class="inicio" href="#">Iniciar Sesión</a>
						  <?= $this->Form->create('Usuario', array(
						            'url' => array('controller' => 'usuarios', 'action' => 'login'),                        
						            'class' => 'form-horizontal',
						            'inputDefaults' => array('label' => false,'div' => false)
						            )
						      ); ?>                      

						    <?= $this->Form->input('email', array('placeholder' => 'Email')); ?><br />
						    <?= $this->Form->input('clave', array('autocomplete' => 'new-password', 'type' => 'password', 'placeholder' => 'Contraseña')); ?><br/>
						    <?= $this->Form->button('Entrar', array('class' => 'btn btn-default', 'div' => false)); ?>                  
						    <?= $this->Html->link('Regístrate ', array('controller' => 'usuarios', 'action' => 'add'), array('class' => 'btn btn-default registro', 'div' => false)); ?>
						    <?= $this->Html->link('Recuperar contraseña', array('controller' => 'usuarios', 'action' => 'add'), array('class' => 'contra')); ?></br>                    
						  <?= $this->Form->end(); ?>
						</ul>
					</li>
	        	<? else : ?>            
					<li class="dropdown hidden-xs">
						<span class="fa-stack fa-1x icon hidden-sm hidden-xs">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-circle-thin fa-stack-2x"></i>
						  <i class="fa fa-user fa-stack-1x"></i>
						</span>
						<?= $this->Html->link(
						    sprintf('Bienvenido %s', AuthComponent::user('nombre')),
						    '#',
						    array('escape' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')
						); ?>
						<ul class="login dropdown-menu">
						  <a class="inicio" href="#">Mi Cuenta</a>
						  <li><?= $this->Html->link('Cerrar sesion',
						          array('controller' => 'usuarios', 'action' => 'logout'),
						          array('escape' => false, 'class' => 'logout')
						      ); ?>
						  </li>
						  <li><?= $this->Html->link('Mis datos', array('controller' => 'usuarios', 'action' => 'edit')); ?></li>
						  <li><?= $this->Html->link('Mis compras', array('controller' => 'compras', 'action' => 'index')); ?></li>
						</ul>
					</li>
	        	<? endif; ?> 

		        <li class="hidden-xs">
					<span class="fa-stack fa-1x icon hidden-sm hidden-xs">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-circle-thin fa-stack-2x"></i>
						<i class="fa fa-shopping-cart fa-stack-1x"></i>
					</span>
		          
			     	<?= $this->Html->link(
						sprintf('
							<span class="numero-carro"><span class="js-carro-total-items items">%d</span></span>
							Mi Carro',
							($estado_carro['Cantidad'] ? $estado_carro['Cantidad'] : 0)
						),
						array('controller' => 'productos', 'action' => 'carro'),
						array('escape' => false, 'class' => 'carro')
					); ?>
		        </li>

		        <li class="hidden-xs">
					<span class="fa-stack fa-1x icon hidden-sm hidden-xs">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-circle-thin fa-stack-2x"></i>
						<i class="fa fa-map-marker fa-stack-1x"></i>
					</span>
		          	<?= $this->Html->link('VISÍTENOS', array('controller' => 'sucursales', 'action' => 'index')); ?>
		        </li>
		        <li class="hidden-xs hidden-sm hidden-md">
		        	<span class="fa-stack fa-1x icon hidden-sm hidden-xs">
		            	<i class="fa fa-circle fa-stack-2x"></i>
		            	<i class="fa fa-whatsapp fa-stack-2x" style="color: #0CC143;"></i>
		          	</span>
		          	<?= $this->Html->link('+569 6456 4039', 'tel:+56964564039'); ?>
		        </li>

		        <li class="hidden-sm hidden-md hidden-lg"><?= $this->Html->link('Nuestras tiendas',array('controller' => 'sucursales', 'action' => 'index'),array('escape' => false));?></li>            
		        <li class="hidden-sm hidden-md hidden-lg"><?= $this->Html->link('Venta Mayorista', array('controller' => 'pages', 'action' => 'display', 'ventasmayoristas')); ?></li>
		        <li class="hidden-sm hidden-md hidden-lg"><?= $this->Html->link('Nosotros', array('controller' => 'pages', 'action' => 'display', 'nosotros')); ?></li>
		        <li class="hidden-sm hidden-md hidden-lg"><?= $this->Html->link('Nuestros Clientes', array('controller' => 'clientes', 'action' => 'index')); ?></li>
	      	</ul>
	    </div>
	    <div class="row"> 
	      <ul class="menu-derecha list-inline pull-right hidden-xs">
	        <li><?= $this->Html->link('Nuestras tiendas',array('controller' => 'sucursales', 'action' => 'index'),array('escape' => false));?></li>            
	        <li><?= $this->Html->link('Venta Mayorista', array('controller' => 'pages', 'action' => 'display', 'ventasmayoristas')); ?></li>
	        <li><?= $this->Html->link('Nosotros', array('controller' => 'pages', 'action' => 'display', 'nosotros')); ?></li>
	        <li><?= $this->Html->link('Nuestros Clientes', array('controller' => 'clientes', 'action' => 'index')); ?></li>
	      </ul>
	    </div>   
  	</div>
</nav> 