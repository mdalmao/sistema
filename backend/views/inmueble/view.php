<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),	
	$model->idInmueble,
);

$this->menu=array(
	array('label'=>'Lista de Inmuebles', 'url'=>array('index')),
	array('label'=>'Crear Inmueble', 'url'=>array('create')),
	array('label'=>'Modificar Inmuebles', 'url'=>array('update', 'id'=>$model->idInmueble)),
	array('label'=>'Borrar Inmueble', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInmueble),'confirm'=>'Esta seguro que desea eliminar este inmueble?')),
	array('label'=>'Gestionar Inmuebles', 'url'=>array('admin')),
	array('label'=>'Agregar Fotos', 'url'=>array('pictures', 'id'=>$model->idInmueble)),
);
?>

<h1>View Inmueble #<?php echo $model->idInmueble; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInmueble',
		'TipoInmueble',
		'QueHacer',
		'Disponible',
		'Estado',
		'Precio',
		'Descripcion',
		'Departamento',
		'Ciudad',
		'Zona',
		'Direccion',
		'Portada',
		'idUsuario',
		'x',
		'y',	
	),	

)); ?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>