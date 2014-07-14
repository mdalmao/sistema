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
	
	<?php foreach ($model as $Apartamento): ?>
	<form action="DescripcionInmueble"  method="post">
		<div class="resultado">
			<input type="hidden" name="idinmueble" value="<?php echo $Apartamento['idInmueble']; ?>"/>
			<p class="descripcion"> 

				Descripcion:
				<?php echo CHtml::decode($Apartamento['Descripcion']);  ?> 
				
			</p>
				<?php $id = $Apartamento['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
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
		
 		<div class="lateral" >
			<?php echo CHtml::submitButton('Ver Mas'); ?>
			</div>
			</div>

		
	</form>

		
	<?php endforeach; ?>

</div>

