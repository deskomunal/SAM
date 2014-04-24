/*
 * jQuery CSS popUp
 * http://dixso.net/
 *
 * Copyright (c) 2009 Julio De La Calle Palanques
 * anfibic.com
 *
 * Date: 2009-06-19 14:59:00 - (Viernes, 19 Jun 2009)
 *
 */

//Variable que almacena la posición del scroll, por defecto tiene valor 0.
scrollCachePosition = 0;
function popupCssShow (URL, width, height) { //Parámetros: URL (URL, Anchura de la capa, Altura de la capa) 
	if (typeof document.body.style.maxHeight === "undefined") {//Añade la propiedad maxHeight para IE6.
		$("body","html").css({height: "100%", width: "100%"});
	}
	//La capa 'cssBackground' ocupa toda la pantalla para darle una opacidad.
	//La capa 'cssPopupContainer' es la capa madre del PopUp.
	if (!$("#cssBackground").length>0) {
		$("body").append("<div id=\"cssBackground\"></div><div id=\"cssPopupContainer\"><div id=\"cssPopup\"></div></div>"); //Añade las capas en la página.
	}
	if (width!=undefined) {
		$("#cssPopup").css("width",width);
	}
	if (height!=undefined) {
		$("#cssPopup").css("height",height);
		$("#cssPopup").css("overflow","auto");
	}
	$("#cssBackground").slideDown("slow"); //Efecto jQuery
	scrollCachePosition = $(window).scrollTop();
	window.top.scroll(0,0);
	$("#cssPopup").load(URL,function(){
		//$("#cssPopupContainer").center(); //Si activamos esta línea y desactivamos la de abajo nos centrará el PopUp en el medio de la pantalla.
		$("#cssPopupContainer").css("top",50);
		ancho=$(window).width();
		$("#cssPopupContainer").slideDown("fast", function () {
			anchopopup=$("#cssPopup").width();
			$("#cssPopupContainer").css("width",ancho);			
		});
	});
}

function popupCssHide () {
	$("#cssPopupContainer").slideUp("fast", function () {
		$("#cssBackground").fadeOut("fast",function () {
			$("#cssBackground").remove(); //Elimina la capa 'cssBackground'.
			$("#cssPopupContainer").remove(); //Elimina la capa 'cssPopupContainer'.
		});
	});
	if (scrollCachePosition > 0) {
		window.top.scroll(0,scrollCachePosition); //Vuelve a la posición donde estaba el scroll.
		//Reseteamos la variable scrollCachePosition a 0 para poder ejecutar el script tantas veces como sea necesario.
		scrollCachePosition = 0;
	}
}