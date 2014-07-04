<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

 <aside>
    <div class= "centrarImagenes"> 
    <p> <img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'imm.jpg' ; ?>"></img>
       <a href="http://www.montevideo.gub.uy/tramites/">http://www.montevideo.gub.uy/tramites</a>

    </p>
      <p><img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'brou.jpg' ; ?>"></img>
      <a href="http://www.brou.com.uy/web/guest/home">http://www.brou.com.uy/web/guest/home</a>
     </p>
     <p> <img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'facebook.jpg' ; ?>"></img>
       <a href="https://www.facebook.com">https://www.facebook.com</a>

    </p>
    </div>
  



</aside>
<aside>
    <div class= "centrarImagenesIzquierda"> 
    
      <p><img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'tasaciones.jpg' ; ?>"></img>
      

      <h1>TASACIONES</h1>
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

<head>

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

  </head>
<div id="mapa">
<?php
echo Yii::app()->Mapas->mapa();
?>
</div>

<div id="resultadoPrincipal">
    <?php foreach ($model as $inmueble): ?>
   <div class="resultadoprincipal">
   <p class="reserva-titulo"><?php echo $inmueble['idInmueble']; ?></p>
   <p class="descripcion"> <?php echo CHtml::decode($inmueble['Descripcion']);  ?> </p>
   <?php $id = $inmueble['idInmueble']; ?> 
   <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
   </div>
   <?php endforeach; ?>


   </div>

 
 



