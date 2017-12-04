<?php
App::uses('AppController', 'Controller');
class ServiciosController extends AppController
{
	public $uses = array('Servicio','Banner');
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$servicios	= $this->paginate();
		$this->set(compact('servicios'));
	}
	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Servicio->create();
			$this->request->data['Servicio']['slug'] = strtolower(Inflector::slug($this->request->data['Servicio']['nombre'], '-'));
			if ( $this->Servicio->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$sucursales	= $this->Servicio->Sucursal->find('list');
		$this->set(compact('sucursales'));
	}
	public function admin_edit($id = null)
	{
		if ( ! $this->Servicio->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Servicio->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->Servicio->find('first', array(
				'conditions'	=> array('Servicio.id' => $id)
			));
		}
		$sucursales	= $this->Servicio->Sucursal->find('list');
		$this->set(compact('sucursales'));
	}
	public function admin_delete($id = null)
	{
		$this->Servicio->id = $id;
		if ( ! $this->Servicio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ( $this->Servicio->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	public function admin_exportar()
	{
		$datos			= $this->Servicio->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Servicio->_schema);
		$modelo			= $this->Servicio->alias;
		$this->set(compact('datos', 'campos', 'modelo'));
	}
	public function admin_activar($id = null)
	{
		$this->Servicio->id = $id;
		if ( ! $this->Servicio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Servicio->saveField('activo', true) )
		{
			$this->Session->setFlash('Registro activado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al activar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	public function admin_desactivar($id = null)
	{
		$this->Servicio->id = $id;
		if ( ! $this->Servicio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Servicio->saveField('activo', false) )
		{
			$this->Session->setFlash('Registro desactivado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al desactivar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	public function index(){
		$banners	= $this->Banner->find('all', array(
			'conditions'		=> array(
				'Banner.activo' 	=> 1,
				'Banner.pagina_id' 	=> 1
			),
			'order'				=> 'orden',
			'fields'			=> array(
				'Banner.id'
				,'Banner.nombre'
				,'Banner.imagen'
				,'Banner.link'
				,'Banner.enlace_externo'
				,'Banner.texto'
			) 	
		));
		$servicios = $this->Servicio->find('all', array(
			'conditions' => array(
				'Servicio.activo' => 1
			)
		));
        $this->set('CFG_PageTitle', 'Servicios para tu vehículo | ZS Motor');
        $this->set('CFG_PageDescription', 'Cambio de aceite o una alineación para tu vehículo, encuéntralo todo aquí. Ingresa y ve los distintos servicios que tenemos para ti. Llama al 22 630 77 20.');
        $this->set('CFG_PageKeywords', 'Cambio de aceite, balanceo de auto, amortiguadores, baterías, pastillas de freno, servicios para autos, servicios automovilísticos, servicios de calidad, amortiguadores para auto, baterías de auto.');
        $showBreadFirst = false;
        /**
        * Camino de migas
        */
        BreadcrumbComponent::add('Servicios');
        $this->set(compact('banners', 'servicios', 'showBreadFirst'));
    }
    public function view($slug = null)
    {
    	if(empty($slug)){
    		$this->redirect('/servicios');
    	}

        $servicio = $this->Servicio->find(
            'first', array(
            'conditions' => array(
                'Servicio.slug' => $slug,
                'Servicio.activo' => 1
            ))
        );

        if(empty($servicio)){
            $this->redirect('/servicios');
        }
        
       $banners	= $this->Banner->find('all', array(
			'conditions'		=> array(
				'Banner.activo' 	=> 1,
				'Banner.pagina_id' 	=> 1
			),
			'order'				=> 'orden',
			'fields'			=> array(
				'Banner.id'
				,'Banner.nombre'
				,'Banner.imagen'
				,'Banner.link'
				,'Banner.enlace_externo'
				,'Banner.texto'
			) 	
		));

        $servicios = $this->Servicio->find('list', array('conditions' => array('Servicio.activo' => 1)));
      
        $this->set('CFG_PageTitle', $servicio['Servicio']['nombre']);
        $this->set('CFG_PageDescription', '');
        $this->set('CFG_PageKeywords', 'Servicios, Servicio Técnico, Mantención, Mantenimiento ' .$servicio['Servicio']['nombre']);
        BreadcrumbComponent::add('Servicios','/servicios');
        BreadcrumbComponent::add($servicio['Servicio']['nombre']);
        $this->set('title', 'Servicio');
        $this->set(compact('banners', 'servicios', 'servicio'));
        
    }
}
