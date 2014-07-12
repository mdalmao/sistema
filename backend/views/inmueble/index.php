<?php
/* @var $this InmuebleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inmuebles',
);

$this->menu=array(
	array('label'=>'Crear Inmueble', 'url'=>array('create')),
	array('label'=>'Gestionar Inmuebles', 'url'=>array('admin')),
);
?>

<h1>Inmuebles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
