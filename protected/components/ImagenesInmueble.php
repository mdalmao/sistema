<?php 


class ImagenesInmueble extends CApplicationComponent{
  
   public function init(){
    // init es llamado por Yii, debido a que es un componente
   }
   
   public function imagenesDeInmueble($id,$idImag){

    $Criteria = new CDbCriteria();
    $Criteria->condition = "Idinmueble = $id AND IdImagen = $idImag";
     $imagenes = Imagenes::model()->findAll($Criteria);
     $nombre= "";
     foreach ($imagenes as $imagen):
         
            $nombre =  $imagen->Ubicacion;
          

     endforeach; 
     if ($nombre == "") {
         $nombre = "sinimagen.jpg";
     }    
     
     $valor = Yii::app()->baseUrl . "/imagenes/" . $nombre;
     return $valor;
   }

   public function imagenprincipal($id){
     $imagenes = Imagenes::model()->findAll();
     $nombre= "";
     foreach ($imagenes as $imagen):
          if (( $imagen-> Idinmueble == $id) && ($imagen-> IdImagen==1)){
            $nombre =  $imagen->Ubicacion;
          } 

     endforeach; 
     if ($nombre == "") {
         $nombre = "sinimagen.jpg";
     }    
     
     $valor = Yii::app()->baseUrl . "/imagenes/" . $nombre;
     return $valor;
   }

   public function slider(){
    
    $Criteria = new CDbCriteria();
    $Criteria->condition = "Portada = 1";
    $Inmuebles = Inmueble::model()->findAll($Criteria);
    $imagenes = Imagenes::model()->findAll();
    $todo = array();
    $fotos = array();
    $titulos = array();
    $descripcion= array();
    $cantidad =0;
    foreach ($Inmuebles as $inmueble):
          $titulos[$cantidad] = $inmueble->Estado;
          $descripcion[$cantidad] = $inmueble->Descripcion; 
          foreach ($imagenes as $imagen):
          if (( $imagen-> Idinmueble == $inmueble->idInmueble) && ($imagen-> IdImagen==1)){
            $nombre =  $imagen->Ubicacion;
            $fotos[$cantidad]=  Yii::app()->baseUrl . "/imagenes/" . $nombre;
            $cantidad = $cantidad +1;
          } 
          endforeach; 
    endforeach; 
 
   $todo[0]= $fotos;
   $todo[1]= $titulos;
   $todo[2]= $descripcion;
  return $todo;   
   }
} 