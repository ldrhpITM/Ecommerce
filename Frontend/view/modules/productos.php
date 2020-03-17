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
<div class="container-fluid well well-sm barraProductos">
    <div class="container">
        <div class="row justify-content-end">
        <div class="col-sm-6 col-12 ">
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenar Productos
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Mas Reciente</a>
                    <a class="dropdown-item" href="#">Mas Antiguo</a>
                </div>
            </div>
        </div>
            <div class="col-sm-6 col-12 organizarProductos">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-outline-secondary btn-sm btnGrid" id="btnGrid0">
                        <span class="col-0 pull-right"><i class="fa fa-th" aria-hidden="true"></i> GRID</span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm btnList" id="btnList0">
                        <span class="col-0 pull-right"><i class="fa fa-list" aria-hidden="true"></i> LIST</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/******Listar Productos**********/-->
<div class="container-fluid productos">
        <div class="container">
            <div class="row tituloDestacado mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php  echo $rutas[0]; ?></li>
                </ol>
            </nav>
            <?php
                if ($rutas[0]=="articulos-gratis") {
                    $item2="precio";
                    $valor2=0;
                    $ordenar="id";
                }else if ($rutas[0]=="lo-mas-vendido") {
                    $item2=null;
                    $valor2=null;
                    $ordenar="ventas";
                }else if ($rutas[0]=="lo-mas-visto") {
                    $item2=null;
                    $valor2=null;
                    $ordenar="vistas";
                }else {
                    $ordenar="id";
                    $item="ruta";
                    $valor=$rutas[0];
            
                    $categoria=ControladorProductos::ctrMostrarCategorias($item,$valor);
                   
                    if (!$categoria) {
                        $subCategoria=ControladorProductos::ctrMostrarSubCategorias($item,$valor);                        
                        $item2="subcategoria_id";
                        $valor2=$subCategoria[0]["id"];
                        
                    }else{
                        $item2="categoria_id";
                        $valor2=$categoria["id"];
                    }
                }
                $base=0; 
                $tope=12;
                
                $productos=ControladorProductos::ctrMostrarProductos($ordenar,$item2,$valor2,$base,$tope);
                //var_dump(count($productos));
                if (!$productos) {
                    echo '<div class="col-12 error404  text-center">
                            <h1><small>¡Oops!</small></h1>
                            <h2>Aun no hay Productos en esta seccion</h2>
                          </div>';
                }else{
                    echo '<ul class="grid0" >
                            <div class="row">';
                            foreach ($productos as $key => $modulo) {
                            
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
                        <ul class="list0" style="display: none;">
                             <div class="row">';
                             foreach ($productos as $key => $modulo) {
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
                         </ul>';
                }
            ?>
        </div>
    </div>
</div>