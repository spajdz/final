<?php
App::uses('CakeEventListener', 'Event');
App::uses('View', 'View');
class UsuarioListener implements CakeEventListener
{
	public function implementedEvents()
	{
		return array(
			'Model.Usuario.afterSave.created'		=> 'enviarEmailBienvenida',
			'Model.Usuario.afterSave.recuperar'		=> 'enviarEmailRecuperar'
		);
	}

	public function enviarEmailBienvenida(CakeEvent $evento)
	{
		/**
		 * Html del correo
		 */
		$this->View					= new View();
		$this->Email				= ClassRegistry::init('Email');
		$this->View->viewPath		= 'Emails' . DS . 'html';
		$this->View->layoutPath		= 'Emails' . DS . 'html';

		$usuario					= $evento->data;
		$mensaje = "<p><strong>Nombre: </strong>";
		$mensaje .= sprintf('%s %s %s', $usuario['Usuario']['nombre'], $usuario['Usuario']['apellido_paterno'], $usuario['Usuario']['apellido_materno']);
		$mensaje .="</p><p><strong>Email: </strong>";
		$mensaje .= $usuario['Usuario']['email'];
		$mensaje .="</p>";

		$this->View->set(compact('usuario', 'mensaje'));
		$html						= $this->View->render('vista_correo_registro_cuenta', 'default');

		$this->Email->create();
		$this->Email->save(array(
			'asunto'					=> 'Notificación de Registro',
			'destinatario_email'		=> $usuario['Usuario']['email'],
			'destinatario_nombre'		=> $usuario['Usuario']['nombre'],
			'remitente_email'			=> 'sitio@zsmotor.cl',
			'remitente_nombre'			=> 'ZSmotor',
			'cc'						=> null,
			'bcc'						=> null,
			'origen'					=> null,
			'via'						=> null,
			'procesado'					=> false,
			'enviado'					=> false,	
			'reintentos'				=> 0,
			'html'						=> $html,
			'atachado'					=> null,
			'traza'						=> null,
		));
	}

	public function enviarEmailRecuperar(CakeEvent $evento)
	{
		/**
		 * Html del correo
		 */
		$this->View					= new View();
		$this->View->viewPath		= 'Emails' . DS . 'html';
		$this->View->layoutPath		= 'Emails' . DS . 'html';
		$this->Email				= ClassRegistry::init('Email');

		$usuario					= $evento->data;
		$mensaje = '<a href="'.Router::url('/', true).'usuarios/recuperar/'.$usuario['Usuario']['codigo'].'">aquí</a>';
		$this->View->set(compact('usuario', 'mensaje'));
		$html						= $this->View->render('vista_correo_recuperar', 'default');

		
		/**
		 * Guarda el email a enviar
		 */
		$this->Email				= ClassRegistry::init('Email');
		$this->Email->create();
		$this->Email->save(array(
			'asunto'					=> 'Recuperación de contraseña',
			'destinatario_email'		=> $usuario['Usuario']['email'],
			'destinatario_nombre'		=> sprintf('%s %s %s', $usuario['Usuario']['nombre'], $usuario['Usuario']['apellido_paterno'], $usuario['Usuario']['apellido_materno']),
			'remitente_email'			=> 'sitio@zsmotor.cl',
			'remitente_nombre'			=> 'ZSmotor',
			'cc'						=> null,
			'bcc'						=> null,
			'origen'					=> null,
			'via'						=> null,
			'procesado'					=> false,
			'enviado'					=> false,
			'reintentos'				=> 0,
			'html'						=> $html,
			'atachado'					=> null,
			'traza'						=> null,
		));
	}
}
