<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
   $("#imagen").hide();
   $( "#consultar" ).click(function() {
     var valor1= $("#valor1").val();
     var valor2= $("#valor2").val();
     var valor3= $("#valor3").val();
     $("#imagen").show();
     jQuery.ajax({
           'url':'/yii/sistema/index.php/site/WebServiceHipoteca/?valor1=' + valor1 +'&valor2='+ valor2 +'&valor3='+ valor3,
           'cache':false,
           'success':function(html){
               $("#imagen").hide();
              jQuery("#hipotecaresultado").html(html)
           }
        });
     });

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
      if ( padre == "filtroTipo" || padre == "filtrooperacion"  ){
        $("#filtrosaplicados").append($(this));
        if  (padre == "filtroTipo"){
          $("#filtroTipo").hide();
        }if  (padre == "filtrooperacion"){
          $("#filtrooperacion").hide();
        } 
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
   
   $( "#buscarportexto" ).keypress(function() {
     var valor= $(this).val();
     
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
           'url':'/yii/sistema/backend.php/site/ResultDatosTexto/?filtros=' + str2 +'&valor='+ valor,
           'cache':false,
           'success':function(html){
              
              jQuery("#resultadobuscador").html(html)
           }
        });
      

  });

});
/*]]>*/
</script>



<aside>
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
</aside>


<div class="videoDestacado">
      <video poster="imagenes/foto.png" width="380" height="240" controls>
      <source src="imagenes/video.mp4" type="video/mp4;
      codecs="avc1.42E01E,mp4a.40.2""></br>
</div>     

<div class="conversor">
<a href='http://www.freecurrencyrates.com/es/myconverter#cur=USD-EUR-UYU-ARS-BRL-GBP;amt=USD1' id='ccw_cnhfybwf'>CONVERSOR</a>
  <div id='gcw_rates'></div>
  <script src='http://www.freecurrencyrates.com/converter-widget?source=Yahoo%20Finance&width=250&currs=USD,EUR,UYU,ARS,BRL,GBP&precision=2&language=es&flags=1&currchangable=0' charset='UTF-8'>
</script>
</div>



<div id="lateralderecha2">


<div id="hipoteca">
Hipoteca
<div id="campo1">
Monto del Prestamo
<input type="text" id="valor1" name="valor1" >
</div>
<div id="campo2">
Rango de Interes
<input type="text" id="valor2" name="valor2" >
</div>
<div id="campo3">
Mes
<input type="text" id="valor3" name="valor3" > 
</div>
<input type="button" name="consultar" id="consultar" value="Consultar Hipoteca">
<div id="imagen">
   <img src="http://www.funcion13.com/wp-content/uploads/2012/04/loader.gif" />
</div>

<div id="contenedorHipotecaResultado">
Resultado
<div id="hipotecaresultado">

</div>
</div>
</div>




</div>
<div id='contenido'>

<div id="buscadortexto">
 <input type="text" name="buscador" id="buscarportexto" placeholder="Buscar por Texto"/>

</div>

<div id="filtradolateral">
<p class="texto"> Filtrado Por: </p> 
<div id="filtrosaplicados">
</div>


<div id="filtroTipo">
<span class="texto"> Inmueble: </span>
  <p>Apartamento</p>
  <p>Casa</p>
  <p>Campo</p>
</div>


<div id="filtrooperacion">
<span class="texto"> Operacion: </span>
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
       
       <?php $url = "http://localhost:90/yii/sistema/index.php/site/DescripcionInmueble?idinmueble=". $inmueble['idInmueble']; ?>
       <a href="<?php echo $url; ?>">
       <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($inmueble['idInmueble']); ?>" /> 
       </a>  
      <p class="estado">
        </p> Estado:
         <?php echo CHtml::decode($inmueble['Estado']);  ?> 
        </p>
      </p>
      <p class="precio"> 
        </p> Precio:
        <?php echo CHtml::decode($inmueble['Precio']);  ?> 
        </p>
      </p>
      <p class="departamento"> 
        </p>Departamento:
        <?php echo CHtml::decode($inmueble['Departamento']);  ?> 
        </p>


      </p>
      <p class="ciudad">
        </p>Ciudad:
         <?php echo CHtml::decode($inmueble['Ciudad']);  ?>
        </p>
       </p>
      <p class="direccion"> 
        </p>
          Zona: 
          <?php echo CHtml::decode($inmueble['Zona']); ?>
        </p>
        </p> Direccion:  

        <?php echo CHtml::decode($inmueble['Direccion']);  ?> 

        </p>
      </p>
     

      </div>
    
     <?php endforeach; ?>
     
</div>


<!--<div id="mapa">
<?php
echo Yii::app()->Mapas->mapa();
?>
</div>-->

 


 
 



