<?php
App::uses('AppModel', 'Model');
class ImagenProducto extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'nombre';
	
	var $actsAs			= array(
		'Image'		=> array(
			'fields'	=> array(
				'imagen'	=> array(
					'versions'	=> array(
						array(
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'chica',
							'width'		=> 160,
							'height'	=> 130,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'mediana',
							'width'		=> 330,
							'height'	=> 220,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'grande',
							'width'		=> 600,
							'height'	=> 350,
							'crop'		=> true
						)
					)
				)
			)
		)
		
	);
	
	public $belongsTo = array(
		'Producto' => array(
			'className'				=> 'Producto',
			'foreignKey'			=> 'producto_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
		)
	);

	public function beforeSave($options = array())
	{
		parent::beforeSave($options);

		$this->data[$this->alias]['created']	=  date('Y-m-d H:i:s');
		$this->data[$this->alias]['modified']	=  date('Y-m-d H:i:s');
		
		return true;
	}
}
