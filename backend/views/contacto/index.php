<?php
/* @var $this ContactoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contactos',
);

$this->menu=array(
	
	array('label'=>'Gestionar Contactos', 'url'=>array('admin')),
);
?>

<h1>Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
