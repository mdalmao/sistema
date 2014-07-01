<?php
/* @var $this ContactoController */
/* @var $model Contacto */

$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->idContacto=>array('view','id'=>$model->idContacto),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Contactos', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Ver Contacto', 'url'=>array('view', 'id'=>$model->idContacto)),
	array('label'=>'Gestionar Contacto', 'url'=>array('admin')),
);
?>

<h1>Update Contacto <?php echo $model->idContacto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>