<?php 
class Calendario extends CApplicationComponent{
   public $id; // configurable en config/main.php 
   public $inmueble;
   public $fecha;
   public $hora;
   public $cliente;

   public function init(){
    // init es llamado por Yii, debido a que es un componente.
   }

  public function agenda(){

   Yii::import('ext.couchdb.*');
   $client = new couchClient ('http://localhost:5984','agenda');

   // document fetching by ID
   $doc = $client->getDoc('ddf41549a87e43e8f09de210490002d6');
   // updating document
   $doc->newproperty = array("hello !","world");
   try {
   $client->storeDoc($doc);
   } catch (Exception $e) {
    echo "Document storage failed : ".$e->getMessage()."<BR>\n";
   }

   
   // view fetching, using the view option limit
  }

  public function alta($idinmueble,$cliente,$fecha,$hora){
     Yii::import('ext.couchdb.*');
     $client = new couchClient ('http://localhost:5984','agenda');


    // Los siguiente son los datos a guardar en la base no relacional    
    /* $idinmueble = 1;
     $cliente =1;
     $fecha= "20/05/2014";
     $hora="20:30";
    */
   // Aca esta como se guarda
     $doc = new couchDocument($client);
     $doc->inmueble= $idinmueble;
     $doc->cliente=$cliente;
     $doc->fecha=$fecha;
     $doc->hora=$hora;
 }


 public function mostrar($idinmueble){
 $hoy = date("d/m/Y");
 list($day,$mon,$year) = explode('/',$hoy);
 $mon= ($mon +1) -1;
 $hoy= date('d/m/Y',mktime(0,0,0,$mon,$day,$year)); 
 $hora = date("H:i:s");
 list($day,$mon,$year) = explode('/',$hoy);
 $mon= ($mon +1) -1;
 $fechalimite= date('d/m/Y',mktime(0,0,0,$mon,$day+6,$year)); 

 $fechas = array();
 $horas = array();

 Yii::import('ext.couchdb.*');
 $client = new couchClient ('http://localhost:5984','agenda');

  try {
     $vista = $client->limit(10)->getView('inmueble','name2');
   } catch (Exception $e) {
    echo "something weird happened: ".$e->getMessage()."<BR>\n";
   }
  //echo "Document retrieved: ".print_r($vista,true)."\n";
  $a = 1;
  foreach ( $vista->rows as $row ) {
  //  echo "Document ". $row -> id ."<BR>\n";
    $doc = $client->getDoc($row->id);
   // echo "cliente: " . $doc->cliente . "<br />";
      if  ( $idinmueble ==  $doc->inmueble) {
        $dato =($hoy >= $doc->fecha);
        $dato2= ($fechalimite <= $doc->fecha);
      //  if (  $dato && $dato2 ) {
      //   echo "Inmueble: " . $doc->inmueble . "<br /><br />";
      //  echo "Fecha: " . $doc->fecha . "<br /><br />";
      //  echo "Hora: " . $doc->hora . "<br /><br />";
         list($day,$mon,$year) = explode('/',$doc->fecha);
         $fechas[$a] =  date('d/m/Y',mktime(0,0,0,$mon,$day,$year)); 
         $horas[$a] = $doc->hora;
         $a = $a +1;
       //  }
      }
      
  }   
  
  //echo "Fechas: ".print_r($fechas,true)."\n";
 
  echo "<table>";
  echo "<th> Fecha </th>";
  echo "<th width='20px'> Hora 8 a 9 </th>";
  echo "<th width='20px'> Hora 9 a 10 </th>";
  echo "<th width='20px'> Hora 10 a 11 </th>";
  echo "<th width='20px'> Hora 11 a 12 </th>";
  echo "<th width='20px'> Hora 12 a 13 </th>";
  echo "<th width='20px'> Hora 14 a 15 </th>";
  echo "<th width='20px'> Hora 15 a 16 </th>";
  echo "<th width='20px'> Hora 16 a 17 </th>";
  echo "<th width='20px'> Hora 17 a 18 </th>";
  echo "<tr>";
  for($t=0;$t<=5; $t++){
   list($day,$mon,$year) = explode('/',$hoy);
   $fecha= date('d/m/Y',mktime(0,0,0,$mon,$day+$t,$year));  
   echo "<td>" . $fecha  . "</td>";
   $linea = array();
   $l=0;

   // Si la fecha esta en fechas busco que horas tiene seteadas y las cargo en el array linea

   if (in_array($fecha, $fechas)) {
       for ($j=1; $j <=count($fechas); $j++){
           if ( $fechas[$j] == $fecha ){
               for ( $p= $l; $p<= $horas[$j]; $p++){
                 $linea[$p] = 0 ;
                }
                $linea[$horas[$j]]= $horas[$j];
                $l = $l +1;           
           }
          
       } 

   // echo "fECHA: ".print_r($linea,true)."\n";

    // ARMO LA LINEA, COMPLETA PINTANDO EN VERDE O ROJO SEGUN SI ESTA LIBRE O OCUPADO
    // LA VARIABLE o INDICA LA POSICION DE LA LINEA QUE VA DE 0 a 8   
    for($o=0; $o <= 8; $o++){
        if ( in_array($o, $linea ))
        { 
          echo "<td class='ocupado'>  </td>"; 
        }else{

          echo "<td class='libre'> </td>";
        }
      }
   }
   // Como la fecha no esta en array fechas, pinto toda la linea como libre
   else {
     for($i=0;$i<=8; $i++){
      echo "<td class='libre'> </td>";   
      }
    
   }
     echo "<tr>";
   }

  
  echo "</table>";

}

public function borrar(){
 Yii::import('ext.couchdb.*');
 $client = new couchClient ('http://localhost:5984','agenda');

 echo "#### Deleting document \"some_doc\"\n";
 echo "delete using previous \$doc object : \$client->deleteDoc(\$doc)\n";
 try {
   $result = $client->deleteDoc($doc); 
 } catch (Exception $e) {
  echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
  exit(1);
 }
 echo "Doc deleted, CouchDB response body: ".print_r($result,true)."\n";
}

public function  update(){
 
 Yii::import('ext.couchdb.*');
 $client = new couchClient ('http://localhost:5984','agenda');

echo "==== using previous \$doc object to update it\n";
echo "Adding revison and id properties to the object :\n";
echo "\$doc->_id = \$response->id;\n";
$doc->_id = $response->id;
echo "\$doc->_rev = \$response->rev;\n";
$doc->_rev = $response->rev;
echo "Making a change : \$doc->tags[] = \"updated\";\n";
$doc->tags[] = "updated";

echo "==== storing document\n";
echo "Storing \$doc : \$client->storeDoc(\$doc)\n";
try {
        $response = $client->storeDoc($doc);
} catch (Exception $e) {
        echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
        exit(1);
}
echo "The document is stored. CouchDB response body: ".print_r($response,true)."\n";
echo "The revision property changed : ".$response->rev."\n";

}

}