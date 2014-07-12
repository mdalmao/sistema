<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->label($model,'Nacionalidad'); ?>
		<?php echo $form->textField($model,'Nacionalidad',array('size'=>45,'maxlength'=>45)); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model2,'CIUsuario'); ?>
		<?php echo $form->textField($model2,'CIUsuario',array('size'=>45,'maxlength'=>45)); ?>
		
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
		<?php echo $form->labelEx($model2,'FechaNacimiento (Anio/Mes/Dia)'); ?>
		<?php echo $form->textField($model2,'FechaNacimiento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model2,'FechaNacimiento'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->