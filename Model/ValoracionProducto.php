<?php
App::uses('AppModel', 'Model');
class ValoracionProducto extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'valor';
	
	
	
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
