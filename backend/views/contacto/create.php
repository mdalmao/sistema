<?php
/* @var $this ContactoController */
/* @var $model Contacto */

$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Contactos', 'url'=>array('index')),
	array('label'=>'Gestionar Contactos', 'url'=>array('admin')),
);
?>

<h1>Crear Contacto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>