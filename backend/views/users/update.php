<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar Empleados',
);

$this->menu=array(
	array('label'=>'Lista de Empleados', 'url'=>array('index')),
	array('label'=>'Crear Empleado', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Empleados', 'url'=>array('admin')),
);
?>

<h1>Modificar Empleados <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>