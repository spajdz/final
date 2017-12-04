<?= $this->Html->script(array(
	'vendor/jquery.validate.min',
	'usuarios.cambiar_clave'
), array('inline' => false)) ;?>
<div class="container-fluid datos-producto" style="margin-top: 50px;">
  <div class="registro clearfix">
    <div class="col-md-12">
      <?= $this->element('breadcrumbs'); ?>
    </div>
  </div>
</div>

<?= $this->element('alertas'); ?>
 
<div class="container">
  
  <div class="col-lg-4 col-lg-offset-3">
    <div class="iniciar-sesion forms form-active">
      <p><strong>Cambio de contraseña</strong></p>
      <p>Ingresa tu nueva contraseña de acceso a zsmotor.cl</p>
        <?= $this->Form->create('Usuario', array(                 
                  'class' => 'form-horizontal',
                  'inputDefaults' => array('label' => false,'div' => false)
                  )
            ); ?>
          <div class="form-group">
            <label class="sr-only" for="usuario"></label>  
            <div class="col-xs-12">
              <?= $this->Form->input('clave', array('type' => 'password','placeholder' => 'Contraseña', 'class'=>'form-control input-md', 'id'=> 'UsuarioClaveRecuperar')); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <label class="sr-only" for="contrasena"></label>
              <?= $this->Form->input('repetir_clave', array('type' => 'password','placeholder' => 'Repetir contraseña',  'class'=>'form-control input-md')); ?>
            </div>
          </div>            
          <div class="form-group">
            <label class="sr-only" for="entrar"></label>
            <div class="col-xs-12">
                <?= $this->Form->button('Enviar', array('type'=>'submit', 'id'=>'entrar', 'name'=>'entrar', 'class' => 'btn btn-primary')); ?>
            </div>
          </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
  </div>
</div>