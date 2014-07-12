<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<?php if(isset($mensaje)){ ?>
<div id="mensaje">
 <?php  echo $mensaje ;  ?>
</div>
<?php } ?>


<form id="calendario"  name="calendario" action="Calendario"  method="post">

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
        'dateFormat'=>'dd/mm/yy',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;background-color:white;color:black;',
    ),
));
?>
</div>



<input type="submit" class="btn btn-primary btn-large" value="Agregar"/>

</form>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
   jQuery('body').delegate('#inmueble','change',function(){
    jQuery.ajax({
         'url':'/yii/sistema/backend.php/site/CargarCalendario/?id=' + $('#inmueble').val(),
         'cache':false,
         'success':function(html){
            jQuery("#vista").html(html)
         }
      });
      return false;
   });
});
/*]]>*/
</script>
 

<div id="vista"></div>



<hr>
<h1> Buscador </h1>

<div id="buscaporfecha">

Fecha
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'fechabuscador',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'dateFormat'=>'dd/mm/yy',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;background-color:white;color:black;',
    ),
));
?>

<input type="button" name="buscador" id="buscarfecha" value="buscar por fecha">

<input type="text" name="cedula" id="cedula">
<input type="button" name="buscarcedula" id="buscarcedula" value="buscar por cedula">


<div>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
   $( "#buscarfecha" ).click(function(){
    jQuery.ajax({
         'url':'/yii/sistema/backend.php/site/CargarCalendario2/?fecha=' + $('#fechabuscador').val(),
         'cache':false,
         'success':function(html){
            jQuery("#vista2").html(html)
         }
      });
      return false;
   });
   $( "#buscarcedula" ).click(function(){
    jQuery.ajax({
         'url':'/yii/sistema/backend.php/site/CargarCalendario3/?cedula=' + $('#cedula').val(),
         'cache':false,
         'success':function(html){
            jQuery("#vista2").html(html)
         }
      });
      return false;
   });

});
/*]]>*/
</script>


<div id="vista2">

</div>