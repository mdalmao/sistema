<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contacto';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contacto</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Si desea comunicarse con nuestra empresa, ingrese sus datos en el formulario a continuación:
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos <span class="required">*</span> requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
<<<<<<< Updated upstream
		<!-- <?php echo $form->labelEx($model,'name'); ?> -->
	 	<?php echo "Nombre" ?>
=======
		<?php echo $form->labelEx($model,'Nombre'); ?>
>>>>>>> Stashed changes
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
<<<<<<< Updated upstream
		<!-- <?php echo $form->labelEx($model,'email'); ?> -->
		<?php echo "Email *";?>
=======
		<?php echo $form->labelEx($model,'Email'); ?>
>>>>>>> Stashed changes
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
<<<<<<< Updated upstream
		<!-- <?php echo $form->labelEx($model,'telefono'); ?> -->
		<?php echo "Telefono"; ?>
=======
		<?php echo $form->labelEx($model,'Telefono'); ?>
>>>>>>> Stashed changes
		<?php echo $form->textField($model,'telefono'); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
<<<<<<< Updated upstream
		<!-- <?php echo $form->labelEx($model,'subject'); ?> -->
		<?php echo "Asunto"; ?>
=======
		<?php echo $form->labelEx($model,'Asunto'); ?>
>>>>>>> Stashed changes
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
<<<<<<< Updated upstream
		<!-- <?php echo $form->labelEx($model,'body'); ?> -->
		<?php echo "Mensaje"; ?>
=======
		<?php echo $form->labelEx($model,'Mensaje'); ?>
>>>>>>> Stashed changes
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<!-- <?php echo $form->labelEx($model,'verifyCode'); ?>  -->
        <?php echo "Codigo de Verficacion"; ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
<<<<<<< Updated upstream
		<div class="hint">Por favor introduce las letras tal como se muestran en la imagen de arriba. 
Las letras no distinguen entre mayúsculas y minúsculas.</div>
=======
		<div class="hint">Por favor ingresa las letras que aparecen en el captcha.
		<br/>No es case-sensitive.</div>
>>>>>>> Stashed changes
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>