<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */

$this->breadcrumbs=array(
	'Inmuebles'=>array('index'),	
	$model->idInmueble,
);

$this->menu=array(
	array('label'=>'Lista de Inmuebles', 'url'=>array('index')),	
	array('label'=>'Modificar Inmueble', 'url'=>array('update', 'id'=>$model->idInmueble)),	
	array('label'=>'Agregar Fotos', 'url'=>array('pictures', 'id'=>$model->idInmueble)),
);
?>



<div class="form">
	<script>
  $(document).ready(function() {
      $("#apartamento").hide();
      
	  $("#Inmueble_TipoInmueble").change(function() {
	     var valor = $(this).val();
         if  ( valor == "CASA" ){
		   $("#apartamento").hide();
           $("#casa").show();
         }
         if  ( valor == "APARTAMENTO" ){
		   $("#apartamento").hide();
           $("#casa").show();
         }
         if  ( valor == "OFICINA" ){
		   $("#apartamento").hide();
           $("#casa").show();
         }
         else{
		   $("#apartamento").show();
           $("#casa").hide();
		 }
		 
      });
	  
   });
  </script>
<?php $form=$this->beginWidget('CActiveForm', array(	
	'id'=>'inmueble-form',
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idInmueble'); ?>
		<?php echo $form->textField($model,'idInmueble'); ?>
		<?php echo $form->error($model,'idInmueble'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Agregar Imagenes'); ?>
		<?php echo $form->fileField($imagenes,'Ubicacion', array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'Ubicacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Agregar'); ?>
	</div>

	<?php echo Yii::app()->ImagenesInmueble->AllImage($model->idInmueble); ?>

 <?php $this->endWidget(); ?>

</div><!-- form -->