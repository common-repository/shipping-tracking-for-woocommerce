<?php
/** Module suivilaposte
  * file ColissimoAPI.php
  * @author Vinum Master
  * @copyright Vinum Master
  * @version 2.0 version du 21/11/2013 compatible PS 1.5 
  * Nouveau web service la poste
   */

class ColissimoAPI{
    
     private $accountNumber;
    private $password;
    private $skybillNumber;
    private $xmlResponse;
    private $invalidResponse;
    private $parsedResponse = array();
    
    public function __construct(){
      
    }
    
    public function getStatus($_accountNumber, $_password, $_skybillNumber)
	{
	
        $this->accountNumber = $_accountNumber;
        $this->password = $_password;
        $this->skybillNumber = $_skybillNumber;
        
        
     $xmlstring='
    <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:char="http://chargeur.tracking.geopost.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <char:track>
         <accountNumber>'.$this->accountNumber.'</accountNumber>
         <password>'.$this->password.'</password>
         <skybillNumber>'.$this->skybillNumber.'</skybillNumber>
      </char:track>
   </soapenv:Body>
</soapenv:Envelope>';
                       
        $url = "https://www.coliposte.fr/tracking-chargeur-cxf/TrackingServiceWS";
   
        $CURL = curl_init($url);
        curl_setopt($CURL, CURLOPT_URL, $url); 
        curl_setopt($CURL, CURLOPT_POST, 1); 
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $xmlstring); 
        curl_setopt($CURL, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
        $xmlResponse = curl_exec($CURL); 

  $dom=new DOMDocument();
  $dom->loadXML($xmlResponse);
  
   $this->parsedResponse['message'] = utf8_decode($dom->getElementsByTagName( "eventLibelle" )->item(0)->nodeValue);
   $date = utf8_decode($dom->getElementsByTagName( "eventDate" )->item(0)->nodeValue);
   $this->parsedResponse['code'] = utf8_decode($dom->getElementsByTagName( "skybillNumber" )->item(0)->nodeValue);
   
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);

    $date_livraison = strtotime($y . "-" . $m . "-" . $d);
 $this->parsedResponse['date'] = $date_livraison;
   
   
   return $this->parsedResponse;
    }


 
 
 

 
    
   
}