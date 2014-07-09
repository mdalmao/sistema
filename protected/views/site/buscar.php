<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>


<?php 
  
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
            jQuery("#resultadobuscador").html(html)
         }
         });

    });
});
/*]]>*/
</script>


<div id="filtradolateral">
<div id="filtrosaplicados">
<p class="texto"> Filtrado Por: </p> 
</div>
<div id="filtroTipo">
<p class="texto"> Inmueble: </p>
  <p>Apartamento</p>
  <p>Casa</p>
  <p>Campo</p>
</div>
<div id="filtrooperacion">
<p class="texto"> Operacion: </p>
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
<div id="resultadobuscador">

  <?php foreach ($model as $inmueble): ?>
      <div  class="resultado">
      
      <p class="descripcion"> 
        Descripcion:
        <?php echo CHtml::decode($inmueble['Descripcion']);  ?> 
      </p>
      <p class="estado">
        <p> Estado:
         <?php echo CHtml::decode($inmueble['Estado']);  ?> 
        </p>
      </p>
      <p class="precio"> 
        <p> Precio:
        <?php echo CHtml::decode($inmueble['Precio']);  ?> 
        </p>
      </p>
      <p class="departamento"> 
        <p>Departamento:
        <?php echo CHtml::decode($inmueble['Departamento']);  ?> 
        </p>


      </p>
      <p class="ciudad">
        <p>Ciudad:
         <?php echo CHtml::decode($inmueble['Ciudad']);  ?>
        </p>
       </p>
      <p class="direccion"> 
        <p>
          Zona: 
          <?php echo CHtml::decode($inmueble['Zona']); ?>
        </p>
        <p> Direccion:  

        <?php echo CHtml::decode($inmueble['Direccion']);  ?> 

        </p>
      </p>
      </div>
     <?php endforeach; ?>
     
</div>

   
   







