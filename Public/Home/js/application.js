var flowplayer_key="#@77da14f1f33c7deaec4";

$(document).ready(
    function()
    {
        // Establecemos el click para todos los reproductores de vídeo de la página
        $("a.videoplayer").click(function(event) {
           $(this).unbind(event);
           $(this).flowplayer("/swf/flowplayer.swf",{key: flowplayer_key});
           return false;
        });
        $("a.videoplayer_playlist").each(function(event) {
            $(this).unbind(event);
            $.ajax({
                async:true,
                dataType:'script',
                url: "/videos/load_playlist/" + $(this).attr("id").split("_")[1]
            });

        });
        // Cargamos todos los flash de la página
        $("div.flash_container").each(function() {
            var flashvars = {};
            var params = {
                wmode: "transparent"
            };
            var attributes = {
                wmode: "transparent"
            };
            id = $(this).attr("id").split("_")[1];
            width = $(this).attr("width");
            height = $(this).attr("height");
            file = $(this).attr("file");
            div_id = "flash_replace_" + id;
            swfobject.embedSWF(file, div_id, width, height, "8.0.0","",flashvars,params,attributes);

        });
        // Todos los enlaces de tipo nicedit_external_link han de abrirse en una ventana nueva
        $("a[rel='external']").click(function() {
            window.open($(this).attr("href"));
            return false;
        });
                //Ocultamos los divs vacíos
        $(".botones-cms").each(function() {
            if ($(this).children().length==0) {
                $(this).hide();
            }
        });
        $(".gmap").each(function() {
            if ($(this).children().length==0) {
                $(this).hide();
            }
        });
        $(".galeria").each(function() {
            if ($(this).children().length==0) {
                $(this).hide();
            }
        });
    }
    );

function borrarcookiePublicidad(){
    var d = new Date();
    alert(document.cookie)
    document.cookie = "publicidad=1;expires=" + d.toGMTString() + ";" + ";";
    alert(document.cookie)
}

function publicidad(){
    var sesiones = document.cookie.split(";");
    var publicidad = false;
    
    for(i = 0; i < sesiones.length; i++){
        if(sesiones[i].trim() == "publicidad=1"){
            publicidad = true;
        }
    }

    if(publicidad == false){
        $('#all_superior').addClass('deshabilitar-fondo');
        $('#aviso').removeClass('oculto');
        document.cookie = "publicidad=1;;";
    }
}

function cerrar_publicidad(){

    $('#aviso').addClass('oculto');
    $('#all_superior').removeClass('deshabilitar-fondo');
}

function load_videos_from_folder(folder,videos,width,height) {
    var pl = [];
    for(var i=0;i<videos.length;i++) {
       pl.push({url: videos[i]});
    }
    $("a.videoplayer_playlist[id=videos_" + folder + "]").click(function(event) {
        $(this).unbind(event);
        $(this).flowplayer("/swf/flowplayer.swf",{key: flowplayer_key,  playlist: pl, plugins: {controls: {playlist: true}}});
        return false;
    });
}

function load_videos_from_folder_and_start(folder,videos,width,height) {
    var pl = [];
    for(var i=0;i<videos.length;i++) {
       pl.push({url: videos[i]});
    }
    $("a.videoplayer_playlist[id=videos_" + folder + "]").flowplayer("/swf/flowplayer.swf",{key: flowplayer_key, playlist: pl, plugins: {controls: {playlist: true}}});
}

function addCodeToFunction(func,code){
    if(func == undefined)
	return code;
    else{
	return function(){
	    func();
	    code();
	}
    }
}
//Para mostrar las categorias del boletin a la hora de registrarse el usuario 
function show_categorias_boletin_registro(){
	if($("#caja-categorias-boletin-registro").hasClass("oculto")){
		$("#caja-categorias-boletin-registro").removeClass("oculto");		
	}else{
		$("#caja-categorias-boletin-registro").addClass("oculto");
	}
}

/* POLITICA DE COOKIES */
var VoragoCMS = {};
VoragoCMS.Cookie = function(){
	this.cookie = {};
};

VoragoCMS.Cookie.prototype = {
	load: function(){
	    var pares = jQuery.map(document.cookie.split("; "), function(x){return x.split(/[=](.+)?/);});
	    var cookie = {};
	    for(var i = 0; i < pares.length; i += 3){
	            cookie[pares[i]] = pares[i+1];
	    }
		this.cookie = cookie;	
	},
	dump: function(){
		var str = [];  
		for(i in this.cookie){
			var date = new Date();
			date.setTime(date.getTime()+(60*60*1000*24*364*100));
			var expires = "; expires="+date.toGMTString();
			
			document.cookie = i + "=" + this.cookie[i] + expires + "; path=/";
		}
	},
	set: function(key, value){
		this.load();
		this.cookie[key] = value;
		this.dump();
	},
	get: function(key) {
		this.load();
		return this.cookie[key];
	}
};

VoragoCMS.Cookie.instance = new VoragoCMS.Cookie();

function hide_politica_cookies(){
	VoragoCMS.Cookie.instance.set("privacy_policy_accepted", 1);
	$("#partial-cookies").load("/pages/cookie_privacy");
	$("#partial-cookies").hide();
};

/* FIN: POLITICA DE COOKIES */