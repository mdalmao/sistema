<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('Gestion Empleados'),array('/user/admin')); ?></li>
<?php 
} else {
?>
<li><?php echo CHtml::link(UserModule::t('Lista de Empleados'),array('/user')); ?></li>
<?php
}
?>
<li><?php echo CHtml::link(UserModule::t('Perfil'),array('/user/profile')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Editar'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Modificar password'),array('changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Cerrar Sesión'),array('/user/logout')); ?></li>
</ul>