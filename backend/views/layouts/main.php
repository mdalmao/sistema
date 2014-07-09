<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <?php
    echo Yii::app()->bootstrap->registerAllCss();
    echo Yii::app()->bootstrap->registerCoreScripts();


    ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		
		<p> <img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'logo.png' ; ?>"></img></p>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				
                              //array('label'=>'Rights', 'url'=>array('/rights'), 'visible'=>!Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                              //array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Perfil"), 'visible'=>!Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Cliente', 'url'=>array('/cliente'), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Contacto', 'url'=>array('/contacto'), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Inmueble', 'url'=>array('/inmueble'), 'visible'=>!Yii::app()->user->isGuest),
								//array('label'=>'EmpleadoModulo', 'url'=>array('/user'), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Empleado', 'url'=>array('/users'), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Calendario', 'url'=>array('/site/calendario'), 'visible'=>!Yii::app()->user->isGuest),
								//array('label'=>'Gestion de Portada', 'url'=>array('/gestiondeportada'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div class='info' style='text-align:left;'>
	<?php
	$flashMessages = Yii::app()->user->getFlashes();
		if ($flashMessages) {
	   		echo '<ul class="flashes">';
	   		foreach($flashMessages as $key => $message) {
	        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
	    }
	    echo '</ul>';
	}
	?>
	</div>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

<?php
//efecto para el div de Mensajes
Yii::app()->clientScript->registerScript(
'myHideEffect',
'$(".info").animate({opacity: 1.0},10000).slideUp("slow");',
CClientScript::POS_READY
	);
?>