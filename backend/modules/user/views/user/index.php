<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
?>

<h1><?php echo UserModule::t("Lista de Empleados"); ?></h1>
<?php if(UserModule::isAdmin()) {
	?><ul class="actions">
	<li><?php echo CHtml::link(UserModule::t('Gestionar Empleados'),array('/user/admin')); ?></li>
	<!--<li><?php echo CHtml::link(UserModule::t('Gestionar Perfil '),array('profileField/admin')); ?></li>-->
</ul><!-- actions --><?php 
} ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		),
	),
)); ?>
