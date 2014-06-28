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
	array('label'=>'List Inmueble', 'url'=>array('index')),	
	array('label'=>'Update Inmueble', 'url'=>array('update', 'id'=>$model->idInmueble)),	
	array('label'=>'Add Pictures', 'url'=>array('pictures', 'id'=>$model->idInmueble)),
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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idInmueble'); ?>
		<?php echo $form->textField($model,'idInmueble'); ?>
		<?php echo $form->error($model,'idInmueble'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($imagenes,'Agregar Imagenes'); ?>
		<?php echo $form->fileField($imagenes,'Ubicacion', array('maxlength'=>255)); ?>
		<?php echo $form->error($imagenes,'Ubicacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Agregar'); ?>
	</div>

	


 <?php $this->endWidget(); ?>

</div><!-- form -->