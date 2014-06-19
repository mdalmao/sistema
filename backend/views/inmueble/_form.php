<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
?>

<div class="form">
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inmueble-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,	
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row", id="tipos">
		<?php echo $form->labelEx($model,'TipoInmueble'); ?>
		<?php echo $form->dropDownList($model,'TipoInmueble',array('CASA'=>'CASA','APARTAMENTO'=>'APARTAMENTO','OFICINA'=>'OFICINA','CAMPO'=>'CAMPO','TERRENO'=>'TERRENO')); ?>
		<?php echo $form->error($model,'TipoInmueble'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'QueHacer'); ?>
		<?php echo $form->dropDownList($model,'QueHacer',array('1'=>'VENDO','2'=>'ALQUILO','3'=>'TRASPASO','4'=>'PERMUTO')); ?>
		<?php echo $form->error($model,'QueHacer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Disponible'); ?>
		<?php echo $form->textField($model,'Disponible'); ?>
		<?php echo $form->error($model,'Disponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Precio'); ?>
		<?php echo $form->textField($model,'Precio'); ?>
		<?php echo $form->error($model,'Precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Departamento'); ?>
		<?php echo $form->textField($model,'Departamento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Departamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ciudad'); ?>
		<?php echo $form->textField($model,'Ciudad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Zona'); ?>
		<?php echo $form->textField($model,'Zona',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Zona'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Portada'); ?>
		<?php echo $form->textField($model,'Portada'); ?>
		<?php echo $form->error($model,'Portada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->dropDownList($model,'idUsuario',CHtml::listData(Datospersonales::model()->findAll(),'idUsuario','CIUsuario')); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

<div id="casapo">
	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de Construccion'); ?>
		<?php echo $form->textField($casapo,'AnioConstruccion'); ?>
		<?php echo $form->error($model,'AnioConstruccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Metros Cuadrados'); ?>
		<?php echo $form->textField($casapo,'MetrosCuadrados'); ?>
		<?php echo $form->error($model,'MetrosCuadrados'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cantidad de Dormitorios'); ?>
		<?php echo $form->textField($casapo,'Dormitorios'); ?>
		<?php echo $form->error($model,'Dormitorios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cantidad de Banios'); ?>
		<?php echo $form->textField($casapo,'Banios'); ?>
		<?php echo $form->error($model,'Banios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Garage'); ?>
		<?php echo $form->textField($casapo,'Garage'); ?>
		<?php echo $form->error($model,'Garage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Calefaccion'); ?>
		<?php echo $form->dropDownList($casapo,'Calefaccion',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Calefaccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tanque de Agua'); ?>
		<?php echo $form->dropDownList($casapo,'TanqueAgua',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'TanqueAgua'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cerramiento'); ?>
		<?php echo $form->dropDownList($casapo,'Cerramiento',array('Planchada'=>'Planchada','Techo libiano'=>'Techo Libiano')); ?>
		<?php echo $form->error($model,'Cerramiento'); ?>
	</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>




<?php $this->endWidget(); ?>

</div><!-- form -->