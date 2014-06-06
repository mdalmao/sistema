<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Usuarios', 'url'=>array('index')),
	array('label'=>'Manejador de Usuarios', 'url'=>array('admin')),
);
?>

<h1>Create Users</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>