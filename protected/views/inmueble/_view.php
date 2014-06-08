<?php
/* @var $this InmuebleController */
/* @var $data Inmueble */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInmueble')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInmueble), array('view', 'id'=>$data->idInmueble)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoInmueble')); ?>:</b>
	<?php echo CHtml::encode($data->TipoInmueble); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QueHacer')); ?>:</b>
	<?php echo CHtml::encode($data->QueHacer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Disponible')); ?>:</b>
	<?php echo CHtml::encode($data->Disponible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode($data->Precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Departamento')); ?>:</b>
	<?php echo CHtml::encode($data->Departamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->Ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Zona')); ?>:</b>
	<?php echo CHtml::encode($data->Zona); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Portada')); ?>:</b>
	<?php echo CHtml::encode($data->Portada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x')); ?>:</b>
	<?php echo CHtml::encode($data->x); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('y')); ?>:</b>
	<?php echo CHtml::encode($data->y); ?>
	<br />

	*/ ?>

</div>