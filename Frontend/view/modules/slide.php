<div class="container-fluid" id="slide">
    <ul>
        <?php
            $servidor=Ruta::ctrRutaServidor();
            $slide=ControladorSlide::ctrMostrarSlide();
            //var_dump($slide)
            foreach ($slide as $key => $sld) {
                $estiloImgProducto=json_decode($sld['estiloImgProducto'],true);
                $estiloTextoSlide=json_decode($sld['estiloTextoSlide'],true);
                $titulo1=json_decode($sld['titulo1'],true);
                $titulo2=json_decode($sld['titulo2'],true);
                $titulo3=json_decode($sld['titulo3'],true);
                echo '
                    <li>
                        <img src="'.$servidor.$sld['imgFondo'].'">
                        <div class="slideOpciones '.$sld['tipoSlide'].'">';
                        if ($sld['imgProducto']!="") {
                            echo '
                            <img class="imgProducto" src="'.$servidor.$sld['imgProducto'].'"
                                style="top:'.$estiloImgProducto['top'].'; right:'.$estiloImgProducto['right'].'; width:'.$estiloImgProducto['width'].'; left:'.$estiloImgProducto['left'].'">
                            ';
                        }
                        echo  ' <div class="textosSlide" style="top:'.$estiloTextoSlide['top'].'; left:'.$estiloTextoSlide['left'].'; width:'.$estiloTextoSlide['width'].'; right:'.$estiloTextoSlide['right'].'">
                                <h1 style="color:'.$titulo1['color'].'">'.$titulo1['texto'].'</h1>
                                <h2 style="color:'.$titulo2['color'].'">'.$titulo2['texto'].'</h2>
                                <h3 style="color:'.$titulo3['color'].'">'.$titulo3['texto'].'</h3>
                                <a href="#">
                                '.$sld['boton'].'
                                </a>
                            </div>
                        </div>
                    </li>
                ';
            }
        ?>
      
    </ul>
    <!--**************PAGINACIÓN**************-->
    <ol id="paginacion">
        <?php
            for ($i=0; $i < count($slide) ; $i++) { 
                
               echo '
                <li item="'.$i.'"><span class="fa fa-circle"></span></li>
               ';
            }
        ?>
		
	</ol>
    <!--*********************FLECHAS*************-->
    <div class="flechas" id="retroceder"><span class="fa fa-chevron-left"></span></div>
	<div class="flechas" id="avanzar"><span class="fa fa-chevron-right"></span></div>
</div>
<center>	
	<button id="btnSlide" class="backColor">
			<i class="fa fa-angle-up"></i>
	</button>
</center>