<?php
/* @var $this ContactoController */
/* @var $model Contacto */

$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->idContacto,
);

$this->menu=array(
	array('label'=>'Lista de Contactos', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Editar Contacto', 'url'=>array('update', 'id'=>$model->idContacto)),
	array('label'=>'Borrar Contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idContacto),'confirm'=>'Esta seguro que desea eliminar este contacto?')),
	array('label'=>'Gestionar Contactos', 'url'=>array('admin')),
);
?>

<h1>Ver Contacto #<?php echo $model->idContacto; ?></h1>

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
