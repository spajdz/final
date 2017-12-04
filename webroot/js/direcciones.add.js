/* jshint bitwise:true, browser:true, eqeqeq:true, forin:true, globalstrict:true, indent:4, jquery:true,
   loopfunc:true, maxerr:3, noarg:true, node:true, noempty:true, onevar: true, quotmark:single,
   strict:true, undef:true, white:false */
/* global number_format */

/*!
 * Hookipa 2015
 */

//<![CDATA[
'use strict';

/**
 * jQuery
 */
jQuery(document).ready(function($)
{
	/**
	 * Cambia Tipo de Despacho
	 */
	$('#selectDespacho').on('change', function()
	{
		var $this = $(this),
			tipo_despacho = $this.val();

		if(tipo_despacho == 1){
			$('#despachoDomicilio').hide();

			$('#retiroSucursal').show();

		}else{
			$('#retiroSucursal').hide();
			$('#despachoDomicilio').show();
		}
	});
	/**
	 * Seleccion de direccion existente
	 */
	$('#DireccionId').on('change', function()
	{
		var $this			= $(this),
			direcion_id		= $this.val(),
			x;

		/**
		 * Carga información de la direccion seleccionada
		 */
		if ( direcion_id !== '' )
		{
			$.ajax(
			{
				async		: false,
				dataType	: 'json',
				url			: $.webroot('direcciones/ajax_view/' + direcion_id),
				success		: function(data)
				{
					if ( data.success )
					{
						$('[name="data[Direccion][calle]"]').val(data.data.Direccion.Direccion.calle);
						$('[name="data[Direccion][numero]"]').val(data.data.Direccion.Direccion.numero);
						$('[name="data[Direccion][depto]"]').val(data.data.Direccion.Direccion.depto);
						$('[name="data[Direccion][region_id]"]').val(data.data.Direccion.Comuna.region_id);
						$('[name="data[Direccion][comuna_id]"]').removeAttr('disabled');
						for ( x in data.data.Comunas )
						{
							if ( data.data.Comunas.hasOwnProperty(x) )
							{
								$('[name="data[Direccion][comuna_id]"]').append(
									$('<option />',
									{
										value		: x,
										html		: data.data.Comunas[x]
									})
								);
							}
						}
						$('[name="data[Direccion][comuna_id]"]').val(data.data.Direccion.Comuna.id).removeAttr('disabled');
						$('[name="data[Direccion][codigo_postal]"]').val(data.data.Direccion.Direccion.codigo_postal);
						$('[name="data[Direccion][telefono]"]').val(data.data.Direccion.Direccion.telefono);
						
					}
				}
			});
		}

		/**
		 * Limpia los datos del formulario
		 */
		else
		{
			$('[name="data[Direccion][calle]"]').val('');
			$('[name="data[Direccion][numero]"]').val('');
			$('[name="data[Direccion][depto]"]').val('');
			$('[name="data[Direccion][region_id]"]').val('');
			$('[name="data[Direccion][comuna_id]"]').html(
				$('<option />',
				{
					value		: '',
					html		: '-- Selecciona una comuna'
				})
			);
			$('[name="data[Direccion][codigo_postal]"]').val('');
			$('[name="data[Direccion][telefono]"]').val('');
			$('.js-valor-despacho').text('$0');
		}
	});


	/**
	 * Seleccion Region - Comuna
	 */
	$('#DireccionComunaId').remoteChained(
	{
		parents			: '#DireccionRegionId',
		url				: $.webroot('comunas/ajax_region'),
		type			: 'POST',
		loading			: '-- Cargando comunas',
		bootstrap		: {
			''		: '-- Selecciona una comuna'
		}
	});
	$('#DireccionRegionId').trigger('change');


	/**
	 * Valor despacho
	 */
	$('#DireccionComunaId').on('change', function()
	{
		var $this			= $(this),
			comuna_id		= $this.val();

		$.ajax(
		{
			dataType	: 'json',
			url			: $.webroot('tarifa_despachos/ajax_tarifa/' + comuna_id),
			success		: function(data)
			{
				if ( data.Info.extrema == '1' )
				{
					$('.js-observacion').text(data.Info.observacion_extrema);
				}
				if ( data.Total )
				{
					$('.js-valor-despacho').text('$' + number_format(data.Total, 0, null, '.'));
				}
				else
				{
					$('.js-valor-despacho').text('$0');
				}
			}
		});
	});


	/**
	 * Enmascaramiento y restriccion de inputs
	 */
	$('#DireccionTelefono').mask('9 999 9999', { placeholder: 'X' });
	$('#DireccionCodigoPostal').mask('9999999', { placeholder: 'X' });


	/**
	 * Validaciones
	 */
	 $.validator.addMethod('tipoDespacho', function(value, element)
	{	
		return ($('#selectDespacho').val() == 2);
	});

	var validate		= {};
	$('#DireccionAddForm').validate($.extend({}, validate, $.configValidacion,
	{
		rules			: {
			'data[Direccion][calle]': {
				tipoDespacho		: true,
			},
			'data[Direccion][numero]': {
				tipoDespacho		: true
			},
			'data[Direccion][region_id]': {
				tipoDespacho		: true
			},
			'data[Direccion][comuna_id]': {
				tipoDespacho		: true
			},
			'data[Direccion][codigo_postal]': {
				tipoDespacho		: true,
				digits			: true,
				rangelength		: [7, 7]
			},
			'data[Direccion][telefono]': {
				tipoDespacho		: true
			}
		},
		messages		: {
			'data[Direccion][calle]': {
				tipoDespacho		: 'Debes ingresar tu calle',
			},
			'data[Direccion][numero]': {
				tipoDespacho		: 'Debes ingresar el número de tu dirección'
			},
			'data[Direccion][region_id]': {
				tipoDespacho		: 'Debes seleccionar una región'
			},
			'data[Direccion][comuna_id]': {
				tipoDespacho		: 'Debes seleccionar una comuna'
			},
			'data[Direccion][codigo_postal]': {
				tipoDespacho		: 'Debes ingresar el código postal',
				digits			: 'El código postal solo pueden ser dígitos',
				rangelength		: 'El código postal solo puede tener 7 dígitos'
			},
			'data[Direccion][telefono]': {
				tipoDespacho		: 'Debes ingresar un celular de contacto'
			}
		}
	}));
});

//]]>
