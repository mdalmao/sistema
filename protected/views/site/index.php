<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>


<div class="container"> 

<div id="sidebar">
     
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
<div class="resultado">
<p class="reserva-titulo"><?php echo $inmueble['idInmueble']; ?></p>
<p class="descripcion"> <?php echo CHtml::decode($inmueble['Descripcion']);  ?> </p>
<?php $id = $inmueble['idInmueble']; ?>
 <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
</div>
<?php endforeach; ?>

</div>

<div id="lateral">
<div id="vistos">
<h1> Mas Vistos </h1>
</div>
<div id="mapa">
<?php
echo Yii::app()->Mapas->mapa();

echo Yii::app()->Calendario->mostrar();
?>
</div>
</div>

</div>