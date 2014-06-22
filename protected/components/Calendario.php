<?php 
class Calendario extends CApplicationComponent{
   public $idioma; // configurable en config/main.php 
   
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

  public function alta(){
     Yii::import('ext.couchdb.*');
     $client = new couchClient ('http://localhost:5984','agenda');


    // Los siguiente son los datos a guardar en la base no relacional    
     $idinmueble = 1;
     $cliente =1;
     $fecha= "20/05/2014";
     $hora="20:30";

   // Aca esta como se guarda
     $doc = new couchDocument($client);
     $doc->inmueble= $idinmueble;
     $doc->cliente=$cliente;
     $doc->fecha=$fecha;
     $doc->hora=$hora;
 }


 public function mostrar(){
   
    Yii::import('ext.couchdb.*');
    $client = new couchClient ('http://localhost:5984','agenda');

  try {
     $vista = $client->limit(100)->getView('inmueble','name');
   } catch (Exception $e) {
    echo "something weird happened: ".$e->getMessage()."<BR>\n";
   }
 
   echo "Document retrieved: ".print_r($vista,true)."\n";
    //using couch_document class :
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