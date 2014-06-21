<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Alquileres';
$this->breadcrumbs=array(
	'Alquileres',
);
?>

<h1>Apartamentos</h1>

<?php if(Yii::app()->user->hasFlash('alquileres')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('alquileres'); ?>
</div>

<?php else: ?>

<p>
Mostrar los alquileres
</p>


<?php endif; ?>