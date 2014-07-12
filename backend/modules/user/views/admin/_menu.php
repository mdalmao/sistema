<ul class="actions">
<?php 
	if (count($list)) {
		foreach ($list as $item)
			echo "<li>".$item."</li>";
	}
?>
	<li><?php echo CHtml::link(UserModule::t('Lista de Empleados'),array('/user')); ?></li>
	<li><?php echo CHtml::link(UserModule::t('Gestionar Empleados'),array('admin')); ?></li>
	<!--<li><?php echo CHtml::link(UserModule::t('Manage Profile Field'),array('profileField/admin')); ?></li>-->
</ul><!-- actions -->