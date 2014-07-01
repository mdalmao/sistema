<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Apartamento';
$this->breadcrumbs=array(
	'Apartamento',
);
?>

<div class="inmueble">
	
	<?php foreach ($model2 as $inmueble): ?>
	 <form action="Inmueble"  method="post">
		<div class="resultado">
			
			<p class="descripcion"> 
				Descripcion:
				<?php echo CHtml::decode($inmueble['Descripcion']);  ?> 
				
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

		
		</form>
	<?php endforeach; ?>



<div class="resultado">
	<p class="descripcion"> 
				Imagenes del Apartamento:
				
				
			</p>
<div class = 'imagen'>
<?php foreach ($model3 as $imagen): ?>
		<?php $id = $inmueble['idInmueble']; ?>
		<?php $idImag = $imagen['IdImagen']; ?>
			
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenesDeInmueble($id,$idImag); ?>" /> 
 			
<?php endforeach; ?>
	</div>
</div>

	<div id="lateral">

		<div class= "calendarioInmueble">
			
		<?php 
			$id = $inmueble['idInmueble']; 

			echo Yii::app()->Calendario->mostrar($id);

		?>
		</div>
	</div>
	






</div>