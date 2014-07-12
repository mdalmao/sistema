<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),
	$model->idInmueble=>array('view','id'=>$model->idInmueble),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Inmuebles', 'url'=>array('index')),
	array('label'=>'Crear Inmueble', 'url'=>array('create')),
	array('label'=>'Ver Inmueble', 'url'=>array('view', 'id'=>$model->idInmueble)),
	array('label'=>'Gestionar Inmuebles', 'url'=>array('admin')),
	array('label'=>'Agregar Fotos', 'url'=>array('pictures', 'id'=>$model->idInmueble)),
);
?>

<h1>Update Inmueble <?php echo $model->idInmueble; ?></h1>

<?php $this->renderPartial('_formupdatecampo', array('model'=>$model,'datosp'=>$datosp,'imagenes'=>$imagenes,'campo'=>$campo)); ?>