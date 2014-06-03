<?php
/* @var $this ContactoController */
/* @var $data Contacto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idContacto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idContacto), array('view', 'id'=>$data->idContacto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreContacto')); ?>:</b>
	<?php echo CHtml::encode($data->NombreContacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MesajeContacto')); ?>:</b>
	<?php echo CHtml::encode($data->MesajeContacto); ?>
	<br />


</div>