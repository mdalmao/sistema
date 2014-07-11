<?php 


class Datos extends CApplicationComponent{
  
   public function init(){
    // init es llamado por Yii, debido a que es un componente
   }
   
   public function inmueblescombo(){
       $model= Inmueble::model()->findAll();
       echo "<select name='inmueble' id='inmueble'>";
       foreach ($model as $dato) {
         echo "<option value='". $dato->idInmueble . "'>" . $dato->Direccion ."</option>";	  
       }
       echo "</select>";
   }

   public function clientesscombo(){
       $model= Datospersonales::model()->findAll();
       echo "<select name='cliente' id='cliente'>";
       foreach ($model as $dato) {
         echo "<option value='". $dato->idUsuario . "'>" . $dato->CIUsuario ."</option>";	  
       }
       echo "</select>";
   }


   public function horas(){
       echo "<select name='hora' id='hora'>";
       echo "<option value='0'>  8 a 9</option>";
       echo "<option value='1'>  9 a 10</option>";
       echo "<option value='2'>  10 a 11 </option>";
       echo "<option value='3'>  11 a 12 </option>";
       echo "<option value='4'>  12 a 13 </option>";
       echo "<option value='5'>  14 a 15 </option>";
       echo "<option value='6'>  15 a 16 </option>";
       echo "<option value='7'>  16 a 17 </option>";
        echo "<option value='8'>  17 a 18 </option>";
       echo "</select>";
    
   }

 
   public function filtros( $valores){
     $condicion ="";
       for($i=0;$i<count($valores);$i++){
           if ( $valores[$i] == "Apartamento"){
             if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
             $condicion = $condicion . " TipoInmueble = 'APARTAMENTO' AND Disponible = 1 ";     
           }
           if ( $valores[$i] == "Casa"){
             if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
             $condicion = $condicion . " TipoInmueble = 'CASA' AND Disponible = 1 ";    
           }
           if ( $valores[$i] == "Campo"){
             if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
             $condicion = $condicion . " TipoInmueble = 'CAMPO' AND Disponible = 1 ";   
           }

           if ( $valores[$i] == "Alquiler"){
             if ($condicion != ""){
                 $condicion = $condicion . " and ";
              }    
             $condicion =$condicion . " QueHacer = 'ALQUILAR' AND Disponible = 1 "; 
           }

           if ( $valores[$i] == "Venta"){
             if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
            $condicion = $condicion . " QueHacer = 'VENDER' AND Disponible = 1 ";
           }          
        }  
        return $condicion;
    }  
}