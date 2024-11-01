<?php
/** Module suivilaposte
  * file ChronopostAPI.php
  * @author Vinum Master
  * @copyright Vinum Master
  * @version 2.0 version du 21/11/2013 compatible PS 1.5 
  * Nouveau web service la poste
   */

class ChronopostAPI{
    
    private $skybillNumber;
    private $xmlResponse;
    private $invalidResponse;
    private $parsedResponse = array();
    
    public function __construct(){
      
    }
    
    public function getChronopostStatus($_skybillNumber)
	{
	
       $this->skybillNumber = $_skybillNumber;
         
     $xmlstring='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:cxf="http://cxf.tracking.soap.chronopost.fr/">
   <soapenv:Header/>
   <soapenv:Body>
      <cxf:trackSkybill>
         <!--Optional:-->
         <language>fr_FR</language>
         <!--Optional:-->
         <skybillNumber>'.$this->skybillNumber.'</skybillNumber>
      </cxf:trackSkybill>
   </soapenv:Body>
</soapenv:Envelope>';
                       
        $url = "https://www.chronopost.fr/tracking-cxf/TrackingServiceWS";
   
        $CURL = curl_init($url);
        curl_setopt($CURL, CURLOPT_URL, $url); 
        curl_setopt($CURL, CURLOPT_POST, 1); 
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $xmlstring); 
        curl_setopt($CURL, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
        $xmlResponse = curl_exec($CURL); 

  $dom=new DOMDocument();
  $dom->loadXML($xmlResponse);
  
  $number= (int)$dom->getElementsByTagName( "eventLabel" )->length;
 

   $this->parsedResponse['message'] = utf8_decode($dom->getElementsByTagName( "eventLabel" )->item($number-1)->nodeValue);
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