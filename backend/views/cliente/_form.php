<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model2,'CIUsuario'); ?>
		<?php echo $form->textField($model2,'CIUsuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'CIUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'NombreUsuario'); ?>
		<?php echo $form->textField($model2,'NombreUsuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'NombreUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'ApellidoUsuario'); ?>
		<?php echo $form->textField($model2,'ApellidoUsuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'ApellidoUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'DireccionUsuario'); ?>
		<?php echo $form->textField($model2,'DireccionUsuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'DireccionUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'Telefono'); ?>
		<?php echo $form->textField($model2,'Telefono',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'FechaNacimiento'); ?>
		<?php echo $form->textField($model2,'FechaNacimiento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'FechaNacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nacionalidad'); ?>
		<?php echo $form->textField($model,'Nacionalidad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Nacionalidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->