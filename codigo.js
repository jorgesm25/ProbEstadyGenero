$(document).ready(function(){
    $('#menuInicio').click(function(){
        $('#inicio').animatescroll()
    });

    $('#menuServicios').click(function(){
        $('#servicios').animatescroll({padding:100})
    });

    $('#menuPortfolio').click(function(){
        $('#portfolio').animatescroll({padding:20})
    });

    $('#menuContacto').click(function(){
        $('#contacto').animatescroll({padding:70})
    });
    
    //Para que el menu desplegable se oculte automáticamente luego de hacer click (en móviles)
    $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });
        
    
    
  
   //codigo para backtoTOP
    var $button = $.backToTop({
        // background color
        backgroundColor: '#5817ea',
        // text color
        color: '#FFFFFF',
        // container element - adonde aparece el boton, es decir en el body
        container: this._body, 
        // efecto all aparecer/desaparece 'nonn', 'spin', 'fade', 'zoom', or 'spin-inverse'
        effect: 'zoom',
        // enable the back to top button
        enabled: true, 
        // alto y ancho del boton 
        height: 50,  
        width: 50,
        // icon (desde fontawesome)
        icon: 'fas fa-chevron-up',
        // margins 
        marginX: 20,
        marginY: 20,  
        // posicion del boton dentro de la pagina bottom/top left/right
        position: 'bottom right',           
        // trigger position
        pxToTrigger: 600,
        // or 'fawesome'
        theme: 'default',
        // z-index
        zIndex: 999    
    });
    

    
});    

///-----------Boton registro
$("#btnNuevo").click(function(){
    $("#registroForm").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Registro");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    

