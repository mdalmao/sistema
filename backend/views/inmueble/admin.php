<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de Inmuebles', 'url'=>array('index')),
	array('label'=>'Crear Inmueble', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inmueble-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Gestionar Inmuebles</h1>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

</div><!-- search-form -->



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inmueble-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idInmueble',
		'TipoInmueble',
		'QueHacer',
		//'Disponible',
		//'Estado',
		'Precio',
		/*
		'Descripcion',
		'Departamento',
		'Ciudad',
		'Zona',
		*/'Direccion',
		/*'Portada',
		'idUsuario',
		'x',
		'y',
		*/
		array(
			'class'=>'CButtonColumn',			        	
		),
	),
)); ?>
