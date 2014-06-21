<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Apartamento';
$this->breadcrumbs=array(
	'Apartamento',
);
?>

<h1>Apartamentos</h1>



<div class="inmueble">
	<p>Aca van los inmuebles</p>
	<?php foreach ($model as $Apartamento): ?>
		<div class="resultado">
			
			<p class="descripcion"> 
				<p> Descripcion:
				<?php echo CHtml::decode($Apartamento['Descripcion']);  ?> 
				</p>
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($Apartamento['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($Apartamento['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($Apartamento['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($Apartamento['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($Apartamento['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($Apartamento['Direccion']);  ?> 

				</p>
			</p>
			<?php $id = $Apartamento['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
			</div>

		</div>
	<?php endforeach; ?>

</div>
