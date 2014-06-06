<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<p> Imagenes Principales <p>

<img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
<img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
<img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
<img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
<img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">
<img src="./imagenes/prueba1.jpg" alt="prueba" class="img-rounded" height="140" width="140px">

<p>Aca van los inmuebles</p>


<div>
<?php foreach ($inmuebles as $inmueble): ?>
<h2><?php echo $inmueble['idInmueble']; ?></h2>
<?php echo CHtml::decode($inmueble['Descripcion']); ?>
<?php endforeach; ?>
</div>


<?php
echo Yii::app()->Mapas->mapa();
?>