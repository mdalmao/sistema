<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin')),
);
?>

<h1>Crear Cliente</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>