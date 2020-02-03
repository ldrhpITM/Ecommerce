$.ajax({
    url:"ajax/plantilla.ajax.php",
    success:function(respuesta){
        var colorFondo=JSON.parse(respuesta).colorFondo;
        var colorTexto=JSON.parse(respuesta).colorTexto;
        var barraSuperior=JSON.parse(respuesta).barraSuperior;
        var textoSuperior=JSON.parse(respuesta).textoSuperior;

        $(".backColor, .backColor a").css({
            "background":colorFondo,
            "color":colorTexto
        });
        $(".barraSuperior, .barraSuperior a").css({
            "background":barraSuperior,
            "color":textoSuperior
        });
    }
});

/***************Tooltips******************/
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
/***************Cuadricula o Lista***********************/
var  btnList=$('.btnList');
//console.log("btnList: ", btnList.length);
for (var i= 0; i < btnList.length; i++) {
    $("#btnGrid"+i).click(function() {
        var numero=$(this).attr("id").substr(-1);
        $(".list"+numero).hide();
        $(".grid"+numero).show();
        $("#btnGrid"+numero).addClass('btn-outline-success');
        $("#btnList"+numero).removeClass('btn-outline-success');
    })
    $("#btnList"+i).click(function() {
        var numero=$(this).attr("id").substr(-1);
        $(".list"+numero).show();
        $(".grid"+numero).hide();
        $("#btnGrid"+numero).removeClass('btn-outline-success');
        $("#btnList"+numero).addClass('btn-outline-success');
    })
}
/********************Efecto con el  Scroll*************************/
$(window).scroll(function() {
    var scrollY=window.pageYOffset;
    if (window.matchMedia("(min-width:768px)").matches) {
        if (scrollY<($(".banner").offset().top)-150) {
            $(".banner img").css({"margin-top": -scrollY/3+"px"})
        }else{
            scrollY=0;
        }
    }
})

/**********************Scroll UP***************************/
$.scrollUp({
    scrollText:"",
    scrollSpedd: 2000,
    easingType: "easeOutQuint"
});