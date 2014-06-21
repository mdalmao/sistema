<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Alquileres';
$this->breadcrumbs=array(
	'Alquileres',
);
?>

<h1>Alquileres</h1>





<div class="inmueble">
	<p>Aca van los inmuebles</p>
	<?php foreach ($model as $Alquilere): ?>
		<div class="resultado">
			
			<p class="descripcion"> 
				<p> Descripcion:
				<?php echo CHtml::decode($Alquilere['Descripcion']);  ?> 
				</p>
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($Alquilere['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($Alquilere['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($Alquilere['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($Alquilere['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($Alquilere['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($Alquilere['Direccion']);  ?> 

				</p>
			</p>
			<?php $id = $Alquilere['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
			</div>

		</div>
	<?php endforeach; ?>

</div>
