<?php
    $servidor=Ruta::ctrRutaServidor();
?>
<figure class="banner">
    <img src="http://localhost/Ecommerce/Backend/view/img/banner/default.jpg" alt="">
    <div class="textoBanner textoDer">
        <h1 style="color: #fff;">OFERTAS ESPECIALES</h1>
        <h2 style="color: #fff;"><strong>50% off</strong></h2>
        <h3 style="color: #fff;">Termina el 31 de Diciembre</h3>
    </div>
</figure>

<?php
   
    $titulosModulos = array("ARTÍCULOS GRATUITOS", "LO MÁS VENDIDO", "LO MÁS VISTO");
    $rutaModulos = array("articulos-gratis","lo-mas-vendido","lo-mas-visto");
    $base=0; 
    $tope=4;
    if($titulosModulos[0] == "ARTÍCULOS GRATUITOS"){
        $ordenar = "id";
        $item = "precio";
        $valor = 0;
        $gratis = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base, $tope);
    }
    if($titulosModulos[1] == "LO MÁS VENDIDO"){
        $ordenar = "ventas";
        $item = null;
        $valor = null;
        $ventas = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base, $tope);
    }
    if($titulosModulos[2] == "LO MÁS VISTO"){
        $ordenar = "vistas";
        $item = null;
        $valor = null;
        $vistas = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor, $base, $tope);
    }
    $modulos = array($gratis, $ventas, $vistas);

    for ($i=0; $i <count($titulosModulos) ; $i++) { 
        echo '<div class="container-fluid well well-sm barraProductos">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-12 organizarProductos">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-outline-secondary btn-sm btnGrid" id="btnGrid'.$i.'">
                                    <span class="col-0 pull-right"><i class="fa fa-th" aria-hidden="true"></i> GRID</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm btnList" id="btnList'.$i.'">
                                    <span class="col-0 pull-right"><i class="fa fa-list" aria-hidden="true"></i> LIST</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid productos">
                <div class="container">
                    <div class="row tituloDestacado mt-3">
                       
                        <div class="col-md-6 col-xs-12">
                            <h1><small>'.$titulosModulos[$i].' </small></h1>
                        </div>
                       
                        <div class="col-md-6 col-xs-12">
                            <a href="'.$rutaModulos[$i].'">
                                <button class="btn btn-default backColor pull-right">
                                    VER MÁS <span class="fa fa-chevron-right"></span>
                                </button>
                            </a>
                        </div>
                        <div class="col-12 divisor">
                            <hr style="border:.5 solid #999">
                        </div>
                    </div>
                    <ul class="grid'.$i.'" >
                        <div class="row">';
                        foreach ($modulos[$i] as $key => $modulo) {
                            
                           echo '
                            <li class="col-md-3 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <figure>
                                            <a href="'.$modulo['ruta'].'" class="pixelProducto">
                                                <img src="'.$servidor.$modulo['portada'].'"
                                                    class="img-fluid img-thumbnail" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>
                                            <small>
                                                <a href="'.$modulo['ruta'].'" class="pixelProducto">
                                                '.$modulo['titulo'].' <br> <span style="color:rgba(0,0,0,0)">-</span>';
                                                if ($modulo['nuevo']!=0) {
                                                    echo '<span class="badge badge-warning fontSize">Nuevo</span> ';
                                                }
                                                if ($modulo['oferta']!=0) {
                                                    echo '<span class="badge badge-warning fontSize">'.$modulo['descuentoOferta'].'% off</span>';
                                                } 
                                                
                                        echo    '</a>
                                            </small>
                                        </h4>
                                    </div>

                                    <div class="col-6  col-md-6 precio">';
                                    if ($modulo['precio']==0) {
                                        echo '<h2><small>GRATIS</small></h2>';
                                    } else {
                                        if ($modulo['oferta']!=0) {
                                            echo    '<h2>
                                                        <small><strong class="oferta">MX $'.$modulo['precio'].'</strong></small>
                                                        <br><small>MX $'.$modulo['precioOferta'].'</small>
                                                    </h2>';
                                        }else{
                                            echo '<h2><small>MX $'.$modulo['precio'].'</small></h2>';
                                        }
                                    }
                                    
                            echo   '</div>
                                    <div class="col-6 col-md-6 enlaces">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-outline-secondary btn-sm btn-xs deseos" idProducto="'.$modulo['id'].'"
                                                data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </button>';
                                            if ($modulo['tipo']=="virtual" && $modulo['precio'!=0]) {
                                                if ($modulo['oferta']!=0) {
                                                    echo    '<button type="button" class="btn btn-outline-secondary btn-sm  agregarCarrito  btn-sm" idProducto="'.$modulo['id'].'"
                                                                imagen="'.$servidor.$modulo['portada'].'"
                                                                tiulo="'.$modulo['titulo'].'" precio="'.$modulo['precioOferta'].'" tipo="'.$modulo['tipo'].'" peso="'.$modulo['peso'].'" data-toggle="tooltip"
                                                                title="Agregar a mi lista de deseos">
                                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </button>';
                                                }else{
                                                    echo    '<button type="button" class="btn btn-outline-secondary btn-sm  agregarCarrito  btn-sm" idProducto="'.$modulo['id'].'"
                                                                imagen="'.$servidor.$modulo['portada'].'"
                                                                tiulo="'.$modulo['titulo'].'" precio="'.$modulo['precio'].'" tipo="'.$modulo['tipo'].'" peso="'.$modulo['peso'].'" data-toggle="tooltip"
                                                                title="Agregar a mi lista de deseos">
                                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </button>';
                                                }
                                            }
                                    echo    '<a href="'.$modulo['ruta'].'" class="pixelProducto">
                                                <button type="button" class="btn btn-outline-secondary btn-sm btn-xs" data-toggle="tooltip"
                                                    title="Ver producto">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>';
                        }
                   echo '</div>
                   </ul>
                   <ul class="list'.$i.'" style="display: none;">
                        <div class="row">';
                        foreach ($modulos[$i] as $key => $modulo) {
                            echo '<li class="col-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-12 ">
                                            <figure>
                                                <a href="'.$modulo['ruta'].'" class="pixelProducto">
                                                    <img src="'.$servidor.$modulo['portada'].'"
                                                        class="img-fluid img-thumbnail" alt="">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-lg-10 col-md-7 col-sm-8 col-12 ">
                                            <h1>
                                                <small>
                                                <a href="'.$modulo['ruta'].'" class="pixelProducto">
                                                '.$modulo['titulo'].' <br>';    
                                                        if ($modulo['nuevo']!=0) {
                                                            echo '<span class="badge badge-warning">Nuevo</span> ';
                                                        }
                                                        if ($modulo['oferta']!=0) {
                                                            echo '<span class="badge badge-warning ">'.$modulo['descuentoOferta'].'% off</span>';
                                                        }                                     
                                             echo '</a>
                                                </small>
                                            </h1>
                                            <p class="text-muted">'.$modulo['titular'].'</p>';
                                            if ($modulo['precio']==0) {
                                                echo '<h2><small>GRATIS</small></h2>';
                                            } else {
                                                if ($modulo['oferta']!=0) {
                                                    echo    '<h2>
                                                                <small><strong class="oferta">MX $'.$modulo['precio'].'</strong></small>
                                                                <br><small>MX $'.$modulo['precioOferta'].'</small>
                                                            </h2>';
                                                }else{
                                                    echo '<h2><small>MX $'.$modulo['precio'].'</small></h2>';
                                                }
                                            }
                                    echo   '<div class="pull-left  enlaces">
                                                <button type="button" class="btn btn-outline-secondary btn-sm btn-xs deseos btn-sm" idProducto="'.$modulo['id'].'"
                                                    data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </button>';
                                                if ($modulo['tipo']=="virtual" && $modulo['precio'!=0]) {
                                                    if ($modulo['oferta']!=0) {
                                                        echo    '<button type="button" class="btn btn-outline-secondary btn-sm  agregarCarrito  btn-sm" idProducto="'.$modulo['id'].'"
                                                                    imagen="'.$servidor.$modulo['portada'].'"
                                                                    tiulo="'.$modulo['titulo'].'" precio="'.$modulo['precioOferta'].'" tipo="'.$modulo['tipo'].'" peso="'.$modulo['peso'].'" data-toggle="tooltip"
                                                                    title="Agregar a mi lista de deseos">
                                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                </button>';
                                                    }else{
                                                        echo    '<button type="button" class="btn btn-outline-secondary btn-sm  agregarCarrito  btn-sm" idProducto="'.$modulo['id'].'"
                                                                    imagen="'.$servidor.$modulo['portada'].'"
                                                                    tiulo="'.$modulo['titulo'].'" precio="'.$modulo['precio'].'" tipo="'.$modulo['tipo'].'" peso="'.$modulo['peso'].'" data-toggle="tooltip"
                                                                    title="Agregar a mi lista de deseos">
                                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                </button>';
                                                    }
                                                }
                                                
                                        echo    '<a href="'.$modulo['ruta'].'" class="pixelProducto">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm btn-xs" data-toggle="tooltip"
                                                        title="Ver producto">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="col-12"><hr></div>';
                        }

                echo    '</div>
                    </ul>
                </div>
            </div>';

    }
?>