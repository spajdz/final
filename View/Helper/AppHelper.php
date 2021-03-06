<?php
App::uses('Helper', 'View');
class AppHelper extends Helper
{
	public function menuActivo($link = array())
	{
		if ( ! is_array($link) || empty($link) )
		{
			return false;
		}

		$action				= $this->request->params['action'];
		$controller			= $this->request->params['controller'];
		$prefix				= (isset($this->request->params['prefix']) ? $this->request->params['prefix'] : null);


		if ( $prefix && isset($this->request->params[$prefix]) && $this->request->params[$prefix] )
		{
			$tmp_action			= explode('_', $action);
			if ( $tmp_action[0] === $prefix )
			{
				array_shift($tmp_action);
				$action			= implode('_', $tmp_action);
			}
		}

		return (
			(isset($link['controller']) ? ($link['controller'] == $controller) : true) &&
			(isset($link['action']) ? ($link['action'] == $action) : true)
		);
	}

	public function assetUrl($path, $options = array())
	{
	   if (!empty($this->request->params['ext']) && $this->request->params['ext'] === 'pdf')
	   {
		   $options['fullBase'] = true;
	   }
	   return parent::assetUrl($path, $options);
    }

    public function imagen($sku = null, $grande = false, $tipo = 'interna_')
	{
		$size		= ($grande ? 'mini_' : 'interna_');
		$size_nd		= ($grande ? '_mini' : '');
		if(empty($tipo) || $tipo != 'N'){
			$path		= IMAGES . implode(DS, array('Producto/'.$sku, sprintf('%s.jpg', $size.$sku)));
		}else{
			$path		= IMAGES . implode(DS, array('Producto/'.$sku, sprintf('%s.jpg', $sku)));
		}
		// prx($path);
		if ( is_file($path) )	
		{
			return sprintf('Producto/%s/%s.jpg', $sku, $sku);
		}else{
			if(empty($tipo) || $tipo != 'N'){
				$path		= IMAGES . implode(DS, array('Producto/'.$sku, sprintf('%s.png', $size.$sku)));
			}else{
				$path		= IMAGES . implode(DS, array('Producto/'.$sku, sprintf('%s.png', $sku)));
			}
			if ( is_file($path) )
			{
				if(empty($tipo) || $tipo != 'N'){
					return sprintf('Producto/'. $sku .'/%s.png' , $size.$sku);
				}else{
					return sprintf('Producto/'. $sku .'/%s.png' , $sku);
				}
				
			}	
		}

		return 'nodisponible'.$size_nd.'.jpg';
	}
}
