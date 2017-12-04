<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController
{
	public $name = 'Pages';
	public $uses = array('Banner');

	public function display()
	{
		$path	= func_get_args();
		$count	= count($path);
		if ( ! $count )
			$this->redirect('/');

		$page	= $subpage = $title_for_layout = null;

		if ( ! empty($path[0]) )
			$page = $path[0];

		if ( ! empty($path[1]) )
			$subpage = $path[1];

		if ( ! empty($path[$count - 1]) )
			$title_for_layout = Inflector::humanize($path[$count - 1]);

		if($page == 'ventasmayoristas'){
			$miniBanner = $this->Banner->find('first', array(
				'conditions' => array(
					'Banner.activo' 	=> 1,
					'Banner.pagina_id' 	=> 5
				)
			));
			BreadcrumbComponent::add('Ventas Mayoristas');
			$this->set(compact('miniBanner'));
		}


		if($page == 'nosotros'){
			$miniBanner = $this->Banner->find('first', array(
				'conditions' => array(
					'Banner.activo' 	=> 1,
					'Banner.pagina_id' 	=> 6
				)
			));
			BreadcrumbComponent::add('Nosotros');
			$this->set(compact('miniBanner'));
		}

		if($page == 'pago'){
			$miniBanner = $this->Banner->find('first', array(
				'conditions' => array(
					'Banner.activo' 	=> 1,
					'Banner.pagina_id' 	=> 7
				)
			));
			BreadcrumbComponent::add('Formas de Pago');
			$this->set(compact('miniBanner'));
		}
		if($page == 'politicastiendaonline'){
			$miniBanner = $this->Banner->find('first', array(
				'conditions' => array(
					'Banner.activo' 	=> 1,
					'Banner.pagina_id' 	=> 8
				)
			));
			BreadcrumbComponent::add('Políticas de Tienda Online');
			$this->set(compact('miniBanner'));
		}

		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}
