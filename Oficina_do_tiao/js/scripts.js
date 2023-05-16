$(function(){

	//Aqui vai todo nosso código de javascript.
	$('nav.mobile').click(function(){
		//O que vai acontecer quando clicarmos na nav.mobile!
		var listaMenu = $('nav.mobile ul');
		//Abrir menu através do fadein
		/*
		if(listaMenu.is(':hidden') == true){
			listaMenu.fadeIn();
		}
		else{
			listaMenu.fadeOut();
		}
		*/

		//Abrir ou fechar sem efeitos
		/*
		
		if(listaMenu.is(':hidden') == true){
			//listaMenu.show();
			listaMenu.css('display','block');
		}
		else{
			//listaMenu.hide();
			listaMenu.css('display','none');
		}
		*/

		if(listaMenu.is(':hidden') == true){
			//var icone =  $('.botao-menu-mobile i');
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-solid fa-bars'); 
			icone.addClass('fa-solid fa-x'); 
			listaMenu.slideToggle();
		}
		else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-solid fa-x');
			icone.addClass('fa-solid fa-bars');
			listaMenu.slideToggle();
		}

		//bugou, e quando clicava em contato, não sumia a lista. este cófigo foi para corrigir
		$('nav.mobile ul li #contato').click(function(){
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-solid fa-x');
			icone.addClass('fa-solid fa-bars');
			listaMenu.slideToggle();
			listaMenu.is(':hidden') == true;
		})

	});


	
	if($('target').length > 0){
		//O elemento existe, portanto precisamos dar o scroll em algum elemento.
		var elemento = '#'+$('target').attr('target');

		var divScroll = $(elemento).offset().top;

		$('html,body').animate({scrollTop:divScroll},2400);
	}

	carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');
			
			/*
			setTimeout(function(){
				initialize();
				addMarker(28.3922,-80.6077,'',"Cabo Canaveral",undefined,false);

			},1000);
			*/
			$('.container-principal').fadeIn(1000);
			window.history.pushState('', '',pagina);

			return false;
		})
	}

});