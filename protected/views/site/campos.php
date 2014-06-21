<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - campos';
$this->breadcrumbs=array(
	'campos',
);
?>

<h1>Campos</h1>

<?php if(Yii::app()->user->hasFlash('campos')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('campos'); ?>
</div>

<?php else: ?>

<p>
Mostrar las campos
</p>


<?php endif; ?>