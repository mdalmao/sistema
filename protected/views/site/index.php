<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>





<aside>
    <div class= "centrarImagenesIzquierda"> 
    
      <p><img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'tasaciones.jpg' ; ?>"></img>
      



      <h4>TASACIONES</h4>
      La empresa cuenta con personal idóneo para esta materia. En estos tiempos que corren, tasar resulta algo muy complejo, delicado y no cabe duda de que hay que tomarse algo de tiempo para definir y a la vez transmitir la correspondiente tasación.

Tasamos para compra-venta y arrendamiento en toda la capital, tanto sean casas, apartamentos, locales comerciales, industriales, galpones y terrenos.

Existe lo que llamamos Tasaciones sin Cargo, que consiste en visitar el bien a tasar. Dicho bien es tasado y previo acuerdo de partes, a corto plazo ingresa en nuestra cartera de material a ofrecer en determinadas condiciones anteriormente estipuladas.

Tasaciones con cargo, son aquellas de carácter judicial, futura sucesión o planificación familiar, o simplemente para definir una futura compra venta.

En caso de que la propiedad tasada ingrese en nuestra cartera a ofrecer y se concrete la compra-venta, de la comisión correspondiente por tal operación se debitarán los honorarios abonados en su oportunidad por dicha tasación.

Como más arriba mencionábamos, para tasar un inmueble se necesita mucha profesionalidad, conocer profundamente la actualidad del mercado inmobiliario tan cambiante y cíclico, pero ante todo lo más sagrado: Seriedad 100%.

Consúltenos a través de cualquier medio, vía mail, nuestra página web, telefónicamente o visítenos en cualquiera de nuestras dos oficinas que con gusto lo atenderemos.
     </p>
    </div>
  



</aside>


</div>







<aside>

<?php $todo=Yii::app()->ImagenesInmueble->slider();
      $fotos= $todo[0];
      $titulo= $todo[1];
      $descripcion =   $todo[2];
      $this->widget('bootstrap.widgets.TbCarousel', array(
      'items'=>array(
        array('image'=> $fotos[0], 'label'=> $titulo[0], 'caption'=> $descripcion[0]),
        array('image'=> $fotos[1], 'label'=>$titulo[1], 'caption'=>$descripcion[1]),
        array('image'=> $fotos[2], 'label'=>$titulo[2], 'caption'=>$descripcion[2]),
        array('image'=> $fotos[3], 'label'=> $titulo[3], 'caption'=>$descripcion[3]),
        array('image'=> $fotos[4], 'label'=>$titulo[4], 'caption'=>$descripcion[4]),
        array('image'=> $fotos[5], 'label'=>$titulo[5], 'caption'=> $descripcion[5]),
    ), )); 


?>

  </aside>


<div class="videoDestacado">
      <video poster="imagenes/foto.png" width="380" height="240" controls>
      <source src="imagenes/video.mp4" type="video/mp4;
      codecs="avc1.42E01E,mp4a.40.2""></br>
</div>     

<div class="conversor">
<a href='http://www.freecurrencyrates.com/es/myconverter#cur=USD-EUR-UYU-ARS-BRL-GBP;amt=USD1' id='ccw_cnhfybwf'>CONVERSOR</a>
  <div id='gcw_rates'></div>
  <script src='http://www.freecurrencyrates.com/converter-widget?source=Yahoo%20Finance&width=250&currs=USD,EUR,UYU,ARS,BRL,GBP&precision=2&language=es&flags=1&currchangable=0' charset='UTF-8'>
</script>
</div>

<!--<div id="mapa">
<?php
echo Yii::app()->Mapas->mapa();
?>
</div>-->

 <aside>
    <div class= "centrarImagenes"> 
     
     <a href="http://www.montevideo.gub.uy/tramites/">
      <img class ="img-rounded2" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'imm.jpg' ; ?>"></img>
     </a>
   
   

      
       <a href="http://www.brou.com.uy/web/guest/home">
        <img class ="img-rounded2" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'brou.jpg' ; ?>"></img>
      </a>
      
     
     <a href="https://www.facebook.com/groups/141305722585637/">
      <img class ="img-rounded2" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'facebook.jpg' ; ?>"></img>
      </a>

    <a href="http://www.anv.gub.uy/">
      <img class ="img-rounded2" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'andv.jpg' ; ?>"></img>
      </a>

 
     <a href="http://www.bhu.com.uy/">
      <img class ="img-rounded2" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'bhu.jpg' ; ?>"></img>
      </a>

      <a href="http://www.anda.com.uy/index_1.html">
      <img class ="img-rounded2" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'anda.jpg' ; ?>"></img>
      </a>
    
    
   
  
    </div>
</aside>


 
 



