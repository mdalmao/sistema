<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUsuario), array('view', 'id'=>$data->idUsuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CIUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->CIUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->NombreUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ApellidoUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->ApellidoUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DireccionUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->DireccionUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaNacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->FechaNacimiento); ?>
	<br />
<!--agregar modelo 2-->

	


</div>