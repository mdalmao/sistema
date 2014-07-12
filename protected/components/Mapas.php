<?php 
class Mapas extends CApplicationComponent{
   public $idioma; // configurable en config/main.php 
   public function init(){
    // init es llamado por Yii, debido a que es un componente.
   }

  public function dibujar($gMap,$inmuebles, $icono, $link, $titulo){
    foreach ($inmuebles as $inmueble):
        $icon = new EGMapMarkerImage($icono);
        $icon->setSize(32, 37);
        $icon->setAnchor(16, 16.5);
        $icon->setOrigin(0, 0);
        $url = "http://localhost:90/yii/sistema/index.php/site/DescripcionInmueble?idinmueble=".$inmueble['idInmueble'];
        $link = $link . ' <a href="'. $url . '"> Ver Inmueble </a>'; 
        $link2 = new EGMapInfoWindow($link);

        $marker = new EGMapMarker($inmueble['x'],$inmueble['y'], array('title' => $titulo,'icon'=>$icon));
        $marker->addHtmlInfoWindow($link2);
        $gMap->addMarker($marker);
   endforeach;
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
    // Create GMapInfoWindowc
    /*$info_window_a = new EGMapInfoWindow('<div>Casa en Alquiler</div>');
    $info_window_c = new EGMapInfoWindow('<div>Apartamentos en Alquiler</div>');
    $info_window_d = new EGMapInfoWindow('<div> Campos en Alquiler</div>');
    */
   
    $info_window_b = new EGMapInfoWindow('<div>Nuestras Oficinias, contactese con nosotros</div>');
    $info_window_a = '<div>Casa en Alquiler</div>';
    $info_window_c = '<div>Apartamentos en Alquiler</div>';
    $info_window_d = '<div> Campos en Alquiler</div>';
   
    $casa = Yii::app()->baseUrl . "/imagenes/casa.jpg";
    $campo =  $casa = Yii::app()->baseUrl . "/imagenes/casa.jpg";
    $oficinas = Yii::app()->baseUrl . "/imagenes/oficina.png";
    $apa = Yii::app()->baseUrl . "/imagenes/apartamentos.jpg";
  
    // Create marker
    
   $Criteria = new CDbCriteria();
    //Los string estan en comillas simples sino no lo toma S
   $Criteria->condition = "TipoInmueble = 'APARTAMENTO' AND Disponible = 1";
   $Apartamentos = Inmueble::model()->findAll($Criteria);  
  
   $a= new Mapas();
   $titulo = "Alquiler de Apartamento";
   $a->dibujar($gMap,$Apartamentos,$apa,$info_window_c, $titulo);
   
    $Criteria = new CDbCriteria();
    //Los string estan en comillas simples sino no lo toma S
      $Criteria->condition = "TipoInmueble = 'CASA' AND Disponible = 1";
      $Casas = Inmueble::model()->findAll($Criteria); 
   
   $titulo = "Alquiler de Casa";
   $a->dibujar($gMap,$Casas, $casa,$info_window_a, $titulo);

    $Criteria = new CDbCriteria();
    //Los string estan en comillas simples sino no lo toma S
      $Criteria->condition = "TipoInmueble = 'CAMPO' AND Disponible = 1";
      $Campos = Inmueble::model()->findAll($Criteria);
    $titulo = "Alquiler de Campos";
    $a->dibujar($gMap,$Campos, $campo,$info_window_d, $titulo);

   /* $inmuebles = Inmueble::model()->findAll();
    foreach ($inmuebles as $inmueble):
        
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

  public function mapa_inmueble($id){
    Yii::import('ext.EGMap.*');
 
    $gMap = new EGMap();
    $gMap->zoom = 10;
    $mapTypeControlOptions = array(
     'position'=> EGMapControlPosition::LEFT_BOTTOM,
     'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
    );
    $gMap->mapTypeControlOptions= $mapTypeControlOptions;
    $gMap->setCenter(-34.8999799,-56.1348723);
    // Create GMapInfoWindowc
     /*
     $info_window_a = new EGMapInfoWindow('<div> Inmueble</div>');
     $info_window_b = new EGMapInfoWindow('<div> Oficina Centrales</div>');
     */
     $info_window_a = '<div> Inmueble</div>';
     $info_window_b = '<div> Oficina Centrales</div>';

    $casa = Yii::app()->baseUrl . "/imagenes/casa.jpg";
  
    $Criteria = new CDbCriteria();
    $Criteria->condition = "idinmueble = $id";
    $Inmuebles = Inmueble::model()->findAll($Criteria);
     
    $a= new Mapas();
    $titulo = "Inmueble";
    $a->dibujar($gMap,$Inmuebles,$casa,$info_window_a, $titulo);
   
    foreach ($Inmuebles as $inmueble):
        $gMap->setCenter($inmueble['x'],$inmueble['y']);
       
   endforeach;
     
  /*
    // Create marker with label
    $marker = new EGMapMarkerWithLabel(-34.8999799,-56.1348723, array('title' => 'Oficinas Centrales'));
 
    $label_options = array(
     'backgroundColor'=>'yellow',
     'opacity'=>'0.75',
     'width'=>'100px',
     'color'=>'blue'
    );
 
     // SECOND WAY:
   $marker->labelContent= 'Telefono: 2333-0001';
   $marker->labelStyle=$label_options;
   $marker->draggable=true;
   $marker->labelClass='labels';
   $marker->raiseOnDrag= true;
   $marker->setLabelAnchor(new EGMapPoint(22,0));
   $marker->addHtmlInfoWindow($info_window_b);
 
   $gMap->addMarker($marker);
   */
   $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
   $gMap->renderMap();
  
  }

public function mapa_inmueble_modelo($model){
    Yii::import('ext.EGMap.*');
 
    $gMap = new EGMap();
    $gMap->zoom = 10;
    $mapTypeControlOptions = array(
     'position'=> EGMapControlPosition::LEFT_BOTTOM,
     'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
    );
    $gMap->mapTypeControlOptions= $mapTypeControlOptions;
    $gMap->setCenter(-34.8999799,-56.1348723);
    // Create GMapInfoWindowc
    $info_window_a = new EGMapInfoWindow('<div> Inmueble</div>');
    $info_window_b = new EGMapInfoWindow('<div> Oficina Centrales</div>');
    $casa = Yii::app()->baseUrl . "/imagenes/casa.jpg";
  
    
    $Inmuebles = $model;
     
    $a= new Mapas();
    $titulo = "Inmueble";
    $a->dibujar($gMap,$Inmuebles,$casa,$info_window_a, $titulo);
   
    foreach ($Inmuebles as $inmueble):
        $gMap->setCenter($inmueble['x'],$inmueble['y']);
       
   endforeach;
     
   $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
   $gMap->renderMap();
  
  }
} 






