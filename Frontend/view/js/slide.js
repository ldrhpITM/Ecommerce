/**************Paginacion********************** */
var item=0;
var itemPaginacion=$("#paginacion li");
var interrumpirCiclo=false;
var imgProducto=$(".imgProducto");
var titulo1=$("#slide h1");
var titulo2=$("#slide h2");
var titulo3=$("#slide h3");
var btnVerProducto=$("slide button");
var detenerIntervalo=false;
var toggle=false;

$(imgProducto[item]).animate({"top":-10+"%", "opacity":0},100);
$(imgProducto[item]).animate({"top":30+"px", "opacity":1},600);

$(titulo1[item]).animate({"top":-10+"%", "opacity":0},100);
$(titulo1[item]).animate({"top":30+"px", "opacity":1},600);
$(titulo2[item]).animate({"top":-10+"%", "opacity":0},100);
$(titulo2[item]).animate({"top":30+"px", "opacity":1},600);
$(titulo3[item]).animate({"top":-10+"%", "opacity":0},100);
$(titulo3[item]).animate({"top":30+"px", "opacity":1},600);

$(btnVerProducto[item]).animate({"top":-10+"%", "opacity":0},100);
$(btnVerProducto[item]).animate({"top":30+"px", "opacity":1},600);

$('#paginacion li').click(function () {
    item=$(this).attr("item")-1;
    movimientoSlide(item);
})

/**********movimiento del slide********************/

function movimientoSlide(item) {
    $("#slide ul").animate({"left":item*-100+"%"}, 1000, "easeOutQuart");
    $("#paginacion li").css({"opacity":.5});
    $(itemPaginacion[item]).css({"opacity":1});
    interrumpirCiclo=true;
    $(imgProducto[item]).animate({"top":-10+"%", "opacity":0},100);
    $(imgProducto[item]).animate({"top":30+"px", "opacity":1},600);

    $(titulo1[item]).animate({"top":-10+"%", "opacity":0},100);
    $(titulo1[item]).animate({"top":30+"px", "opacity":1},600);
    $(titulo2[item]).animate({"top":-10+"%", "opacity":0},100);
    $(titulo2[item]).animate({"top":30+"px", "opacity":1},600);
    $(titulo3[item]).animate({"top":-10+"%", "opacity":0},100);
    $(titulo3[item]).animate({"top":30+"px", "opacity":1},600);

    $(btnVerProducto[item]).animate({"top":-10+"%", "opacity":0},100);
    $(btnVerProducto[item]).animate({"top":30+"px", "opacity":1},600);
}

/***********Avanzar***********/
function avanzar() {
    if(item==3){
        item=0;
    }else{
        item++;
    }
    movimientoSlide(item);
}
$('#slide #avanzar').click(function () {
    avanzar();
})
/***********Retroceder***********/
$('#slide #retroceder').click(function () {
    if(item==0){
        item=3;
    }else{
        item--;
    }
    movimientoSlide(item);
})


/***********Intervaalo movimeinto automatico**************/
setInterval(function () {
    if (interrumpirCiclo) {
        interrumpirCiclo=false;
    }else{
        if (!detenerIntervalo) {
            avanzar();
        }
    }
    
},9000);

/************Aparecer flechas***********/
$("#slide").mouseover(function() {
    $("#slide #retroceder").css({"opacity":1});
    $("#slide #avanzar").css({"opacity":1});
    detenerIntervalo=true;
})
$("#slide").mouseout(function() {
    $("#slide #retroceder").css({"opacity":0});
    $("#slide #avanzar").css({"opacity":0});
    detenerIntervalo=false;
})

/*************Esconder Slide**************/
$("#btnSlide").click(function () {
    if (!toggle) {
        toggle=true;
        $("#slide").slideUp("fast");
        $("#btnSlide").html('<i class="fa fa-angle-down"></i>');
    }else{
        toggle=false;
        $("#slide").slideDown("fast");
        $("#btnSlide").html('<i class="fa fa-angle-up"></i>');
    }
})