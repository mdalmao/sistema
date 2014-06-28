<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),
	'Pictures',
);

$this->menu=array(
	array('label'=>'List Inmueble', 'url'=>array('index')),
	array('label'=>'Manage Inmueble', 'url'=>array('admin')),
);
?>

<h1>Cargar Imagenes</h1>

<?php $this->renderPartial('_pictures', array('model'=>$model,'imagenes'=>$imagenes));?>