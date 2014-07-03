<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<?php 
   /*
     $todo=Yii::app()->ImagenesInmueble->slider();
      $fotos= $todo[0];
      $titulo= $todo[1];
      $descripcion =   $todo[2];
      $this->widget('bootstrap.widgets.TbCarousel', array(
      'items'=>array(
        array('image'=> $fotos[0], 'label'=> $titulo[0], 'caption'=> $descripcion[0]),
        array('image'=> $fotos[1], 'label'=>$titulo[1], 'caption'=>$descripcion[1]),
        array('image'=> $fotos[2], 'label'=>$titulo[2], 'caption'=>$descripcion[2]),
        array('image'=> $fotos[3], 'label'=> $titulo[3], 'caption'=>$descripcion[3]),
        array('image'=> $fotos[4], 'label'=>$titulo[4], 'caption'=>$descripcion[4]),
        array('image'=> $fotos[5], 'label'=>$titulo[5], 'caption'=> $descripcion[5]),
    ), )); 
    */
?>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
    $( "p" ).click(function() {
    var htmlString = $( this ).html();
    var padre = $(this).parents('div:eq(0)').attr('id');
    if ( padre == "filtrosaplicados"){
       var valor = $(this).html();
       if (valor == "Apartamento" || valor =="Casa" || valor=="Campo"){
        $("#filtroTipo").show();
        $("#filtroTipo").append($(this));  
     }
      if (valor == "Venta" || valor =="Alquiler"){
        $("#filtrooperacion").show();
        $("#filtrooperacion").append($(this));  
       }        
    }
    else{
      $("#filtrosaplicados").append($(this));
      if  (padre == "filtroTipo"){
        $("#filtroTipo").hide();
      }if  (padre == "filtrooperacion"){
        $("#filtrooperacion").hide();
      }       
    }

      var filtros = $("#filtrosaplicados").html();
      var find = '<p>';
      var re = new RegExp(find, 'g');
      str = filtros.replace(re, '');
      
      var find = '</p>';
      var re = new RegExp(find, 'g');
      str2 = str.replace(re, ';');      

      var res = filtros.replace("</p>", ";");
      var resultado =  res.replace("<p>",""); 
      
      jQuery.ajax({
         'url':'/yii/sistema/backend.php/site/ResultDatos/?filtros=' + str2,
         'cache':false,
         'success':function(html){
            jQuery("#resultado").html(html)
         }
         });

    });
});
/*]]>*/
</script>

<div id="filtradolateral">
Filtrado Por: 
<div id="filtrosaplicados">
</div>

<div id="filtroTipo">
Inmueble:
  <p>Apartamento</p>
  <p>Casa</p>
  <p>Campo</p>
</div>

<div id="filtrooperacion">
Operacion:
  <p>Venta</p>
  <p>Alquiler</p>
</div>

<div id="filtroubicacion">
</div>

<div id="filtrometro">
</div>

<div id="filtroprecio">
</div>


</div>






 
   <div id="resultado">
    Datos
   <!--

   <div id="mapa">
   <?php
    echo Yii::app()->Mapas->mapa();
   ?>
   </div>

   <div class="container"> 
   <div id="buscador">
   <h1> Inmuebles </h1>
   <select id="tipoinmueble" class="selectpicker" data-style="btn-primary" data-width="auto">
   <option value="1"> Casa </option>
   <option value="2"> Apartamento </option>
   </select>

   <select id="departamento" data-width="auto">
   <option value="1"> Todos los departamentos </option>
   <option value="2"> Montevideo </option>
   </select>

   <select id="ciudad" data-width="auto">
   <option value="1"> Todas las Ciudades </option>
   <option value="2"> Montevideo </option>
   </select>   
    
   <button type="submit" class="btn btn-primary">Buscar</button>  
   </div>


   
   !-->
   </div>
</div>






