<?php


class USPSAPI{
    
     private $accountNumber;
   private $skybillNumber;
    private $xmlResponse;
    private $invalidResponse;
    private $response = array();
    
    public function __construct(){
      
    }
    
    public function getStatus($_accountNumber, $_skybillNumber)
	{
	
              
    $url = "http://production.shippingapis.com/shippingAPI.dll";
    $service = "TrackV2";
    $xml = rawurlencode("
<TrackFieldRequest USERID='".$_accountNumber."'>
    <TrackID ID='".$_skybillNumber."'></TrackID>
    </TrackFieldRequest>");
$request = $url . "?API=" . $service . "&XML=" . $xml;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$request);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$xmlResponse = curl_exec($ch);
curl_close($ch);

$dom=new DOMDocument();
  $dom->loadXML($xmlResponse);


        $response['message']= $dom->getElementsByTagName( "EventDate" )->item(0)->nodeValue;      
        $response['date']= $dom->getElementsByTagName( "Event" )->item(0)->nodeValue;      
          

return $response;
                       
  


        }
 
 

 
    
   
}