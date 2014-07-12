<?php 


class WebService extends CApplicationComponent{
  
   public function init(){
    // init es llamado por Yii, debido a que es un componente
   }
   
  public function consumir($LoanAmount,$InterestRate,$Months){
    
  $client=new SoapClient('http://www.webservicex.net/FinanceService.asmx?WSDL');
  try {
    $client = new SoapClient("http://www.webservicex.net/FinanceService.asmx?WSDL",
      array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
    $param = array(
                    'LoanAmount' => $LoanAmount ,
                    'InterestRate' => $InterestRate,
                    'Months' => $Months
                    );
 
  $ready = $client->LoanMonthlyPayment($param);
 // var_dump($ready); //Verificar si hay resultado
  } catch (Exception $e) {
    trigger_error($e->getMessage(), E_USER_WARNING);
  } 

  foreach ($ready as $row) {
     echo $row;
  }
}

}