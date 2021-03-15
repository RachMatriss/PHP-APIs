<?php 
use GuzzleHttp\Client; 
use PHPUnit\Framework\TestCase;


class UserAgentTest extends TestCase
{

    private $Client;

    public function setUp():Void 
    {
        $this->Client = new GuzzleHttp\Client(['base_uri' => 'https://api.printful.com']);
    }

    public function tearDown(): Void
    {
        $this->Client = null;
    }

    public function testGet(): Void
    {   
    	$options = [

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

    	$response = $this->Client->post( "/shipping/rates", $options);
 
    $this->assertEquals(200, $response->getStatusCode());
    
    $contentType = $response->getHeaders()["Content-Type"][0];
    $this->assertEquals("application/json; charset=UTF-8", $contentType);
    
    // you  can add more test in the future   
    }
}

?>