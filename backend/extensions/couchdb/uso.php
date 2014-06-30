<?PHP
require_once 'couch.php';
require_once 'couchClient.php';
require_once 'couchDocument.php';

// set a new connector to the CouchDB server
$client = new couchClient ('http://my.couch.server.com:5984','my_database');

// document fetching by ID
$doc = $client->getDoc('some_doc_id');
// updating document
$doc->newproperty = array("hello !","world");
try {
   $client->storeDoc($doc);
} catch (Exception $e) {
   echo "Document storage failed : ".$e->getMessage()."<BR>\n";
}

// view fetching, using the view option limit
try {
   $view = $client->limit(100)->getView('orders','by-date');
} catch (Exception $e) {
   echo "something weird happened: ".$e->getMessage()."<BR>\n";
}

//using couch_document class :
$doc = new couchDocument($client);
$doc->set( array('_id'=>'JohnSmith','name'=>'Smith','firstname'=>'John') ); //create a document and store it in the database
echo $doc->name ; // should echo "Smith"
$doc->name = "Brown"; // set document property "name" to "Brown" and store the updated document in the database

?>