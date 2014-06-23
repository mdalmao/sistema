<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - casas';
$this->breadcrumbs=array(
	'casas',
);
?>

<h1>Casas</h1>
<div class="inmueble">
	
	<?php foreach ($model as $Casas): ?>
	<form action="CasasGenerico"  method="post">
		<div class="resultado">
			
			<p class="descripcion"> 
				<p> Descripcion:
				<?php echo CHtml::decode($Casas['Descripcion']);  ?> 
				</p>
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($Casas['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($Casas['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($Casas['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($Casas['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($Casas['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($Casas['Direccion']);  ?> 

				</p>
			</p>
			<?php $id = $Casas['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
 			<a href="/yii/sistema/site/CasasGenerico" class="btn btn-success btn-mini"><i class="icon-white"></i> Ver Mas</a>
			</div>

		</div>
		</form>
	<?php endforeach; ?>

</div>

