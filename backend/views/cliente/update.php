<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idUsuario=>array('view','id'=>$model->idUsuario),
	//$model2->idUsuario=>array('view','id'=>$model->idUsuario),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Ver Cliente', 'url'=>array('view', 'id'=>$model->idUsuario)),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin')),
);
?>

<h1>Update Cliente <?php echo $model->idUsuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>