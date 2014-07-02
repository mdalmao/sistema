<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<?php $todo=Yii::app()->ImagenesInmueble->slider();
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
   jQuery('body').delegate('#filtrosaplicados','change',function(){
    jQuery.ajax({
         'url':'/yii/sistema/backend.php/site/CargarCalendario/?id=' + $('#inmueble').val(),
         'cache':false,
         'success':function(html){
            jQuery("#vista").html(html)
         }
      });
      return false;
   });

    $( "p" ).click(function() {
      
    var htmlString = $( this ).html();
    var padre = $(this).parents('div:eq(0)').attr('id');
    alert("Padre" + padre);
    if ( padre == "filtrosaplicados"){
       var valor = $(this).html();
       alert("valor"+valor);
      if (valor == "Apartamento" || valor =="Casa" || valor=="Campo"){
        $("#filtroTipo").show();
        $("#filtroTipo").append($(this));  
        $("#filtrosaplicados").remove($(this));  
      }
      if (valor == "Venta" || valor =="Alquiler"){
        $("#filtrooperacion").show();
        $("#filtrooperacion").append($(this));  
        $("#filtrosaplicados").remove($(this));
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


 
   <div id="resultado">
    <?php foreach ($model as $inmueble): ?>
   <div class="resultado">
   <p class="reserva-titulo"><?php echo $inmueble['idInmueble']; ?></p>
   <p class="descripcion"> <?php echo CHtml::decode($inmueble['Descripcion']);  ?> </p>
   <?php $id = $inmueble['idInmueble']; ?> 
   <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
   </div>
   <?php endforeach; ?>


   </div>
</div>




