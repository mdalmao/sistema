<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Inmueble', 'url'=>array('index')),
	array('label'=>'Manage Inmueble', 'url'=>array('admin')),
);
?>

<h1>Create Inmueble</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>