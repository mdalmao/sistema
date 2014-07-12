<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<script type="text/javascript">
   function setLatLngToClass(){
    if(document.getElementById('Inmueble_x'))
        document.getElementById('Inmueble_x').value = map.getCenter().lat();
    if(document.getElementById('Inmueble_y'))
        document.getElementById('Inmueble_y').value = map.getCenter().lng();
    if(document.getElementById('Inmueble_Direccion'))
          document.getElementById('Inmueble_Direccion').value = document.getElementById('formatedAddress').innerHTML;
  }
  function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }
  
  function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    document.getElementById('latlng').innerHTML = latlng;
    document.getElementById('formatedAddress').innerHTML = '';
    currentReverseGeocodeResponse = reverseGeocode();

    
  }

  
  
  function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
  }
  //
  // Displays collected reverse geocoded results
  // and displays them on document elements
  function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status == 'OK') {
      if(results.length == 0) {
        document.getElementById('formatedAddress').innerHTML = 'None';
      } else {
        document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
      }
    } else {
      document.getElementById('formatedAddress').innerHTML = 'Error';
    }
  }
  //
  // geocodes the address inserted
  function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
      'address': address,
      'partialmatch': true}, geocodeResult);
  }
  function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }
  }
 //
 // adds marker to the center of the map
  function addMarkerAtCenter() {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map
    });
    var text = 'Lat/Lng: ' + getCenterLatLngText();
    if(currentReverseGeocodeResponse) {
      var addr = '';
      if(currentReverseGeocodeResponse.size == 0) {
        addr = 'None';
      } else {
        addr = currentReverseGeocodeResponse[0].formatted_address;
      }
      text = text + '<br>' + 'address: <br>' + addr;
      document.getElementById('Inmueble_Direccion').innerHTML = addr;
    }
    var infowindow = new google.maps.InfoWindow({ content: text });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }
</script>


<?php
Yii::import('ext.EGMap.*');
// center the map
// wherever you want
$latitude = -34.8999799;
$longitude =-56.1348723;
$zoom = 12;
$gMap = new EGMap();
$gMap->setJsName('map');
$gMap->width = '93%';
$gMap->height = '400';
$gMap->setCenter($latitude, $longitude);
$gMap->zoom = 12;
$gMap->addGlobalVariable('geocoder');
$gMap->addGlobalVariable('centerChangedLast');
$gMap->addGlobalVariable('reverseGeocodedLast');
$gMap->addGlobalVariable('currentReversGeocodeResponse');
$gMap->addEvent(
     new EGMapEvent(
             'zoom_changed',
             'document.getElementById("zoom_level").innerHTML = map.getZoom();'));
$gMap->addEvent(new EGMapEvent('center_changed','centerChanged',false));
$gEvent = new EGMapEvent('dblclick','map.setZoom(map.getZoom() +1)');
$gMap->appendMapTo('#map_canvas');
$gMap->renderMap(array(
    'geocoder = new google.maps.Geocoder();',
    $gEvent->getDomEventJs('crosshair'),
    'reverseGeocodedLast= new Date();',
    'centerChagedLast = new Date();',
    'setInterval(function(){
        if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    },1000);',
    'centerChanged();'
));

?>

<div class="form">
	<script>

	  $(document).ready(function() {

      $("#apartamento").hide();
      
	  $("#Inmueble_TipoInmueble").change(function() {
	     var valor = $(this).val();
         if  ( valor == "CASA" || valor =="APARTAMENTO" || valor == "OFICINA"){
		   $("#campo").hide();
           $("#casa").show();
         }               
         else{
		   $("#campo").show();
           $("#casa").hide();
		 }
		 
      });
	  
   });
  </script>
<?php $form=$this->beginWidget('CActiveForm', array(	
	'id'=>'inmueble-form',
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


   <div id="campogeneral">
	<div class="row camposinmueble" id="tipos">
		<?php echo $form->labelEx($model,'TipoInmueble'); ?>
		<?php echo $form->dropDownList($model,'TipoInmueble',array('CASA'=>'CASA','APARTAMENTO'=>'APARTAMENTO','OFICINA'=>'OFICINA','CAMPO'=>'CAMPO','TERRENO'=>'TERRENO')); ?>
		<?php echo $form->error($model,'TipoInmueble'); ?>
	</div>

    
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'QueHacer'); ?>
		<?php echo $form->dropDownList($model,'QueHacer',array('1'=>'VENDO','2'=>'ALQUILO','3'=>'TRASPASO','4'=>'PERMUTO')); ?>
		<?php echo $form->error($model,'QueHacer'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Disponible'); ?>
		<?php echo $form->dropDownList($model,'Disponible',array('1'=>'DISPONIBLE','0'=>'NO DISPONIBLE')); ?>
		<!-- <?php echo $form->textField($model,'Disponible'); ?>  !-->
		<?php echo $form->error($model,'Disponible'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Precio'); ?>
		<?php echo $form->textField($model,'Precio'); ?>
		<?php echo $form->error($model,'Precio'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Departamento'); ?>
		<?php echo $form->textField($model,'Departamento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Departamento'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Ciudad'); ?>
		<?php echo $form->textField($model,'Ciudad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Ciudad'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Zona'); ?>
		<?php echo $form->textField($model,'Zona',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Zona'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Direccion'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'x'); ?>
		<?php echo $form->textField($model,'x'); ?>
		<?php echo $form->error($model,'x'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'y'); ?>
		<?php echo $form->textField($model,'y'); ?>
		<?php echo $form->error($model,'y'); ?>
	</div>

	<div class="row camposinmueble ">
		<?php echo $form->labelEx($model,'Portada'); ?>
		<?php echo $form->dropDownList($model,'Portada',array('0'=>'NO','1'=>'SI')); ?>
		<!-- <?php echo $form->textField($model,'Portada'); ?> !-->
		<?php echo $form->error($model,'Portada'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->dropDownList($model,'idUsuario',CHtml::listData(Datospersonales::model()->findAll(),'idUsuario','CIUsuario')); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>
</div>
<div id="casa">		    
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Fecha de Construccion'); ?>
		<?php echo $form->textField($casapo,'AnioConstruccion'); ?>
		<?php echo $form->error($model,'AnioConstruccion'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Metros Cuadrados'); ?>
		<?php echo $form->textField($casapo,'MetrosCuadrados'); ?>
		<?php echo $form->error($model,'MetrosCuadrados'); ?>
	</div>	

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Cantidad de Dormitorios'); ?>
		<?php echo $form->dropDownList($casapo,'Dormitorios',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6')); ?>
		<!-- <?php echo $form->textField($casapo,'Dormitorios'); ?>  !-->
		<?php echo $form->error($model,'Dormitorios'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Cantidad de Banios'); ?>
		<?php echo $form->dropDownList($casapo,'Banios',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6')); ?>
		<!-- <?php echo $form->textField($casapo,'Banios'); ?> !-->
		<?php echo $form->error($model,'Banios'); ?>
	</div>

	<div class="row camposinmueble" >
		<?php echo $form->labelEx($model,'Garage'); ?>
		<?php echo $form->dropDownList($casapo,'Garage',array('0'=>'NO','1'=>'SI')); ?>
		<!-- <?php echo $form->textField($casapo,'Garage'); ?> !-->
		<?php echo $form->error($model,'Garage'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Calefaccion'); ?>
		<?php echo $form->dropDownList($casapo,'Calefaccion',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Calefaccion'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Tanque de Agua'); ?>
		<?php echo $form->dropDownList($casapo,'TanqueAgua',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'TanqueAgua'); ?>
	</div>

	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Cerramiento'); ?>
		<?php echo $form->dropDownList($casapo,'Cerramiento',array('Planchada'=>'Planchada','Techo libiano'=>'Techo Libiano')); ?>
		<?php echo $form->error($model,'Cerramiento'); ?>
	</div>
	
</div>

<div  id="campo">
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Hectareas'); ?>
		<?php echo $form->textField($campo,'Hectareas'); ?>
		<?php echo $form->error($model,'Hectareas'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'MetrosCuadradosTerreno'); ?>
		<?php echo $form->textField($campo,'MetrosCuadradosTerreno'); ?>
		<?php echo $form->error($model,'MetrosCuadradosTerreno'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'MetrosConstruidos'); ?>
		<?php echo $form->textField($campo,'MetrosConstruidos'); ?>
		<?php echo $form->error($model,'MetrosConstruidos'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Luz'); ?>
		<?php echo $form->dropDownList($campo,'Luz',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Luz'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'ViviendaPatronal'); ?>
		<?php echo $form->dropDownList($campo,'ViviendaPatronal',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'ViviendaPatronal'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'EstadoAlambrado'); ?>
		<?php echo $form->textField($campo,'EstadoAlambrado'); ?>
		<?php echo $form->error($model,'EstadoAlambrado'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'IndiceCONEAT'); ?>
		<?php echo $form->textField($campo,'IndiceCONEAT'); ?>
		<?php echo $form->error($model,'IndiceCONEAT'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'IndiceCONEAT'); ?>
		<?php echo $form->textField($campo,'IndiceCONEAT'); ?>
		<?php echo $form->error($model,'IndiceCONEAT'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Tajamar'); ?>
		<?php echo $form->dropDownList($campo,'Tajamar',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Tajamar'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Caniada'); ?>
		<?php echo $form->dropDownList($campo,'Caniada',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'Caniada'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'PozoAgua'); ?>
		<?php echo $form->dropDownList($campo,'PozoAgua',array('1'=>'SI','0'=>'NO')); ?>
		<?php echo $form->error($model,'PozoAgua'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Galpones'); ?>
		<?php echo $form->textField($campo,'Galpones'); ?>
		<?php echo $form->error($model,'Galpones'); ?>
	</div>
	<div class="row camposinmueble">
		<?php echo $form->labelEx($model,'Extras'); ?>
		<?php echo $form->textField($campo,'Extras'); ?>
		<?php echo $form->error($model,'Extras'); ?>
	</div>
</div>

	
	<div class="row camposinmueble">
		<?php echo $form->labelEx($imagenes,'Imagen Principal'); ?>
		<?php echo $form->fileField($imagenes,'Ubicacion', array('maxlength'=>255)); ?>
		<?php echo $form->error($imagenes,'Ubicacion'); ?>
	</div>

	<div class="row buttons camposinmueble">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<div id="ubicacionmapa">
<div class="form">
Buscar Direccion:
 <input type="text" id="address"/>
 <button type="button" class="small"onclick="geocode()">Buscar</button>
  <ul>
     <li>Lat/Lng:&nbsp;<span id="latlng"></span></li>
     <li>Address:&nbsp;<span id="formatedAddress"></span></li>
     <li>Zoom Level:&nbsp;<span id="zoom_level"><?php echo $zoom;?></span></li>
 </ul>
</div>
<div id="map">
    <div id="map_canvas"></div>
    <div id="crosshair"></div>
</div>
<div >
<button type="button" class="small" onclick="setLatLngToClass()">Setear Latitiud y Longitud</button>
<button type="button" class="small" onclick="addMarkerAtCenter()">Marcar en el mapa</button>
</div>

</div>

 

