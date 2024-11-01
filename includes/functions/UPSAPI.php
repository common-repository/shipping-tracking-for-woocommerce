<?php


class UPSAPI{
    
     private $AccessLicenseNumber;
   private $TrackingNumber;
   private $UserId;
   private $Password;
    private $xmlResponse;
    private $invalidResponse;
    private $response = array();
    
    public function __construct(){
      
    }
    
    public function getStatus($AccessLicenseNumber, $UserId, $Password, $TrackingNumber)
	{
	
        
        
        $data ="<?xml version=\"1.0\"?>
        <AccessRequest xml:lang='en-US'>
                <AccessLicenseNumber>".$AccessLicenseNumber."</AccessLicenseNumber>
                <UserId>".$UserId."</UserId>
                <Password>".$Password."</Password>
        </AccessRequest>
        <?xml version=\"1.0\"?>
        <TrackRequest>
                <Request>
                        <TransactionReference>
                                <CustomerContext>
                                        <InternalKey>blah</InternalKey>
                                </CustomerContext>
                                <XpciVersion>1.0</XpciVersion>
                        </TransactionReference>
                        <RequestAction>Track</RequestAction>
                </Request>
        <TrackingNumber>".$TrackingNumber."</TrackingNumber>
        </TrackRequest>";
$ch = curl_init("https://www.ups.com/ups.app/xml/Track");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_TIMEOUT, 60);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
   
        
   
$xmlResponse = curl_exec($ch);
curl_close($ch);

//$dom=new DOMDocument();
 // $dom->loadXML($xmlResponse);

  
  
  
  if ( $xmlResponse->Response->ResponseStatusCode == 1 ) {
		
			if( isset( $xmlResponse->Shipment->ScheduledDeliveryDate ) ){
				$response[ 'date' ] = strtotime( (string) $xmlResponse->Shipment->ScheduledDeliveryDate . ' ' . (string) $xmlResponse->Shipment->ScheduledDeliveryTime );
			}
		
			if( isset( $xmlResponse->Shipment->Package->Activity ) ){
				
				$key = 0;
				foreach( $xmlResponse->Shipment->Package->Activity as $activity ){
				
					$key++;
					
					if( $key == 1 ){
						$tracking[ 'message' ] = (string) $activity->Status->StatusType->Description;
					}
					
					$response[ 'message'] = (string) $activity->Status->StatusType->Description;
                                        $response['date'] = strtotime( (string) $activity->Date . ' ' . (string) $activity->Time );
					
					
				}
				
			}
		
		}
  
  
  

    //    $response['message']= $dom->getElementsByTagName( "EventDate" )->item(0)->nodeValue;      
   //     $response['date']= $dom->getElementsByTagName( "Event" )->item(0)->nodeValue;      
          

return $response;
                       
  


        }
 
 

 
    
   
}