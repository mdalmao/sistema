<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Empleados', 'url'=>array('index')),
	array('label'=>'Crear Empleado', 'url'=>array('create')),
	array('label'=>'Modificar Empleado', 'url'=>array('user/admin/update', 'id'=>$model->id)),
	array('label'=>'Borrar Empleado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Empleados', 'url'=>array('user/admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'activkey',
		'createtime',
		'lastvisit',
		'superuser',
		'status',
	),
)); ?>
