<?php


class FedexAPI{
    
     private $key;
   private $TrackingNumber;
   private $accountNumber;
   private $meterNumber;
   
   private $Password;
    private $xmlResponse;
    private $invalidResponse;
    private $response = array();
    
    public function __construct(){
      
    }
    
    public function getStatus($key, $Password, $accountNumber, $meterNumber, $TrackingNumber)
	{
	
        require_once('library/fedex-common.php5');

        $path_to_wsdl = "wsdl/TrackService_v10.wsdl";
        
      
ini_set("soap.wsdl_cache_enabled", "0");

$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
	'UserCredential' =>array(
		'Key' => $key,
		'Password' => $Password
	)
);

$request['ClientDetail'] = array(
	'AccountNumber' => $accountNumber, 
	'MeterNumber' => $meterNumber
);
$request['TransactionDetail'] = array('CustomerTransactionId' => '*** Track Request using PHP ***');
$request['Version'] = array(
	'ServiceId' => 'trck', 
	'Major' => '10', 
	'Intermediate' => '0', 
	'Minor' => '0'
);
$request['SelectionDetails'] = array(
	'PackageIdentifier' => array(
		'Type' => 'TRACKING_NUMBER_OR_DOORTAG',
		'Value' => $TrackingNumber 
	)
);

$response = $client ->track($request);

  $track['message'] = "";
$track['date'] = "";

   if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){

  
  $track['message'] = $response->CompletedTrackDetails->TrackDetails->StatusDetail->Description;
$track['date'] = strtotime($response->CompletedTrackDetails->TrackDetails->StatusDetail->CreationTime);

   }
        

return $track;
                       
  


        }
 
 

 
    
   
}