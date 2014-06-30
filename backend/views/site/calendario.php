<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
Yii::app()->clientScript->registerCoreScript('jquery');

?>

<form id="calendario" name="calendario" action="Calendario"  method="post">

<div id="divinmuble">
Inmueble
<?php echo Yii::app()->Datos-> inmueblescombo(); ?>
</div>

<div id="divcliente">
Clientes
<?php echo Yii::app()->Datos-> clientesscombo(); ?>
</div>

<div id="divhora">
Horas
<?php echo Yii::app()->Datos-> horas(); ?>
</div>

<div id="divfecha">
Fecha
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'fecha',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;background-color:white;color:black;',
    ),
));
?>
</div>



<input type="submit" class="btn btn-primary btn-large" value="Agregar"/>

</form>