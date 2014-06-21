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
		<?php echo $form->labelEx($model2,'username'); ?>
		<?php echo $form->textField($model2,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model2,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'email'); ?>
		<?php echo $form->textField($model2,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model2,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
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