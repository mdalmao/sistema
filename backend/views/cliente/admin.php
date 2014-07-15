<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cliente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Clientes</h1>

<p>
Puedes utilizar los valores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de tus valores de busqueda.
</p>

<?php echo CHtml::link('Busqueda','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model, 'model2'=>$model2,
)); ?>
</div><!-- search-form -->

<!--aca para que muestre las columnas con los datos del usuario-->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search(),
	 //$model2->search(), 
	'filter'=>$model, 
	//'filter'=>CHtml::listData(Address::model()->findAll(), 'idUsuario', 'idUsuario')
	'columns'=>array(
		
		'idUsuario',
		'Nacionalidad',
			//'NombreUsuario',


		array(
			'class'=>'CButtonColumn',
		),		
	),
)); ?>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model2->search(), 
	'filter'=>$model2, 
	'columns'=>array(
		'CIUsuario',
	'NombreUsuario',
	'ApellidoUsuario',
	'Telefono',


		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
-->

