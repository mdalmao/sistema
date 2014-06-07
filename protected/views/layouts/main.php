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

<div class="container-fluid">
<ul class="nav nav-pills">
 <li> <a href="/yii/sistema/" class="btn btn-primary btn-large"><i class="icon-white icon-home"></i> Inicio</a> </li>
 <li> <a href="#" class="btn btn-primary btn-large"><i class="icon-white icon-calendar"></i> Calendario</a> </li>
 <li> <a href="/yii/sistema/site/contact" class="btn btn-primary btn-large"><i class="icon-white icon-envelope"></i> Contacto</a> </li>
     <form class="navbar-form navbar-left" role="search">
        <input type="text" class="search-query" placeholder="Buscar" />        
        <label for="mySubmit" class="btn"><i class="icon-search icon-white"></i> Buscar</label>
        <input id="mySubmit" type="submit" value="Go" class="hidden" />
     </form>    
</ul>
</div>


<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


 <div id="footer">

     	Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
 </div><!-- footer -->

</div><!-- page -->

</body>
</html>
