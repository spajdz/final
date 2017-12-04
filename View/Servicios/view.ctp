<?= $this->Html->script(array(
    'vendor/jquery.maskedinput.min',
    'vendor/jquery.validate.min',
    'vendor/jquery.Rut.min',
    'vendor/jquery.alphanumeric.pack'
), array('inline' => false)) ;?> 
<?= $this->Html->script(array('servicio.form.js?v=3')); ?> 
<div class="container-fluid datos-producto" style="margin-top: 50px;">
    <div class="registro clearfix">
        <div class="col-md-12">
            <?= $this->element('breadcrumbs'); ?>
        </div>
    </div>
</div>
      
<div class="container interior">
    <div class="registro clearfix">
        <div class="col-md-12">
          <h4><strong>Reserva tu Hora</strong></h4>
        </div>
    </div>

    <div class="container" id="reserva">
        <div class="col-md-7">
            <div class="row contacto col-md-12 text-center">
                <a href="tel:56226307700"><span class="glyphicon glyphicon-phone"></span>+56 22 630 77 00</a>
                <h2>Llama desde<br><strong>Todo Chile</strong></h2>
                <p>Lunes a Viernes / 08:00 a 19:00 Hrs.</p>
                <p>Sábado / 09:00 a 14:00 Hrs.</p>
            </div>
            <div class="row item-servicio col-md-12 text-justify">
                <h2><?= $servicio['Servicio']['nombre'];?></h2>
                <p><?= $servicio['Servicio']['descripcion'];?></p>
            </div>

        </div>
        <div class="formulario col-md-5 col-sm-12" id="formulario">
            <div class="formulario" id="formulario">
                <div class="reserv-atencion forms ">
                    <p><strong>Reserva tu atención</strong></p>           
                        <div><?= $this->element('form-alerta'); ?></div>
                        <?= $this->Form->create('Contacto', array(
                          'url' => array('controller' => 'contacto', 'action' => 'index'),                        
                          'class' => 'form-horizontal',
                          'type' => 'file',
                          'inputDefaults' => array('label' => false,'div' => false)
                          )
                        ); ?>

                            <?= $this->Form->input('redirect', array('class' => 'hidden', 'value' => 'servicios')); ?>
                                <div class="form-group">
                                    <label class="sr-only" for="name">name</label>  
                                    <div class="col-xs-12">
                                        <?= $this->Form->input('nombre', array('class' => 'form-control input-md', 'placeholder' => 'Nombre y Apellido')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="sr-only" for="rut">rut</label>  
                                    <div class="col-xs-12">
                                        <?= $this->Form->input('rut', array('class' => 'form-control input-md', 'placeholder' => 'Rut')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="sr-only" for="email">email</label>  
                                    <div class="col-xs-12">
                                        <?= $this->Form->input('email', array('class' => 'form-control input-md', 'placeholder' => 'email')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="telefono">telefono</label>  
                                    <div class="col-xs-12">
                                        <?= $this->Form->input('telefono', array('class' => 'form-control input-md', 'placeholder' => 'telefono')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="sucursal">servicios</label>
                                    <div class="col-xs-12">
                                        <?= $this->Form->input('servicios', array(
                                                'options'           => $servicios,
                                                'empty'             => '-- Selecciona servicio',
                                                'class'             => 'form-control',
                                                'value'   => $servicio['Servicio']['id']
                                        )); ?>                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="mensaje">mensaje</label>  
                                    <div class="col-xs-12">

                                        <?= $this->Form->textarea('mensaje', array('class' => 'form-control', 'placeholder' => 'Ingrese comentario', 'row' => 65, 'cols' => 50 ));?>                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="enviar">enviar</label>
                                    <div class="col-xs-12">
                                        <?= $this->Form->input('Enviar', array('type' => 'button', 'class' => 'btn btn-primary')); ?>                            
                                    </div>
                                </div>
                        <?= $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>

</div>




 