<?php 
require "vendor/autoload.php";

use GuzzleHttp\Client; 

/**
 *  apis controller class
 */
class ApisController
{

	private static $options = [

            "auth" => ["77qn9aax-qrrm-idki","lnh0-fm2nhmp0yca7"],
                //"debug"=>true ,
            'json'=>[ 
           
            "recipient"=> [ 
                    "address1"=> "11025 Westlake Dr",
                    "city"=> "North Carolina",
                    "country_code"=> "US",
                    "state_code"=>"CA",
                    "zip"=> 28273
                ],
            
            "items"=> [  
                    ["variant_id"=> 7679 ,"quantity"=>2], // product 7679
              ],
            ] 
        ]; 

    public function getData()
    {   
    	$this->Client = new Client([
    	                'base_uri' => 'https://api.printful.com' ,
    	                'verify' => 'C:\wamp64\cacert.pem' ]);// ssl certificate verify
         
    	$response = $this->Client->post( "/shipping/rates", self::$options);

      return $response;

    }
}

?>