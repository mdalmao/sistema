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
    </div>
  </aside>
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

 
 



