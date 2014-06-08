<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>


<div class="container"> 
<div class="principal">
 <h1> Imagenes Principales </h1>
 <img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
 <img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
 <img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
 <img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
 <img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
 <img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
</div>



<div class="inmueble">
<p>Aca van los inmuebles</p>
<?php foreach ($inmuebles as $inmueble): ?>
<h2><?php echo $inmueble['idInmueble']; ?></h2>
<?php echo CHtml::decode($inmueble['Descripcion']); ?>
<?php endforeach; ?>
</div>

<div id="lateral">
<div id="vistos">
<h1> Mas Vistos </h1>
</div>
<div id="mapa">
<?php
echo Yii::app()->Mapas->mapa();
?>
</div>
</div>

</div>