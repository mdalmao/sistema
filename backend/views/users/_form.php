<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con<span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	
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
		<?php echo $form->labelEx($model2,'CIUsuario'); ?>
		<?php echo $form->textField($model2,'CIUsuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'CIUsuario'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model2,'Telefono'); ?>
		<?php echo $form->textField($model2,'Telefono',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'FechaNacimiento '); ?>
		<p>formato:yyyy--mm--dd</p>
		
		<?php echo $form->textField($model2,'FechaNacimiento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'FechaNacimiento'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	

	

	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->