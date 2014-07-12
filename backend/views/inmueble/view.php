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
	//array('label'=>'Borrar Inmueble', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInmueble),'confirm'=>'Esta seguro que desea eliminar este inmueble?')),
	array('label'=>'Gestionar Inmuebles', 'url'=>array('admin')),
	array('label'=>'Agregar Fotos', 'url'=>array('pictures', 'id'=>$model->idInmueble)),
);

?>

<h1>View Inmueble #<?php echo $model->idInmueble; ?></h1>

<div id="imagenview">	
 <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($model->idInmueble); ?>" /> 
</div>
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
if($model->TipoInmueble == 'CASA' || $model->TipoInmueble == 'APARTAMENTO' || $model->TipoInmueble == 'OFICINA')
{
	$this->widget('zii.widgets.CDetailView', array(	
			'data'=>$casapo,
			'attributes'=>array(
			'AnioConstruccion',
			'MetrosCuadrados',
			'Dormitorios',
			'Banios',
			'Garage',
			'Calefaccion',
			'TanqueAgua',
			'Cerramiento',		
		),			
	));

}
 ?>

<?php 
if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO')
{
	$this->widget('zii.widgets.CDetailView', array(	
			'data'=>$campo,
			'attributes'=>array(
			'Hectareas',
			'MetrosCuadradosTerreno',
			'MetrosConstruidos',
			'Luz',
			'ViviendaPatronal',
			'ViviendaCapataz',
			'EstadoAlambrado',
			'IndiceCONEAT',		
			'Tajamar',	
			'Caniada',	
			'PozoAgua',
			'Galpones',
			'Extras',
		),	
	));
}
 ?>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>