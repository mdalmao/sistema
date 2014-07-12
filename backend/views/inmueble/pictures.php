<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),
	'Pictures',
);

$this->menu=array(
	array('label'=>'Lista de Inmuebles', 'url'=>array('index')),
	array('label'=>'Gestionar Inmuebles', 'url'=>array('admin')),
);
?>

<h1>Cargar Imagenes</h1>

<?php $this->renderPartial('_pictures', array('model'=>$model,'imagenes'=>$imagenes));?>