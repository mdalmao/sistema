<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ventas';
$this->breadcrumbs=array(
	'Venta',
);
?>

<h1>Ventas</h1>



<div class="inmueble">
	
	<?php foreach ($model as $Ventas): ?>
		 
		<div class="resultado">
			
			<p class="descripcion"> 
				 Descripcion:
				<?php echo CHtml::decode($Ventas['Descripcion']);  ?> 
				
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($Ventas['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($Ventas['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($Ventas['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($Ventas['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($Ventas['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($Ventas['Direccion']);  ?> 

				</p>
			</p>
			<?php $id = $Ventas['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
 				


				 <form action="DescripcionInmueble"  method="post">
 					<input type="hidden" name="idinmueble" value="<?php echo $Ventas['idInmueble']; ?>"/>	
					 <div class="lateral" >
					<?php echo CHtml::submitButton('Ver Mas'); ?>
					</div>
				 </form>

							
			 
			
				

		</div>
		
	<?php endforeach; ?>

</div>
