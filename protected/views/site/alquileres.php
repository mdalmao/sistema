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
	
	<?php foreach ($model as $Alquilere): ?>
	  
		<div class="resultado">
			<input type="hidden" name="idinmueble" value="<?php echo $Alquilere['idInmueble']; ?>"/>
			<input type="hidden" name="tipo" value="<?php echo $Alquilere['TipoInmueble']; ?>"/>
			
			
            <p class="descripcion"> 
				 Descripcion:
				<?php echo CHtml::decode($Alquilere['Descripcion']);  ?> 
				
			</p>
			<?php $id = $Alquilere['idInmueble']; ?>
			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 


			
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
         
 			
 					<form action="DescripcionInmueble"  method="post">
 					<input type="hidden" name="idinmueble" value="<?php echo $Alquilere['idInmueble']; ?>"/>	
					<div class="lateral" >
					<?php echo CHtml::submitButton('Ver Mas'); ?>
					</div>
				 </form>
				
			 
			
				

		</div>
		
	<?php endforeach; ?>

</div>
