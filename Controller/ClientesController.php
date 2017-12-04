<?php
App::uses('AppController', 'Controller');
class ClientesController extends AppController
{
	public function admin_index()
	{
		$clientes	= $this->Cliente->find('all');
		$this->set(compact('clientes'));
	}
	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Cliente->create();
			if($this->Cliente->save($this->request->data)){
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
	}
	public function admin_edit($id = null)
	{
		if ( ! $this->Cliente->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Cliente->save($this->request->data) )
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
			$this->request->data	= $this->Cliente->find('first', array(
				'conditions'	=> array('Cliente.id' => $id)
			));
		}
		$administradores	= $this->Cliente->Administrador->find('list');
		$this->set(compact('administradores'));
	}
	public function admin_delete($id = null)
	{
		$this->Cliente->id = $id;
		if ( ! $this->Cliente->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ( $this->Cliente->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	public function admin_exportar()
	{
		$datos			= $this->Cliente->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Cliente->_schema);
		$modelo			= $this->Cliente->alias;
		$this->set(compact('datos', 'campos', 'modelo'));
	}
	public function admin_activar($id = null)
	{
		$this->Cliente->id = $id;
		if ( ! $this->Cliente->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Cliente->save(array('activo' => true, 'eliminado' => false)) )
		{
			$this->Session->setFlash('Registro activado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al activar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	public function admin_desactivar($id = null)
	{
		$this->Cliente->id = $id;
		if ( ! $this->Cliente->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Cliente->save(array('activo' => false, 'eliminado' => true)) )
		{
			$this->Session->setFlash('Registro desactivado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al desactivar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}
	public function index()
    {
       
        $clientes = $this->Cliente->find('all', array(
            	'limit' => 8,
            	'conditions' => array(
            		'Cliente.activo' => 1
            	)
            )
        );  
        $this->set('CFG_PageTitle', 'ZS Motor | Nuestros clientes. Los que confían en nosotros');
        $this->set('CFG_PageDescription', 'Nos enorgullecemos de las soluciones entregadas a nuestros clientes. Su confianza refleja el buen servicio que otorgamos. Contáctanos al 22 630 77 20.');
        $this->set('CFG_PageKeywords', 'venta mayoristas, compra al por mayor, ventas para empresas, compra online, compra online al por mayor, venta y despacho, despacho de productos, productos automovilísticos.');
        /**
        * Camino de migas
        */
        BreadcrumbComponent::add('Clientes');
        $this->set('title', 'Productos');
        $this->set(compact('clientes'));
        //$this->set(compact('Slider', 'tipocorte', 'BannerNeumaticos', 'BannerLlantas', 'BannerPromociones', 'ListaNoticias'));
    }
}
