<?= $this->Html->script(array(
    'vendor/jquery.maskedinput.min',
    'vendor/jquery.validate.min',
    'vendor/jquery.Rut.min',
    'vendor/jquery.alphanumeric.pack',
    'usuarios.add',
    'usuarios.login'
), array('inline' => false)) ;?>

<div class="container-fluid datos-producto" style="margin-top: 50px;">
	<div class="registro clearfix">
		<div class="col-md-12">
			<?= $this->element('breadcrumbs'); ?>
		</div>
	</div>
</div>


<div class="container">
	<?= $this->element('alertas'); ?>
  <div class="clearfix">
    <div class="col-md-8">
      <h4><strong>Inicio de Sesión / Registro Crear Cuenta Nueva</strong></h4>
    </div>
    <div class="col-md-4 hidden-xs">
      <h4>¿No puedes iniciar sesión?</h4>
    </div>
  </div>

  <!--inicio de sesion-->  
  <div class="col-lg-3">
    <div class="iniciar-sesion forms form-active">
      <p><strong>Iniciar Sesión</strong></p>
      <p>Si ya estás registrado, ingresa tus datos para iniciar sesión.</p>
        <?= $this->Form->create('Usuario', array(
                  'url' => array('controller' => 'usuarios', 'action' => 'login'),                        
                  'class' => 'form-horizontal',
                  'inputDefaults' => array('label' => false,'div' => false)
                  )
            ); ?>


          <div class="form-group">
            <label class="sr-only" for="usuario"></label>  
            <div class="col-xs-12">
              <?= $this->Form->input('email', array('type' => 'text', 'placeholder' => 'email', 'class' => 'form-control input-md')); ?>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <label class="sr-only" for="contrasena"></label>
              <?= $this->Form->input('clave', array('autocomplete' => 'new-password', 'type' => 'password', 'class' => 'form-control input-md','placeholder' => 'Contraseña')); ?>                  
            </div>
          </div>            

          <div class="form-group">
            <div class="col-xs-12">
              

            </div>
          </div>
          <div class="form-group">
            <label class="sr-only" for="entrar"></label>
            <div class="col-xs-12">
                <?= $this->Form->button('Entrar', array('type'=>'submit', 'id'=>'entrar', 'name'=>'entrar', 'class' => 'btn btn-primary')); ?>
            </div>
          </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
  <!--registro/-->      
  <div class="col-lg-5">
      <div class="registrarse forms">

        <?= $this->Form->create('Usuario', array(
            'url' => array('controller' => 'usuarios', 'action' => 'add'),                        
            'class' => 'form-horizontal',
            'inputDefaults' => array('label' => false,'div' => false)
            )
        ); ?>                                 

            <p><strong>Registrarse</strong></p>
            <p>Si eres usuario nuevo y no tienes cuenta, ingresa los datos para crear una.</p>
            <div class="form-group">
                <label class="sr-only" for="textinput"></label>
                <div class="col-lg-6">
                  <?= $this->Form->hidden('usuario_tipo_id', array('value' => '1')); ?>                 
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
                  <?= $this->Form->input('telefono', array('type' => 'text', 'maxlength' => 8,'placeholder' => 'Celular (8 últimos digitos)', 'class' => 'form-control input-md'));?>
                </div>
                
                <label class="sr-only" for="rut">rut</label>  
                <div class="col-lg-6">
                        <?= $this->Form->input('rut', array('class' => 'form-control input-md', 'placeholder' => 'Rut')); ?>
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

            <p><strong>Contraseña</strong></p>
            <p>Elige una contraseña.</p>                                        
            <div class="form-group">
                <label class="sr-only" for="textinput"></label>
                <div class="col-lg-6">
                    <?= $this->Form->input('clave', array('placeholder' => 'Ingresa una contraseña', 'type' => 'password', 'autocomplete' => 'off', 'value' => '', 'class' => 'form-control input-md')); ?>
                </div>
                <div class="col-lg-6">
                    <?= $this->Form->input('repetir_clave', array('placeholder' => 'Confirma tu contraseña', 'type' => 'password', 'autocomplete' => 'off', 'value' => '', 'class' => 'form-control input-md')); ?>
                </div>
                <div class="col-lg-6">
                  <?= $this->Form->button('Enviar', array('type'=>'submit', 'class' => 'btn btn-primary', 'div' => false)); ?>
                </div>                                
            </div>

        <?= $this->Form->end(); ?>

      </div>
  </div>
  <!--recuperar contraseña/-->      
  <div class="col-lg-4">
    <div class="recuperar forms">
      <p><strong>Recuperar Contraseña</strong></p>
      <p>Enviaremos un correo a tu cuenta de usuario registrada con los pasos para recuperar contraseña.</p>
        <?= $this->Form->create('Usuario', array(
            'url' => array('controller' => 'usuarios', 'action' => 'recuperar'),                        
            'class' => 'form-horizontal',
            'inputDefaults' => array('label' => false,'div' => false)
            )
        ); ?>
        <div class="form-group">
          <label class="sr-only" for="textinput">Text Input</label>  
          <div class="col-xs-12">
            <?= $this->Form->input('email', array('placeholder' => '*Email', 'class' => 'form-control input-md')); ?>                
          </div>
        </div>
        <div class="form-group">
          <label class="sr-only" for="singlebutton">Single Button</label>
            <div class="col-md-4">
              <?= $this->Form->button('Enviar', array('id'=>'enviar', 'name'=>'enviar', 'class' => 'btn btn-primary', 'div' => false)); ?>
            </div>
        </div>
      </form>
    </div>
  </div>

  </div>
</div>