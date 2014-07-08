<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$todo=Yii::app()->ImagenesInmueble->slider();
$fotos= $todo[0];
$titulo= $todo[1];
$descripcion =   $todo[2];


?>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
jQuery(function($) {
    
   $("#des-form1").hide();
   $("#des-form2").hide();
   $("#des-form3").hide();
   $("#des-form4").hide();
   $("#des-form5").hide();
   $("#des-form6").hide();
    $( "#destacado1" ).mouseover(function() {
        $('#destacado1-arriba').hide();
        $("#des-form1").show();
       });
   $( "#destacado1" ).mouseout(function() {
        $('#destacado1-arriba').show();
        $("#des-form1").hide();
      });
   $( "#destacado2" ).mouseover(function() {
        $('#destacado2-arriba').hide();
        $("#des-form2").show();
       });
   $( "#destacado2" ).mouseout(function() {
        $('#destacado2-arriba').show();
        $("#des-form2").hide();
      });
   $( "#destacado3" ).mouseover(function() {
        $('#destacado3-arriba').hide();
        $("#des-form3").show();
       });
   $( "#destacado3" ).mouseout(function() {
        $('#destacado3-arriba').show();
        $("#des-form3").hide();
      });
    $( "#destacado4" ).mouseover(function() {
        $('#destacado4-arriba').hide();
        $("#des-form4").show();
       });
   $( "#destacado4" ).mouseout(function() {
        $('#destacado4-arriba').show();
        $("#des-form4").hide();
      });
    $( "#destacado5" ).mouseover(function() {
        $('#destacado5-arriba').hide();
        $("#des-form5").show();
       });
   $( "#destacado5" ).mouseout(function() {
        $('#destacado5-arriba').show();
        $("#des-form5").hide();
      });
   $( "#destacado6" ).mouseover(function() {
        $('#destacado6-arriba').hide();
        $("#des-form6").show();
       });
   $( "#destacado6" ).mouseout(function() {
        $('#destacado6-arriba').show();
        $("#des-form6").hide();
      });
});
</script>


<div id="contenido-principal">
  <p id="des"> Destacados  </p>
    
    <div id="destacado1">
    <img class="des-imagen" src='<?php echo $fotos[0] ; ?>' />
    <form id="des-form1">
      <input type="hidden" text="1" />
      <input type="submit" class="vermas" value="Ver Mas" >
    </form>

    <div id="destacado1-arriba">
    <?php echo $descripcion[0] ; ?>' 
    </div>
    </div>
    
    <div id="destacado2">
    <img class="des-imagen" src='<?php echo $fotos[1] ; ?>' />
    <form id="des-form2">
      <input type="hidden" text="1" />
      <input type="submit" class="vermas" value="Ver Mas" >
    </form>
    <div id="destacado2-arriba">
    <?php echo $descripcion[1] ; ?>' 
    </div>
    </div>

    <div id="destacado3">
    <img class="des-imagen" src='<?php echo $fotos[2] ; ?>' />
    <form id="des-form3">
      <input type="hidden" text="1" />
      <input type="submit" class="vermas" value="Ver Mas" >
    </form>
    <div id="destacado3-arriba">
    <?php echo $descripcion[2] ; ?>' 
    </div>
    </div> 

    <div id="destacado4">
    <img class="des-imagen" src='<?php echo $fotos[3] ; ?>' />
    <form id="des-form4">
      <input type="hidden" text="1" />
      <input type="submit" class="vermas" value="Ver Mas" >
    </form>
    <div id="destacado4-arriba">
    <?php echo $descripcion[3] ; ?>' 
    </div>
    </div>

    <div id="destacado5">
    <img  class="des-imagen" src='<?php echo $fotos[4] ; ?>' />
    <form id="des-form5">
      <input type="hidden" text="1" />
      <input type="submit" class="vermas" value="Ver Mas" >
    </form>
    <div id="destacado5-arriba">
    <?php echo $descripcion[4] ; ?>' 
    </div>
    </div>

    <div id="destacado6">
    <img class="des-imagen" src='<?php echo $fotos[5] ; ?>' />
    <form id="des-form6">
      <input type="hidden" text="1" />
      <input type="submit" class="vermas" value="Ver Mas" >
    </form>
    <div id="destacado6-arriba">
    <?php echo $descripcion[5] ; ?>' 
    </div>
    </div>

</div>
