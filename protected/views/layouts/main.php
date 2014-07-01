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
	
	<link rel= "stylesheet" href="css/bootstrap.css">





</head>

<body>
<div class="page-header">
		
		<div class= "container-fluid">
			<br/>
			<p> <img class ="img-rounded" src="<?php echo Yii::app()->baseUrl . '/imagenes/'. 'logo.png' ; ?>"></img></p>
			<h4>Bienveniedos a nuestra Inmboliaria Inmobi 4p</h4>

		</div>
		<div>
			<ul class="nav nav-pills">


			 <li> <a href="/yii/sistema/" class="btn btn-primary btn-large"><i class="icon-white icon-home"></i> Inicio</a> </li>
			 <li> <a href="/yii/sistema/site/Mision" class="btn btn-primary btn-large"><i class="icon-white "></i> Misión</a> </li>
			 <li> <a href="/yii/sistema/site/Vision" class="btn btn-primary btn-large"><i class="icon-white"></i> Visión</a> </li>
			 <li> <a href="/yii/sistema/site/alquileres" class="btn btn-success btn-large"><i class="icon-white "></i> Alquileres</a> </li>
			 <li> <a href="/yii/sistema/site/ventas" class="btn btn-success btn-large"><i class="icon-white "></i> Ventas</a> </li>
			 <li> <a href="/yii/sistema/site/casas" class="btn btn-success btn-large"><i class="icon-white"></i> Casas</a> </li>
			<li> <a href="/yii/sistema/site/apartamentos" class="btn btn btn-success btn-large"><i class="icon-white "></i> Apartamentos</a> </li>
			<li> <a href="/yii/sistema/site/campos" class="btn btn-success btn-large"><i class="icon-white"></i> Campos</a> </li>
	    
			 <li> <a href="/yii/sistema/site/contact" class="btn btn-primary btn-large"><i class="icon-white icon-envelope"></i> Contacto</a> </li>    
			
			     <form class="navbar-form navbar-left" role="search">

			        <input type="text" class="search-query" placeholder="Buscar" />        
			        <label for="mySubmit" class="btn btn-primary btn-small"><i class="icon-search icon-white"></i> Buscar</label>

			        <input id="mySubmit" type="submit" value="Go" class="hidden" />
			     </form>    

			</ul>

		</div>
</div>
<div id="container">
	

	<div id="main">
	<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>
	</div>
</div>





 

<div id="footer">

     	Copyright &copy; <?php echo date('Y'); ?> Inmobiliaria PHP Inmobi 4p.<br/>
		All Rights Reserved.<br/>
		
 </div><!-- footer -->
</body>
</html>
