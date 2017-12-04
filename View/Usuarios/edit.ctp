<?= $this->Html->script(array(
	'vendor/jquery.maskedinput.min',
	'vendor/jquery.validate.min',
	'vendor/jquery.Rut.min',
	'vendor/jquery.alphanumeric.pack',
	'usuarios.edit'
), array('inline' => false)) ;?>
<style type="text/css" media="screen">
 .registro .breadcrumb {
    margin-top: 10px;
} 
</style>
  

    <div class="franja-search datos">
      <div class="container-fluid">
        <div class="col-lg-3">
          <h3><strong>Panel de Usuario  </strong></h3>
        </div>
        <div class="col-lg-3">
        <?= $this->Html->link(
          'Mis datos <i class="fa fa-angle-right"></i>',
          array('controller' => 'usuarios', 'action' => 'edit'),
          array('escape' => false, 'class' => ($this->params['controller'] == 'usuarios' ? 'active btn btn-default' : 'btn btn-default'))
        ); ?>          
        </div>
        <div class="col-lg-3">

        <?= $this->Html->link(
          'Mis direcciones <i class="fa fa-angle-right"></i>',
          array('controller' => 'direcciones', 'action' => 'index'),
          array('escape' => false, 'class' => ($this->params['controller'] == 'direcciones' ? 'active btn btn-default' : 'btn btn-default'))
        ); ?>          
        </div>
        <div class="col-lg-3">
      <?= $this->Html->link(
        'Mis compras <i class="fa fa-angle-right"></i>',
        array('controller' => 'compras', 'action' => 'index'),
        array('escape' => false, 'class' => ($this->params['controller'] == 'compras' ? 'active btn btn-default' : 'btn btn-default'))
      ); ?>          
        </div>

      </div>
    </div>

    <div class="container-fluid datos-producto" >
      <div class="registro clearfix" style="margin-top: 0px">
        <div class="col-md-12">
          <?= $this->element('breadcrumbs'); ?>
        </div>
      </div>
    </div>
      
    <div class="container-fluid interior">
      <div class="registro clearfix">
       
        <div class="col-md-12">
          <h4><strong>Mis Datos / Actualizar</strong></h4>
        </div>
      </div>
      <!-- tabla -->
      <div class="col-md-12 tabla-carro">
        <div class="modalidad clearfix">
          <p>| 01 Ingresa o Actualiza Tus Datos</p>
        </div>
        <div class="formulario-datos">
            <?= $this->Form->create('Usuario', array(
                'url' => array('controller' => 'usuarios', 'action' => 'edit'),                        
                'class' => 'form-horizontal',
                'type' => 'file',
                'inputDefaults' => array('label' => false,'div' => false)
                )
            ); ?>                                 

               <?= $this->Form->hidden('id'); ?>


                <?
                // if($this->request->data['Usuario']['usuario_tipo_id']==2){
                 ?> 


                  <p>Elige una Imagen (150 x 150 px).</p>                                        
                  <div class="form-group">
                      <label class="sr-only" for="textinput"></label>
                      <div class="col-lg-8">

                          <?php if($FotoActual != "") { ?>
                              <?= $this->Html->image($FotoActual); ?>
                          <? }?>
                              <?= $this->Form->input('imagen', array('type' => 'file', 'class' => '')); ?>

                      </div>                               
                  </div>
                   <div class="form-group">
                      <div class="col-lg-8">
                        <label class="sr-only" for="textinput"></label>
                        <div class="col-lg-6">
                          <?= $this->Form->label('mostrar_imagen', 'Mostrar Foto de Usuario '); ?>
                          <?= $this->Form->input('mostrar_imagen', array( 'class' => 'icheckbox')); ?>                  
                        </div>
                      </div>                               
                  </div>


                <?  
                // }
                ?>



                <div class="form-group">
                    <label class="sr-only" for="textinput"></label>
                    <div class="col-lg-6">
                      <?= $this->Form->input('nombre', array('placeholder' => 'Nombre', 'class' => 'form-control input-md')); ?>                  
                    </div>

                    <label class="sr-only" for="apellido_paterno"></label>
                    <div class="col-lg-6">
                      <?= $this->Form->input('apellido_paterno', array('placeholder' => 'Apellido Paterno', 'class' => 'form-control input-md')); ?>
                    </div>

                    <label class="sr-only" for="apellido_materno"></label>
                    <div class="col-lg-6">
                      <?= $this->Form->input('apellido_materno', array('placeholder' => 'Apellido Materno', 'class' => 'form-control input-md')); ?>
                    </div>

                    <label class="sr-only" for="email"></label>
                    <div class="col-lg-6">
                      <?= $this->Form->input('email', array('placeholder' => 'Email', 'class' => 'form-control input-md')); ?>
                    </div>

                    <label class="sr-only" for="repetir_email"></label>
                    <div class="col-lg-6">
                      <?= $this->Form->input('repetir_email', array('placeholder' => 'Confirma tu Email', 'class' => 'form-control input-md')); ?>
                    </div>

                    <label class="sr-only" for="telefono"></label>
                    <div class="col-lg-6">
                      <?= $this->Form->input('telefono', array('type' => 'text', 'maxlength' => 10,'placeholder' => 'Celular (8 últimos digitos)', 'class' => 'form-control input-md'));?>
                    </div>

                    <label class="sr-only" for="sexo"></label>
                    <div class="col-lg-6">
                      <p>Seleccione sexo.</p>                                   
                      <?= $this->Form->input('sexo', array('type' => 'radio', 'class' => '', 'legend' => false, 'label' => array('class' => 'sex'), 'options' => array('Masculino', 'Femenino'))); ?>
                    </div>

                    <label class="sr-only" for="fecha_nacimiento"></label>
                    <div class="col-lg-6">
                      <p>Fecha de Nacimiento.</p> 
                      <?= $this->Form->input('fecha_nacimiento', array(
                            'dateFormat' => 'DMY',
                            'separator' => false,
                            'empty' => true,
                            'minYear' => date('Y') - 100,
                            'maxYear' => date('Y') - 18)
                            ); ?>
                    </div>
                </div>




                <div class="actualizar clearfix">
                  <?= $this->Form->button('Guardar y Actualizar', array('id'=>'enviar', 'name'=>'enviar', 'class' => 'seleccion pull-right active-item', 'div' => false)); ?>
                </div>                

            <?= $this->Form->end(); ?>
        </div>
      </div>
       
    </div>


