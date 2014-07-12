<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idUsuario,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Modificar Cliente', 'url'=>array('update', 'id'=>$model->idUsuario)),
	array('label'=>'Borrar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuario),'confirm'=>'Esta seguro que desea eliminar a este cliente?')),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin')),
);
?>

<h1>Ver Cliente #<?php echo $model->idUsuario; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model, //$model2,

	'attributes'=>array(
		'idUsuario',
		'Nacionalidad',
		//'NombreUsuario',
	),
)); ?>
