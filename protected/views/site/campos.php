<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - campos';
$this->breadcrumbs=array(
	'campos',
);
?>

<h1>Campos</h1>

<div class="inmueble">
	
	<?php foreach ($model as $Campos): ?>
	<form action="CampoGenerico"  method="post">
		<div class="resultado">
			<input type="hidden" name="idinmueble" value="<?php echo $Campos['idInmueble']; ?>"/>
			<p class="descripcion"> 
				<p> Descripcion:
				<?php echo CHtml::decode($Campos['Descripcion']);  ?> 
				</p>
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($Campos['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($Campos['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($Campos['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($Campos['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($Campos['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($Campos['Direccion']);  ?> 

				</p>
			</p>
			<?php $id = $Campos['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
 			<div class="row buttons">
			<?php echo CHtml::submitButton('Ver Mas'); ?>
			</div>
			</div>

		</div>
		</form>
	<?php endforeach; ?>

</div>
