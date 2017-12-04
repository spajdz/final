fullwebroot = '/zsmotorv2';
$(document).ready(function(){
	init();
	$('.img-producto-zoom').zoom();

	$('.olimagen').click(function(){
		$('.imagenesproducto').removeClass('img-producto-zoom');

		$('.imagenesproducto').trigger('zoom.destroy');
		imagen_class = $(this).data('imagen');
		$('.'+imagen_class).addClass('img-producto-zoom');
		// alert(imagen_class)
		// $('.img-producto-zoom').zoom();
		return true;
	});

	$('#detalleCarousel').on('slid.bs.carousel', function() {
	    $('.img-producto-zoom').zoom();
	});

	// $('.js-buscar-productos').click(function(){
	// 	var categoria = $('#buscador-categoria').val();
	// 	var url,ancho,apernadura,perfil,aro;
	// 	var texto_busqueda = $('#buscador-filtro-'+ categoria).val();
	// 	if(typeof texto_busqueda != 'undefined' && texto_busqueda != null && texto_busqueda != '' ){
	// 		$('#ProductoFiltroForm').submit();
	// 	}else{
	// 		switch(categoria) {
	// 		    case 'neumaticos':

	// 		    	url 	= '/neumaticos';

	// 		    	ancho 	= $('#buscador-ancho').val();
	// 		    	perfil 	= $('#buscador-perfil').val();
	// 		    	aro 	= $('#buscador-aro').val();

	// 		    	if(typeof ancho != 'undefined' && ancho != null && ancho != '' ){
	// 		    		url += '/' + ancho;
	// 		    		if(typeof perfil != 'undefined' && perfil != null && perfil != '' ){
	// 		    			url += '/' + perfil;
	// 		    			if(typeof aro != 'undefined' && aro != null && aro != '' ){
	// 		    				url += '/' + aro;
	// 		    			}
	// 		    		}
	// 		    	}
	// 		        break;
	// 		    case 'llantas':
	// 		        url 		= '/llantas';

	// 		    	aro 		= $('#buscador-aro').val();
	// 		        apernadura 	= $('#buscador-apernadura').val();

	// 		        if(typeof aro != 'undefined' && aro != null && aro != '' ){
	// 		        	url += '/' + aro;
	// 		        	if(typeof apernadura != 'undefined' && apernadura != null && apernadura != '' ){
	// 		        		url += '/' + apernadura;
	// 		        	}
	// 		        }

	// 		        break;
	// 		    case 'accesorios':
	// 		        alert('accesorios')
	// 		        break;
	// 		    default:
	// 		        alert('sin categoria')
	// 		}
	// 		window.location = fullwebroot + url;
	// 	}
	// 	return false;
	// })

	// $('#buscador-marca').change(function(){
	// 	var t = $(this).val();
	// 	$.post(webroot + "vehiculos/modelos_marca/" + t, function(t) {
	// 		$('#buscador-modelo').html(t);
	// 		$('#buscador-modelo').select2('open');
	//     })

	// });

	// $('#buscador-modelo').change(function(){
	// 	var t = $(this).val();
	// 	var n = $('#buscador-marca').val();
	// 	$.post(webroot + "vehiculos/versiones_marca_modelo/" + n + '/' + t, function(t) {
	// 		$('#buscador-version').html(t);
	// 		$('#buscador-version').select2('open');
	//     })
	// });

	// $('#buscador-version').change(function(){
	// 	var t = $(this).val();
	// 	var n = $('#buscador-marca').val();
	// 	var m = $('#buscador-modelo').val();
	// 	$.post(webroot + "vehiculos/anos_marca_modelo_version/" + n + '/' + m + '/' + t, function(t) {
	// 		$('#buscador-ano').html(t);
	// 		$('#buscador-ano').select2('open');
	//     })
	// });

	// $('#buscador-ano').change(function(){
	// 	var t = $(this).val();
	// 	var n = $('#buscador-marca').val();
	// 	var m = $('#buscador-modelo').val();
	// 	var o = $('#buscador-version').val();
	// 	var c = $('#buscador-categoria').val();
	// 	if(c == 'neumaticos'){
	// 		$.post(webroot + "vehiculos/anchos_marca_modelo_version_ano/" + c + '/' + n + '/' + m + '/' + o + '/' + t, function(t) {
	// 			$('#buscador-ancho').html(t);
	// 			$('#buscador-ancho').select2('open');
	// 	    })
	// 	}else if(c == 'llantas'){
	// 		$.post(webroot + "vehiculos/aros_marca_modelo_version_ano/" + c + '/' + n + '/' + m + '/' + o + '/' + t, function(t) {
	// 			$('#buscador-aro').html(t);
	// 			$('#buscador-aro').select2('open');
	// 	    })
	// 	}
	// });

	// $('#buscador-ancho').change(function(){
	// 	var t = $(this).val();
	// 	var n = $('#buscador-marca').val();
	// 	var m = $('#buscador-modelo').val();
	// 	var o = $('#buscador-version').val();
	// 	var p = $('#buscador-ano').val();

	// 	$.post(webroot + "vehiculos/perfiles_marca_modelo_version_ano_ancho/" + n + '/' + m + '/' + o + '/' + p + '/' + t, function(t) {
	// 		$('#buscador-perfil').html(t);
	// 		$('#buscador-perfil').select2('open');
	//     })
	// });

	// $('#buscador-perfil').change(function(){
	// 	var t = $(this).val();
	// 	var n = $('#buscador-marca').val();
	// 	var m = $('#buscador-modelo').val();
	// 	var o = $('#buscador-version').val();
	// 	var p = $('#buscador-ano').val();
	// 	var q = $('#buscador-ancho').val();

	// 	$.post(webroot + "vehiculos/aros_marca_modelo_version_ano_ancho_perfil/" + n + '/' + m + '/' + o + '/' + p + '/' + q + '/' + t, function(t) {
	// 		$('#buscador-aro').html(t);
	// 		$('#buscador-aro').select2('open');
	// 		// Redireccinamiento automatico si consigue
			
	//     })
	// });

	// $('#buscador-aro').change(function(){
	// 	var t = $(this).val();
	// 	var n = $('#buscador-marca').val();
	// 	var m = $('#buscador-modelo').val();
	// 	var o = $('#buscador-version').val();
	// 	var p = $('#buscador-ano').val();

	// 	$.post(webroot + "vehiculos/apernaduras_marca_modelo_version_ano_aro/" + n + '/' + m + '/' + o + '/' + p + '/' + t, function(t) {
	// 		$('#buscador-apernadura').html(t);
	// 		$('#buscador-apernadura').select2('open');
	// 		// Redireccinamiento automatico si consigue
			
	//     })
	// });

	$("#dropllantas").click(function() {
        $("#llantas").addClass("active"), $("#accesorios").removeClass("active"), $("#neumaticos").removeClass("active")
    });

})	

function init(){
	$('#buscador-marca-neumaticos').select2();
	$('#buscador-marca-llantas').select2();
	$('#buscador-marca-index-llantas').select2();
	$('#buscador-marca-index-neumaticos').select2();
	$('#buscador-modelo-neumaticos').select2();
	$('#buscador-modelo-llantas').select2();
	$('#buscador-modelo-index-llantas').select2();
	$('#buscador-modelo-index-neumaticos').select2();
	$('#buscador-version-neumaticos').select2();
	$('#buscador-version-llantas').select2();
	$('#buscador-version-index-llantas').select2();
	$('#buscador-version-index-neumaticos').select2();
	$('#buscador-ano-neumaticos').select2();
	$('#buscador-ano-llantas').select2();
	$('#buscador-ano-index-llantas').select2();
	$('#buscador-ano-index-neumaticos').select2();
	$('#buscador-aro-neumaticos').select2();
	$('#buscador-aro-llantas').select2();
	$('#buscador-aro-index-llantas').select2();
	$('#buscador-aro-index-neumaticos').select2();
	$('#buscador-apernadura-llantas').select2();
	$('#buscador-apernadura-index-llantas').select2();
	$('#buscador-perfil-neumaticos').select2();
	$('#buscador-perfil-index-neumaticos').select2();
	$('#buscador-ancho-neumaticos').select2();
	$('#buscador-ancho-index-neumaticos').select2();
}

function changeMarca(element){
	var t = $(element).val();
	var tipo = $(element).data('tipo');
	$.post(webroot + "vehiculos/modelos_marca/" + t, function(t) {
		$('#buscador-modelo-'+tipo).html(t);
		$('#buscador-modelo-'+tipo).select2('open');
    })
}

function changeModelo(element){
    var t = $(element).val();
    var tipo = $(element).data('tipo');
	var n = $('#buscador-marca-'+tipo).val();
	$.post(webroot + "vehiculos/versiones_marca_modelo/" + n + '/' + t, function(t) {
		$('#buscador-version-'+tipo).html(t);
		$('#buscador-version-'+tipo).select2('open');
    })
}

function changeVersion(element){
    var t = $(element).val();
    var tipo = $(element).data('tipo');
	var n = $('#buscador-marca-'+tipo).val();
	var m = $('#buscador-modelo-'+tipo).val();
	$.post(webroot + "vehiculos/anos_marca_modelo_version/" + n + '/' + m + '/' + t, function(t) {
		$('#buscador-ano-'+tipo).html(t);
		$('#buscador-ano-'+tipo).select2('open');
    })
}

function changeAno(element){
    var t = $(element).val();
    var tipo = $(element).data('tipo');
	var n = $('#buscador-marca-'+tipo).val();
	var m = $('#buscador-modelo-'+tipo).val();
	var o = $('#buscador-version-'+tipo).val();
	var c = $('#buscador-categoria-'+tipo).val();
	if(tipo == 'neumaticos' || tipo == 'index-neumaticos'){
		$.post(webroot + "vehiculos/anchos_marca_modelo_version_ano/" + c + '/' + n + '/' + m + '/' + o + '/' + t, function(t) {
			$('#buscador-ancho-'+tipo).html(t);
			$('#buscador-ancho-'+tipo).select2('open');
	    })
	}else if(tipo == 'llantas' || tipo == 'index-llantas'){
		$.post(webroot + "vehiculos/aros_marca_modelo_version_ano/" + c + '/' + n + '/' + m + '/' + o + '/' + t, function(t) {
			console.log($('#buscador-aro-'+tipo));
			$('#buscador-aro-'+tipo).html(t);
			$('#buscador-aro-'+tipo).select2('open');
	    })
	}
}

function changeAncho(element){
    var t = $(element).val();
    var tipo = $(element).data('tipo');
	var n = $('#buscador-marca-'+tipo).val();
	var m = $('#buscador-modelo-'+tipo).val();
	var o = $('#buscador-version-'+tipo).val();
	var p = $('#buscador-ano-'+tipo).val();
	$.post(webroot + "vehiculos/perfiles_marca_modelo_version_ano_ancho/" + n + '/' + m + '/' + o + '/' + p + '/' + t, function(t) {
		$('#buscador-perfil-'+tipo).html(t);
		$('#buscador-perfil-'+tipo).select2('open');
    })
}

function changePerfil(element){
    var t = $(element).val();
    var tipo = $(element).data('tipo');
	var n = $('#buscador-marca-'+tipo).val();
	var m = $('#buscador-modelo-'+tipo).val();
	var o = $('#buscador-version-'+tipo).val();
	var p = $('#buscador-ano-'+tipo).val();
	var q = $('#buscador-ancho-'+tipo).val();

	$.post(webroot + "vehiculos/aros_marca_modelo_version_ano_ancho_perfil/" + n + '/' + m + '/' + o + '/' + p + '/' + q + '/' + t, function(t) {
		$('#buscador-aro-'+tipo).html(t);
		$('#buscador-aro-'+tipo).select2('open');
		// Redireccinamiento automatico si consigue
		
    })
}

function changeAro(element){
    var t = $(element).val();
    var tipo = $(element).data('tipo');
	var n = $('#buscador-marca-'+tipo).val();
	var m = $('#buscador-modelo-'+tipo).val();
	var o = $('#buscador-version-'+tipo).val();
	var p = $('#buscador-ano-'+tipo).val();
	$.post(webroot + "vehiculos/apernaduras_marca_modelo_version_ano_aro/" + n + '/' + m + '/' + o + '/' + p + '/' + t, function(t) {
		$('#buscador-apernadura-'+tipo).html(t);
		$('#buscador-apernadura-'+tipo).select2('open');
		// Redireccinamiento automatico si consigue
		
    })
}

function clickSearch(element){

	var categoria = $('#buscador-categoria').val();
	var categoria = $(element).data('tipo');
	var url,ancho,apernadura,perfil,aro;
	var texto_busqueda = $('#buscador-filtro-'+ categoria).val();
	if(typeof texto_busqueda != 'undefined' && texto_busqueda != null && texto_busqueda != '' ){
		$('#ProductoFiltroForm').submit();
	}else{
		switch(categoria) {
		    case 'neumaticos':

		    	url 	= '/neumaticos';

		    	ancho 	= $('#buscador-ancho-'+categoria).val();
		    	perfil 	= $('#buscador-perfil-'+categoria).val();
		    	aro 	= $('#buscador-aro-'+categoria).val();

		    	if(typeof ancho != 'undefined' && ancho != null && ancho != '' ){
		    		url += '/' + ancho;
		    		if(typeof perfil != 'undefined' && perfil != null && perfil != '' ){
		    			url += '/' + perfil;
		    			if(typeof aro != 'undefined' && aro != null && aro != '' ){
		    				url += '/' + aro;
		    			}
		    		}
		    	}
		        break;
		    case 'llantas':
		        url 		= '/llantas';

		    	aro 		= $('#buscador-aro-'+categoria).val();
		        apernadura 	= $('#buscador-apernadura-'+categoria).val();

		        if(typeof aro != 'undefined' && aro != null && aro != '' ){
		        	url += '/' + aro;
		        	if(typeof apernadura != 'undefined' && apernadura != null && apernadura != '' ){
		        		url += '/' + apernadura;
		        	}
		        }

		        break;
		     case 'index-neumaticos':

		    	url 	= '/neumaticos';

		    	ancho 	= $('#buscador-ancho-'+categoria).val();
		    	perfil 	= $('#buscador-perfil-'+categoria).val();
		    	aro 	= $('#buscador-aro-'+categoria).val();

		    	if(typeof ancho != 'undefined' && ancho != null && ancho != '' ){
		    		url += '/' + ancho;
		    		if(typeof perfil != 'undefined' && perfil != null && perfil != '' ){
		    			url += '/' + perfil;
		    			if(typeof aro != 'undefined' && aro != null && aro != '' ){
		    				url += '/' + aro;
		    			}
		    		}
		    	}
		        break;
		    case 'index-llantas':
		        url 		= '/llantas';

		    	aro 		= $('#buscador-aro-'+categoria).val();
		        apernadura 	= $('#buscador-apernadura-'+categoria).val();

		        if(typeof aro != 'undefined' && aro != null && aro != '' ){
		        	url += '/' + aro;
		        	if(typeof apernadura != 'undefined' && apernadura != null && apernadura != '' ){
		        		url += '/' + apernadura;
		        	}
		        }

		        break;
		    case 'accesorios':
		        alert('accesorios')
		        break;
		    default:
		        alert('sin categoria')
		}
		window.location.href = fullwebroot + url;
		return false;
	}
}

//hace scroll a la sección de reseñas

function Resenas_EscribirResena () {



	$("html, body").animate({scrollTop: $("#wrapper-pestanas").offset().top - 65}, 500, function () {



		$("div#wrapper-pestanas").find("a#btn-tab-reviews").click();



	});



}







//guarda una reseña de un producto

function Resenas_EnviarComentario (ProductoID) {	



	var puntuacion = 0;

	var comentario = $("div#nueva-resena").find("textarea#comentario").val();



	if ($("div#puntaje").find("a.marcada").size() > 0) {

		puntuacion = $("div#puntaje").find("a.marcada").attr("id");

	}



	comentario = comentario.trim();



	if (puntuacion == 0) {

		$('#myPopupAviso').find('.modal-body').html('Debe seleccionar la puntuación.');

		$('#myPopupAviso').modal('show');

		return;

	}



	if (comentario == "") {

		$('#myPopupAviso').find('.modal-body').html('Debe introducir su comentario.');

		$('#myPopupAviso').modal('show');

		return;

	}



	$.post(fullwebroot + "ProductoResenas/add/" + ProductoID + "/" + puntuacion + "/" + comentario, function (Respuesta) {



		



		var DataRespuesta = Respuesta.split("[*d*]");



		$('#myPopupAviso').find('.modal-body').html(DataRespuesta[1]);

		$('#myPopupAviso').modal('show');



		if (DataRespuesta[0] == "ERROR") {

			return;

		}



		$("div#puntaje").find("a").find("img").attr("src", fullwebroot + "/img/estrella-vacia.jpg");



		$("div#nueva-resena").find("textarea#comentario").val("");

		$("div#nueva-resena").hide();



	});



}







//cambia las imágenes de puntajes en las reseñas

function Resenas_Puntos_MouseOver (obj) {



	$("div#puntaje").find("a").find("img").attr("src", fullwebroot + "/img/estrella-vacia.jpg");



	var id = $(obj).attr("id");



	for (i = 1; i <= id; i++) {

		$("div#puntaje").find("a").eq(i - 1).find("img").attr("src", fullwebroot + "/img/estrella-llena.jpg");

	}



	



}







//cambia las imágenes de puntajes en las reseñas

function Resenas_Puntos_MouseOut (obj) {



	$("div#puntaje").find("a").find("img").attr("src", fullwebroot + "/img/estrella-vacia.jpg");



	if ($("div#puntaje").find("a.marcada").size() > 0) {



		var id = $("div#puntaje").find("a.marcada").attr("id");



		for (i = 1; i <= id; i++) {

			$("div#puntaje").find("a").eq(i - 1).find("img").attr("src", fullwebroot + "/img/estrella-llena.jpg");

		}



	}



}







//marca un puntaje en las reseñas

function Resenas_Puntos_MarcarPuntaje (obj) {



	$("div#puntaje").find("a").removeClass("marcada");



	$("div#puntaje").find("a").find("img").attr("src", fullwebroot + "/img/estrella-vacia.jpg");



	$(obj).addClass("marcada");



	var id = $(obj).attr("id");

	

	for (i = 1; i <= id; i++) {

		$("div#puntaje").find("a").eq(i - 1).find("img").attr("src", fullwebroot + "/img/estrella-llena.jpg");

	}



}






	