<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('index'),
	UserModule::t('Create'),
);
?>
<h1><?php echo UserModule::t("Crear Empleado"); ?></h1>

<?php 
	echo $this->renderPartial('_menu',array(
		'list'=> array(),
	));
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>