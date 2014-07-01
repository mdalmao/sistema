<?php
/* @var $this ContactoController */
/* @var $model Contacto */

$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->idContacto,
);

$this->menu=array(
	array('label'=>'List Contacto', 'url'=>array('index')),
	array('label'=>'Create Contacto', 'url'=>array('create')),
	array('label'=>'Update Contacto', 'url'=>array('update', 'id'=>$model->idContacto)),
	array('label'=>'Delete Contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idContacto),'confirm'=>'Esta seguro que desea eliminar este contacto?')),
	array('label'=>'Manage Contacto', 'url'=>array('admin')),
);
?>

<h1>View Contacto #<?php echo $model->idContacto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idContacto',
		'NombreContacto',
		'Email',
		'Telefono',
		'MesajeContacto',
	),
)); ?>
