<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ventas';
$this->breadcrumbs=array(
	'Venta',
);
?>

<h1>Apartamentos</h1>

<?php if(Yii::app()->user->hasFlash('ventas')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('ventas'); ?>
</div>

<?php else: ?>

<p>
Mostrar los ventas
</p>


<?php endif; ?>