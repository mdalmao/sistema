<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Empleados', 'url'=>array('index')),
	array('label'=>'Gestion de Empleado', 'url'=>array('admin')),
);
?>

<h1>Empleado</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>