<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Apartamento';
$this->breadcrumbs=array(
	'Apartamento',
);
?>
<h1>apartamento con id= 3 seteado  desde el controlador necesito ver como pasarle el id de la vista anterior</h1>
<div class="inmueble">
	
	<?php foreach ($model2 as $inmueble): ?>
	 <form action="Inmueble"  method="post">
		<div class="resultado">
			
			<p class="descripcion"> 
				<p> Descripcion:
				<?php echo CHtml::decode($inmueble['Descripcion']);  ?> 
				</p>
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($inmueble['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($inmueble['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($inmueble['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($inmueble['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($inmueble['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($inmueble['Direccion']);  ?> 

				</p>
			</p>
			 			
			</div>


<?php foreach ($model as $modelo): ?>
	<form action="Apartamento"  method="post">
	<div class="resultado">
				
			
				<p> GastosComunes:
					<?php echo CHtml::decode($modelo['GastosComunes']);  ?> 
				</p>
			
				
				<p>	 Terrazas:
					
					<?php if ($modelo['Terrazas'] == 1): ?>
					 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
						<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
				
				
				<p>
					Ascensor:
					 
					 <?php if ($modelo['Ascensor'] == 1): ?>
					 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
						<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
					<p>
						Portero: 
					
					<?php if ($modelo['Portero'] == 1): ?>
				 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
					<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
					<p>
					Piso: 	
						
					 	<?php echo CHtml::decode($modelo['Piso']);  ?> 
					
					</p>
					

					
	</div>
			</form>
	<?php endforeach; ?>

		</div>
		</form>
	<?php endforeach; ?>




</div>
<div class = 'imagen'>
<?php foreach ($model3 as $imagen): ?>
		<?php $id = $inmueble['idInmueble']; ?>
		<?php $idImag = $imagen['IdImagen']; ?>
			<div  class="resultado">
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenesDeInmueble($id,$idImag); ?>" /> 
 			</div>	
<?php endforeach; ?>
</div>
