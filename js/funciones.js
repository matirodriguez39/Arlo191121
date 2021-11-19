// JavaScript Document
$(document).ready(function(e) {   
	//WHATSAPP
	$('header .wp').append('<a href="https://api.whatsapp.com/send?phone=5491131745499&text=Hola!%20ARLOEYX,%20quiero%20contactarme%20contigo!" id="whatsapp" target="_blank"><img src="img/whatsapp.png" alt="WHATSAPP"></a>');
	//WHATSAPP 
	$('input[name="hora"]').mask('99:99',{placeholder:"00:00"});
	//$('input[name="fecha"]').mask('99/99/9999',{placeholder:"00/00/0000"});
	//ancla
	$("a.ancla").on('click', function(e){
		e.preventDefault();
		var volver  = $(this).attr("href");
		$('html, body').animate({
			scrollTop: $(volver).offset().top
		}, 1000, 'easeInQuint');
	});
	//frm_ct
	$('.frm_ct').on('click', function(e){
		e.preventDefault();
		$('#form_contacto').fadeIn(200)	
	});
	$('#form_contacto i').on('click', function(e){
		$('#form_contacto').fadeOut(300)	
	});
	
	//Mobile	
	if($(window).width() < 1000){
		$('#cotizador').appendTo('nav');
		
		
		$('header').before().on('click', function(){
			$('header').toggleClass('open');
			$('nav').fadeToggle(300);
		});
	}
});
$(window).scroll(function(e) {
var st = $(window).scrollTop();
	if(st > 10){
		$('header').addClass('fix')
	}else{
		$('header').removeClass('fix')		
	}
});
function playFlota(){	
	var myVar2 = setInterval(cuentaAuto, 15);
	function cuentaAuto() {
		var autos = $('#autos').data('rel');
		   num1 = parseFloat($('#autos').html());
		if(num1 < autos){
			num1 += 1;
			//var num1 = num1.toFixed(0)
			$('#autos').html(num1);
		}else{
			clearInterval(myVar2);
		}	
	}
}
function playViajes(){	
	var myVar1 = setInterval(cuentaViajes, 15);
	function cuentaViajes() {
		var viajes = $('#viajes').data('rel');
		   num1 = parseFloat($('#viajes').html());
		if(num1 < viajes){
			num1 += 100;
			//var num1 = num1.toFixed(0)
			$('#viajes').html(num1);
		}else{
			clearInterval(myVar1);
		}	
	}
}
function playEmpresas(){	
	var myVar3 = setInterval(cuentaEmpresas, 3);
	function cuentaEmpresas() {
		var empresas = $('#empresas').data('rel');
		   num1 = parseFloat($('#empresas').html());
		if(num1 < empresas){
			num1 += 1;
			//var num1 = num1.toFixed(0)
			$('#empresas').html(num1);
		}else{
			clearInterval(myVar3);
		}	
	}
}

$('input:not([type="hidden"]), textarea').on('keypress', function(){
	$(this).parent().removeClass('error');
});
$('#footer form').append('<div class="msg"></div>');
//FORMULARIO
var click = 0
$("#footer form").submit(function(e) {
	e.preventDefault();
	var form = $(this);
	form.find('button').attr('disabled', 'disabled');
	
	var validForm = true;
	form.find('input:not([type="hidden"]), textarea').each(function(){
		if( $(this).val().trim() ==''){
			$(this).focus();
			$(this).parent().addClass('error');
			validForm = false;
			form.find('button').removeAttr('disabled');
			click = 0
			return false;
		}
	})
	click ++;

	console.log(click);
	if(validForm && click == 1){

		form.find('button').css('visibility', 'hidden');
		var overlay = $('form .msg');
		var action = 'mail.php';
		var data = form.serializeObject();
		console.log(action);console.log(data);
		dataLayer.push({'event': 'Form_sent'});
		overlay.html('Estamos enviando tu consulta...').fadeIn(300);
		form.prepend('<img src="img/loading.gif" class="loadingGif">');


			$.ajax({
				type: 'POST',
				url: action,
				data: data,
				error: function(data){
					console.log("form:error");
					overlay.html('Error al enviar formulario. Volvé a intentarlo más tarde.').fadeIn(300).stop(true,true).delay(1500).fadeOut(300);
					console.log(data);
					click = 0
				},
				success: function(data){
					console.log("form:success");
					$("#footer input, #footer textarea").val('')

					overlay.html('¡Gracias! Pronto nos pondremos en contacto.');					
					form.prepend('<img src="img/check.gif" class="loadingGif check">');
					setTimeout(function(){
						overlay.fadeOut(300)
						form.find('button').css('visibility', 'initial');
						form.find('button').removeAttr('disabled');
						form.find('.loadingGif').remove();
						click = 0;

						console.log('click');
					}, 6000)
				}
			});


	}
	else{
		//overlay.html('Por favor, complete todos los campos requeridos.').fadeIn(300).delay(1500).fadeOut(300);

	}


});
$('#form_contacto form').append('<div class="msg"></div>');
//FORMULARIO
$("#form_contacto form").submit(function(e) {

	e.preventDefault();

	var form = $(this);
	form.find('button').attr('disabled', 'disabled');
	
	var validForm = true;
	form.find('input:not([type="hidden"]), textarea').each(function(){
		if( $(this).val().trim() ==''){
			$(this).focus();
			$(this).parent().addClass('error');
			validForm = false;
			form.find('button').removeAttr('disabled');
			click = 0
			return false;
		}
	})
	click ++;

	console.log(click);
	if(validForm && click == 1){

		form.find('button').css('visibility', 'hidden');
		var overlay = $('form .msg');
		var action = 'send.php';
		var data = form.serializeObject();
		console.log(action);
		console.log(data);
		dataLayer.push({'event': 'Form_sent'});
		overlay.html('Estamos enviando tu consulta...').fadeIn(300).delay(1500).fadeOut(300);
		form.prepend('<img src="img/loading.gif" class="loadingGif">');

			$.ajax({
				type: 'POST',
				url: action,
				data: data,
				error: function(data){
					console.log("form:error");
					overlay.html('Error al enviar formulario. Volvé a intentarlo más tarde.').fadeIn(300).stop(true,true).delay(1500).fadeOut(300);
					$("#form_contacto").fadeOut(300)
					click = 0
					console.log(data);
				},
				success: function(data){
					console.log("form:success");
					$("#form_contacto input, #form_contacto textarea").val('')
					form.prepend('<img src="img/check.gif" class="loadingGif check">');
					overlay.html('¡Gracias! Pronto nos pondremos en contacto.').fadeIn(300)
					setTimeout(function(){
						overlay.fadeOut(300)
						$("#form_contacto").fadeOut(300, function(){
							form.find('button').css('visibility', 'initial');
							form.find('button').removeAttr('disabled');
							form.find('.loadingGif').remove();
					click = 0
						});
					}, 6000)				
					console.log(data);
				}
			});


	}
	else{
		//overlay.html('Por favor, complete todos los campos requeridos.').fadeIn(300).delay(1500).fadeOut(300);

	}


});

// serializes a form into an object.
(function($,undefined){
  '$:nomunge'; // Used by YUI compressor.

  $.fn.serializeObject = function(){
    var obj = {};

    $.each( this.serializeArray(), function(i,o){
      var n = o.name,
        v = o.value;

        obj[n] = obj[n] === undefined ? v
          : $.isArray( obj[n] ) ? obj[n].concat( v )
          : [ obj[n], v ];
    });

    return obj;
  };

})(jQuery);