<div class="col-md-5th-1 col-sm-4 col-xs-6 productos-index">
    <div class="item-display">
        <div class="item">
        	<? $oferta = ($esMayorista) ? $producto['Producto']['oferta_mayorista'] : $producto['Producto']['oferta_publico'];?>
			<? $oferta_palabra = ($esMayorista) ? 'REMATE ' : 'OFERTA '?>
			<? $oferta_dcto = ($esMayorista) ? $producto['Producto']['dcto_mayorista'] : $producto['Producto']['dcto_publico']?>
			<? if($oferta): ?>
				<div class="oferta_publico oferta"> <span><?= $oferta_palabra . $oferta_dcto?>%</span></div>
			<? endif;?>
            
            <div class="contenido">
            	<?= $this->Html->link(
						$this->Html->image($this->App->imagen($producto['Producto']['sku']), array('class' => 'img-responsive fotomini')),
						 array('controller' => 'productos', 'action' => 'view', $categoria, 'marca' => $producto['Marca']['slug'], 'slug' => $producto['Producto']['slug']),
						array('class' => 'contenedor-imagen', 'escape' => false)
				); ?>
               
                <h5><?=$producto['Producto']['nombre'];?></h5>
                <h5>SKU:&nbsp;&nbsp;<?= $producto['Producto']['sku']; ?></h5>


                <div class="izquierda">
                	<span class="precio">
                		<?= number_format(($esMayorista) ? $producto['Producto']['preciofinal_mayorista'] : $producto['Producto']['preciofinal_publico'], 0, null, '.'); ?>
                	</span> 

                	<? $precio = $producto['Producto']['precio_publico'];?>
					<? $preciofinal = $producto['Producto']['preciofinal_publico'];?>

					<?if($esMayorista):?>
						<? $precio = $producto['Producto']['precio_mayorista'];?>
						<? $preciofinal = $producto['Producto']['preciofinal_mayorista'];?>
					<?endif;?>

            		<?if($precio != $preciofinal):?>
						NORMAL: <span class="precio-normal"> $ <?= number_format($precio, 0, null, '.'); ?> </span>
					<?endif;?>
					<?if($producto['Producto']['stock'] <= 0):?>
						<span class="js-producto-nostock no-stock js-talla-nostock">Sin Stock <i class="fa fa-ban"></i></span>
					<?else:?>
                    	<p class="stock"><span class="glyphicon glyphicon-ok-sign"></span> Stock</p>
					<?endif;?>
                </div>
                <div class="derecha">
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
							'Agregar al carro <i class="fa fa-shopping-cart"></i>',
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
                <span class="verdetalle"> 
                	<?= $this->Html->link(
							'Detalles',
							 array('controller' => 'productos', 'action' => 'view', $categoria, 'marca' => $producto['Marca']['slug'], 'slug' => $producto['Producto']['slug']),
							array('class' => 'verdetalles', 'escape' => false)
					); ?>
                </span></div>
        </div>
    </div>
</div>

