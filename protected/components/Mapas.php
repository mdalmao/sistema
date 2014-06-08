<?php 
class Mapas extends CApplicationComponent{
   public $idioma; // configurable en config/main.php 
   public function init(){
    // init es llamado por Yii, debido a que es un componente.
   }
   public function mapa(){
 
    Yii::import('ext.EGMap.*');
 
    $gMap = new EGMap();
    $gMap->zoom = 10;
    $mapTypeControlOptions = array(
     'position'=> EGMapControlPosition::LEFT_BOTTOM,
     'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
    );
    $gMap->mapTypeControlOptions= $mapTypeControlOptions;
    $gMap->setCenter(-34.8999799,-56.1348723);
    // Create GMapInfoWindows
    $info_window_a = new EGMapInfoWindow('<div>Casa en Alquiler</div>');
    $info_window_b = new EGMapInfoWindow('<div>Nuestras Oficinias, contactese con nosotros</div>');
 
    $casa = Yii::app()->baseUrl . "/imagenes/casa.jpg";
    $oficinas = Yii::app()->baseUrl . "/imagenes/oficina.png";

    // Create marker
    /*
    $inmuebles = Inmueble::model()->findAll();
    foreach ($inmuebles as $inmueble):
          echo "Prueba". $inmueble['x'] ;
        $icon = new EGMapMarkerImage($casa);
        $icon->setSize(32, 37);
        $icon->setAnchor(16, 16.5);
        $icon->setOrigin(0, 0);
       $marker = new EGMapMarker($inmueble['x'],$inmueble['y'], array('title' => 'Casa en Alquiler','icon'=>$icon));
        $marker->addHtmlInfoWindow($info_window_a);
        $gMap->addMarker($marker);
   endforeach;

    */ 
   
   /*
    $marker = new EGMapMarker( -34.8999172,-56.1345209, array('title' => 'Casa en Alquiler','icon'=>$icon));
    $marker->addHtmlInfoWindow($info_window_a);
    $gMap->addMarker($marker);
   */
    // Create marker with label
    $marker = new EGMapMarkerWithLabel(-34.8999799,-56.1348723, array('title' => 'Oficinas Centrales'));
 
    $label_options = array(
     'backgroundColor'=>'yellow',
     'opacity'=>'0.75',
     'width'=>'100px',
     'color'=>'blue'
    );
 
   /*
   // Two ways of setting options
   // ONE WAY:
   $marker_options = array(
  'labelContent'=>'$9393K',
  'labelStyle'=>$label_options,
  'draggable'=>true,
  // check the style ID 
  // afterwards!!!
  'labelClass'=>'labels',
  'labelAnchor'=>new EGMapPoint(22,2),
  'raiseOnDrag'=>true
   );
   $marker->setOptions($marker_options);
   */
 
     // SECOND WAY:
   $marker->labelContent= 'Telefono: 2333-0001';
   $marker->labelStyle=$label_options;
   $marker->draggable=true;
   $marker->labelClass='labels';
   $marker->raiseOnDrag= true;
   $marker->setLabelAnchor(new EGMapPoint(22,0));
   $marker->addHtmlInfoWindow($info_window_b);
 
   $gMap->addMarker($marker);
   // enabling marker clusterer just for fun
   // to view it zoom-out the map
   $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
   $gMap->renderMap();
  }
} 
