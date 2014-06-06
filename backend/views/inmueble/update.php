<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),
	$model->idInmueble=>array('view','id'=>$model->idInmueble),
	'Update',
);

$this->menu=array(
	array('label'=>'List Inmueble', 'url'=>array('index')),
	array('label'=>'Create Inmueble', 'url'=>array('create')),
	array('label'=>'View Inmueble', 'url'=>array('view', 'id'=>$model->idInmueble)),
	array('label'=>'Manage Inmueble', 'url'=>array('admin')),
);
?>

<h1>Update Inmueble <?php echo $model->idInmueble; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>