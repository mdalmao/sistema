<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUsuario), array('view', 'id'=>$data->idUsuario)); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->Nacionalidad); ?>
	<br />


</div>