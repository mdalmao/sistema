<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Campo';
$this->breadcrumbs=array(
	'Campo',
);
?>

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
	<form action="Campo"  method="post">
	<div class="resultado">
				
			
				<p> Cantidad de Hectareas:
					<?php echo CHtml::decode($modelo['Hectareas']);  ?> 
				</p>
			
				<p>
					Metros Cuadrados de la Propiedad:
					<?php echo CHtml::decode($modelo['MetrosCuadradosTerreno']);  ?> 
				</p>
				<p>
					MetrosConstruidos:
					 
					<?php echo CHtml::decode($modelo['MetrosConstruidos']);  ?> 
					
				</p>
				<p>	 Luz:
					
					<?php if ($modelo['Luz'] == 1): ?>
					 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
						<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
				
				
				<p>
					Vivienda Patronal:
					 
					 <?php if ($modelo['ViviendaPatronal'] == 1): ?>
					 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
						<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
					<p>
					Vivienda Capataz: 
					
					<?php if ($modelo['ViviendaCapataz'] == 1): ?>
				 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
					<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
					<p>
					Estado Alambrado: 	
						
					 	<?php echo CHtml::decode($modelo['EstadoAlambrado']);  ?> 
					
					</p>
					<p>
					IndiceCONEAT: 	
						
					 	<?php echo CHtml::decode($modelo['IndiceCONEAT']);  ?> 
					
					</p>
					<p>
					Tajamar: 
					
					<?php if ($modelo['Tajamar'] == 1): ?>
				 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
					<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
				<p>
					Caniada: 
					
					<?php if ($modelo['Caniada'] == 1): ?>
				 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
					<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
				<p>
					PozoAgua: 
					
					<?php if ($modelo['PozoAgua'] == 1): ?>
				 	<?php echo CHtml::decode('Si');  ?> 
					<?php else: ?> 	
					<?php echo CHtml::decode('No');  ?> 
					<?php endif; ?>
				</p>
				<p>
					Galpones: 	
						
					 	<?php echo CHtml::decode($modelo['Galpones']);  ?> 
					
					</p>
					<p>
					Extras: 	
						
					 	<?php echo CHtml::decode($modelo['Extras']);  ?> 
					
					</p>

					
	</div>
			</form>
	<?php endforeach; ?>

		</div>
		</form>
	<?php endforeach; ?>




</div>
<div class="resultado">
<div class = 'imagen'>
<?php foreach ($model3 as $imagen): ?>
		<?php $id = $inmueble['idInmueble']; ?>
		<?php $idImag = $imagen['IdImagen']; ?>
			
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenesDeInmueble($id,$idImag); ?>" /> 
 			
<?php endforeach; ?>
</div>
</div>
<div class="resultado">
<div id="lateral">
	<div class= "calendarioInmueble">
	<?php 
		$id = $inmueble['idInmueble']; 

		echo Yii::app()->Calendario->mostrar($id);

	?>
	</div>

</div>





