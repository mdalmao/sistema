<?php 


class ImagenesInmueble extends CApplicationComponent{
  
   public function init(){
    // init es llamado por Yii, debido a que es un componente
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
} 