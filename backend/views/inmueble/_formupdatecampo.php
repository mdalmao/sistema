<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCoreScript('jquery');
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
		<?php echo $form->labelEx($model,'x'); ?>
		<?php echo $form->textField($model,'x'); ?>
		<?php echo $form->error($model,'x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'y'); ?>
		<?php echo $form->textField($model,'y'); ?>
		<?php echo $form->error($model,'y'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'Hectareas'); ?>
		<?php echo $form->textField($campo,'Hectareas'); ?>
		<?php echo $form->error($model,'Hectareas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MetrosCuadradosTerreno'); ?>
		<?php echo $form->textField($campo,'MetrosCuadradosTerreno'); ?>
		<?php echo $form->error($model,'MetrosCuadradosTerreno'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'MetrosConstruidos'); ?>
		<?php echo $form->textField($campo,'MetrosConstruidos'); ?>
		<?php echo $form->error($model,'MetrosConstruidos'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Luz'); ?>
		<?php echo $form->dropDownList($campo,'Luz',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Luz'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'ViviendaPatronal'); ?>
		<?php echo $form->dropDownList($campo,'ViviendaPatronal',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'ViviendaPatronal'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'ViviendaCapataz'); ?>
		<?php echo $form->dropDownList($campo,'ViviendaCapataz',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'ViviendaCapataz'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'EstadoAlambrado'); ?>
		<?php echo $form->textField($campo,'EstadoAlambrado'); ?>
		<?php echo $form->error($model,'EstadoAlambrado'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'IndiceCONEAT'); ?>
		<?php echo $form->textField($campo,'IndiceCONEAT'); ?>
		<?php echo $form->error($model,'IndiceCONEAT'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Tajamar'); ?>
		<?php echo $form->dropDownList($campo,'Tajamar',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Tajamar'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Caniada'); ?>
		<?php echo $form->dropDownList($campo,'Caniada',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Caniada'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'PozoAgua'); ?>
		<?php echo $form->dropDownList($campo,'PozoAgua',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'PozoAgua'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Galpones'); ?>
		<?php echo $form->dropDownList($campo,'Galpones',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Galpones'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Extras'); ?>
		<?php echo $form->textField($campo,'Extras'); ?>
		<?php echo $form->error($model,'Extras'); ?>
	</div>

	<div class="row">	
		<?php echo $form->labelEx($model,'Imagen Principal'); ?>
		<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($model->idInmueble); ?>" /> 
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Imagen Principal'); ?>
		<?php echo $form->fileField($imagenes,'Ubicacion', array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'Ubicacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->