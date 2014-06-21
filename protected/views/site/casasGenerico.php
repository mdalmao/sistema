<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - casas';
$this->breadcrumbs=array(
	'casas',
);
?>
<div class="inmueble">
<h1>Cacasa x</h1>
<?php foreach ($model as $modelo): ?>
<div class="resultado">
			
			
			 <p> Piso:
				<?php echo CHtml::decode($modelo['Piso']);  ?> 
				</p>
				<p> Fondo:
				 <?php echo CHtml::decode($modelo['Fondo']);  ?> 
				</P>
			
				<p> Frente:
				<?php echo CHtml::decode($modelo['Frente']);  ?> 
				</p>
			
				<p> Barbacoa:
				<?php echo CHtml::decode($modelo['Barbacoa']);  ?> 
				</p>


				<p>Ciudad:
				 <?php echo CHtml::decode($modelo['Rejas']);  ?>
				</p>
				<p>
					Estufa: 
					<?php echo CHtml::decode($modelo['Estufa']); ?>
				</p>
				<p> Saneamiento: 	

				<?php echo CHtml::decode($modelo['Saneamiento']);  ?> 

				</p>

 			
	

</div>
<?php endforeach; ?>

